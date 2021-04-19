<?php

use App\DAO\CargaDAO;
use App\Models\CargaModel;
use App\Models\CargaFiltroModel;
use App\DAO\ClienteDAO;
use App\DAO\FornecedorDAO;

session_start();
  header('Cache-Control: no cache');
  require_once 'security.php';

  require_once 'cabecalho.php';
  require_once 'carga.php';
  require_once 'App/Models/CargaModel.php';
  require_once 'App/DAO/CargaDAO.php';
  require_once 'App/Models/CargaFiltroModel.php';
  require_once 'App/DAO/ClienteDAO.php';
  require_once 'App/DAO/FornecedorDAO.php';

  $cargaDAO = new cargaDAO();
  $model = new CargaModel();

  $clienteDAO = new ClienteDAO();
  $clienteLista = $clienteDAO->getAll("nome","");

  $fornecedorDAO = new FornecedorDAO();
  $fornecedorLista = $fornecedorDAO->getAll("nome", "");

  $cargas = "";
  $data_inicial = "";
  $data_final = "";
  $codCliente = 0;
  $codFornecedor = 0;

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $codCliente = filter_input(INPUT_POST, 'idCliente');
    $codFornecedor = filter_input(INPUT_POST, 'idFornecedor');
    $data_inicial = filter_input(INPUT_POST, 'data_inicial');
    $data_final = filter_input(INPUT_POST, 'data_final');
  }

  if (isset($_POST['btnPesquisar']))
  {
      $filtro = new CargaFiltroModel();
      $filtro->dataInicial = $_POST['data_inicial'];
      $filtro->dataFinal = $_POST['data_final'];
      $filtro->codCliente = $_POST['idCliente'];
      $filtro->codFornecedor = $_POST['idFornecedor'];

      $cargas = $cargaDAO->getAll($filtro);
  }

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Menu Principal</title>
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
</head>
<body>

<div class="container-fluido">
    <h4>cargas</h4>
    <form id="pedido-form" action="carga.php" method="post">
        <div class="row">
            <div class="form-group col-sm-3">
                <label>Data Inicial</label>
                <input type="date" id="data_inicial" name="data_inicial" class="form-control" value="<?=$data_inicial ?>">
            </div>

            <div class="form-group col-sm-3">
                <label class="datafinal">Data Final</label>
                <input type="date" id="data_final" name="data_final" class="form-control" value="<?=$data_final ?>">
            </div>

            <div class="form-group col-sm-3">
            <label >Clientes</label>
                <select name="idCliente" id="idCliente" class="form-control">
                <option value=""></option>
                    <?php
                        foreach($clienteLista as $cli)
                        {
                          if ($codCliente == $cli->codigo)
                            echo '<option value=' .$cli->codigo .' selected="selected"'.'>'. $cli->nome .'</option>';
                          else
                            echo '"<option value="' .$cli->codigo .'">'. $cli->nome .'</option>"';
                        }
                    ?>;
                </select>
            </div>

            <div class="form-group col-sm-3">
            <label >Fornecedores</label>
                <select name="idFornecedor" id="idFornecedor" class="form-control">
                <option value=""></option>
                    <?php
                        foreach($fornecedorLista as $fornecedor)
                        {
                          if ($codFornecedor == $fornecedor->codigo)
                            echo '<option value=' .$fornecedor->codigo .' selected="selected"'.'>'. $fornecedor->nome .'</option>';
                          else
                            echo '"<option value="' .$fornecedor->codigo .'">'. $fornecedor->nome .'</option>"';
                        }
                    ?>;
                </select>
            </div>
        </div>
        <button type="submit" class="btn btn-primary mb-2" id="btnPesquisar" name="btnPesquisar">Pesquisar</button>
    </form>
</div>

<div class="container-fluido">
  <div class="table-responsive table-striped table-hover">
    <table class="table">
      <thead class="thead-dark">
        <tr>
          <th>Nro Carga</th>
          <th class="hidden-xs">Data</th>
          <th class="hidden-xs">Cliente</th>
          <th class="hidden-xs" align="right">Valor Pedido</th>
          <th>Ação</th>
        </tr>
      </thead>
      <tbody>
      <?php
        if ($cargas != null)
        {
            foreach($cargas as $carga)
            {
              $model->setValorPedido($carga->valor_pedido);
              ?>
            
            <tr>
                <td > <?php echo $carga->num_carga ?></td>
                <td class="hidden-xs"> <?php echo date('d/m/Y', strtotime($carga->data)) ?></td>
                <td > <?php echo $carga->nome_cliente ?></td>
                <td class="hidden-xs" align="right"> <?php echo $model->getValorPedido() ?></td>
                <td ><a href='carga_detalhe.php?id= <?php echo $carga->id ?>'><button class='btn primary btn-primary'>Detalhes</button></a></td>
            </tr>
            <?php 
            }
        } 
     ?>
      </tbody>
    </table>
  </div>
</div>

<?php
  require_once 'rodape.php';
?>
</div>
</body>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.minjs"></script>
</html>