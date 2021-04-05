<?php 
  session_start();
  header('Cache-Control: no cache');
  require_once 'security.php';
  require_once 'cabecalho.php';
  require_once 'App/Models/ContasModel.php';
  require_once 'App/DAO/ContasDAO.php';
  require_once 'App/Models/ClienteModel.php';
  require_once 'App/DAO/ClienteDAO.php';

  use App\DAO\ClienteDAO;
  use App\DAO\ContasDAO;
  use App\Models\ContasModel;

  $contasDAO = new ContasDAO();
  $model = new ContasModel();
  $clienteDAO = new ClienteDAO();
  $clienteLista = $clienteDAO->getAll("nome", "");

  $nomeCliente = "";
  $valorPagar = 0;
  $valorPago = 0;

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nomeCliente = filter_input(INPUT_POST, 'idCliente');    
  }

  if (isset($_POST['btnPesquisar']))
    $model = $contasDAO->getAll('nome_cliente', $_POST['idCliente'], 'R');

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Menu Principal</title>
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
</head>
<body>

<div class="container">
    <h4>Contas a Receber</h4>
    <form id="pagar-form" name="receber" action="contas_receber.php" method="post">
        <div class="row">
            <div class="form-group col-sm-6">
            <label>Contato:<?=" ".$nomeCliente;?></label>
                <select name="idCliente" id="idCliente" class="form-control" value="">
                  <option value=""></option>
                      <?php
                          foreach($clienteLista as $cli)
                          {
                              echo '"<option value="' .$cli->nome .'">'. $cli->nome .'</option>"';
                          }
                      ?>;
                </select>
            </div>
            <!-- <div>
              <div class="form-group col-sm-4">
                <button type="submit" class="btn btn-primary mb-2" id="btnPesquisar" name="btnPesquisar">Pesquisar</button>
              </div>
            </div> -->
        </div>
        <button type="submit" class="btn btn-primary mb-2" id="btnPesquisar" name="btnPesquisar">Pesquisar</button>
        
    </form>
</div>


<div class="container">
  <div class="table-responsive table-striped table-hover">
    <table class="table">
      <thead class="thead-dark">
        <tr>
          <th>Documento</th>
          <th>Data Emissão</th>
          <th>Data Vencimento</th>
          <th align="center">Valor Receber</th>
          <th align="right">Valor Recebido</th>
          <th>Ação</th>
        </tr>
      </thead>
      <tbody>
      <?php
        $modelConta = new ContasModel();
        foreach($model as $item)
        {
          $modelConta->setDataEmissao($item->data_emissao);
          $modelConta->setDataVencto($item->data_vencto);
          $modelConta->setValorPagar($item->valor_pagar);
          $modelConta->setValorPago($item->valor_pago);
          
          $valorPagar = $valorPagar + $item->valor_pagar;
          $valorPago = $valorPago + $item->valor_pago;
          ?>
          <tr>
          <td > <?php echo $item->documento ?></td>
          <td> <?php echo $modelConta->getDataEmissao(); ?></td>
          <td> <?php echo $modelConta->getDataVencto(); ?></td>
          <td align="right"> <?php echo $modelConta->getValorPagar() ?></td>
          <td align="right"> <?php echo $modelConta->getValorPago() ?></td>

          <td ><a href='contas_detalhe.php?id= <?php echo $item->id .'&tipo=R' ?>'><button class='btn primary btn-primary'>Detalhes</button></a></td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
  <div>
  <?php
    $modelConta->setTotalPagar($valorPagar);
    $modelConta->setTotalPago($valorPago);
  ?>
    <div class="row">
      <div class= "col-sm-3">
        <label><b>Valor Receber</b></label>
        <input type="texto" class="form-control" value="<?php echo $modelConta->getTotalPagar() ?>">
      </div>
      <div class= "col-sm-3">
        <label><b>Valor Recebidor</b></label>
        <input type="texto" class="form-control" value="<?php echo $modelConta->getTotalPago() ?>">
      </div>
      <div class= "col-sm-3">
        <label><b>Saldo</b></label>
        <input type="texto" class="form-control" value="<?php echo $modelConta->getSaldo() ?>">
      </div>
    </div>
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