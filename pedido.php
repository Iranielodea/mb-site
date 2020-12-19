<?php

use App\DAO\PedidoDAO;
use App\Models\PedidoModel;
use App\Models\PedidoFiltro;
use App\DAO\ClienteDAO;

session_start();
  header('Cache-Control: no cache');
  require_once 'security.php';

  require_once 'cabecalho.php';
  require_once 'pedido.php';
  require_once 'App/Models/PedidoModel.php';
  require_once 'App/DAO/PedidoDAO.php';
  require_once 'App/Models/PedidoFiltro.php';
  require_once 'App/DAO/ClienteDAO.php';

  $pedidoDao = new PedidoDAO();
  $model = new PedidoModel();

  $clienteDAO = new ClienteDAO();
  $clienteLista = $clienteDAO->getAll("nome","");
  $pedidos = "";

  if (isset($_POST['btnPesquisar']))
  {
      $filtro = new PedidoFiltro();
      $filtro->dataInicial = $_POST['data_inicial'];
      $filtro->dataFinal = $_POST['data_final'];
      $filtro->nomeCliente = $_POST['idCliente'];
      $filtro->numPedido = $_POST['numPedido'];

      $pedidos = $pedidoDao->getAll($filtro);
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
    <h4>Pedidos</h4>
    <form id="pedido-form" action="pedido.php" method="post">
        <div class="row">
            <div class="form-group col-sm-3">
                <label>Data Inicial</label>
                <input type="date" id="data_inicial" name="data_inicial" class="form-control" value="<?php echo date('Y-m-d', strtotime('-5 days')) ?>">
            </div>

            <div class="form-group col-sm-3">
                <label class="datafinal">Data Final</label>
                <input type="date" id="data_final" name="data_final" class="form-control" value="<?php echo date('Y-m-d') ?>">
            </div>

            <div class="form-group col-sm-4">
            <label>Clientes</label>
                <select name="idCliente" id="idCliente" class="form-control">
                <option value=""></option>
                    <?php
                        foreach($clienteLista as $cli)
                        {
                            echo '"<option value="' .$cli->nome .'">'. $cli->nome .'</option>"';
                        }
                    ?>;
                </select>
            </div>

            <div class="form-group col-sm-2">
                <label class="datafinal">Nro Pedido</label>
                <input type="text" id="numPedido" name="numPedido" class="form-control" value="">
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
          <th>Nro Pedido</th>
          <th class="hidden-xs">Data</th>
          <th class="hidden-xs">Cliente</th>
          <th>Ação</th>
        </tr>
      </thead>
      <tbody>
      <?php
        if ($pedidos != null)
        {
            foreach($pedidos as $ped)
            {?>
            <tr>
                <td > <?php echo $ped->num_pedido ?></td>
                <td class="hidden-xs"> <?php echo date('d/m/Y', strtotime($ped->data)) ?></td>
                <td class="hidden-xs"> <?php echo $ped->nome_cliente ?></td>
                <td ><a href='pedido_detalhe.php?id= <?php echo $ped->id ?>'><button class='btn primary btn-primary'>Detalhes</button></a></td>
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