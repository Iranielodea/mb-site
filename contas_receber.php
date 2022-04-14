<?php 
  session_start();
  header('Cache-Control: no cache');
  require_once 'security.php';
  require_once 'cabecalho.php';
  require_once 'App/Models/ContasModel.php';
  require_once 'App/DAO/ContasDAO.php';
  require_once 'App/Models/ClienteModel.php';
  require_once 'App/DAO/ClienteDAO.php';
  require_once 'App/Models/ContasFiltroModel.php';

  use App\DAO\ClienteDAO;
  use App\DAO\ContasDAO;
use App\Models\ClienteModel;
use App\Models\ContasFiltroModel;
use App\Models\ContasModel;

  $contasDAO = new ContasDAO();
  $model = new ContasModel();
  $clienteDAO = new ClienteDAO();
  $cliente = new ClienteModel();
  $clienteLista = $clienteDAO->getAll("nome", "");

  $valorPagar = 0;
  $valorPago = 0;
  $codigo = 0;
  $situacao = "T";

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $codigo = filter_input(INPUT_POST, 'idCliente');
    $data_Emi_inicial = filter_input(INPUT_POST, 'data_emi_inicial');
    $data_Emi_final = filter_input(INPUT_POST, 'data_emi_final');
    $data_venc_inicial = filter_input(INPUT_POST, 'data_venc_inicial');
    $data_venc_final = filter_input(INPUT_POST, 'data_venc_final');
    $data_pag_inicial = filter_input(INPUT_POST, 'data_pag_inicial');
    $data_pag_final = filter_input(INPUT_POST, 'data_pag_final');
    $situacao = filter_input(INPUT_POST, 'cbo_situacao');    
  }

  if (isset($_POST['btnPesquisar']))
  {
    $filtro = new ContasFiltroModel();
    $filtro->tipo = "R";
    $filtro->situacao = $_POST['cbo_situacao'];
    $filtro->dataEmissaoInicial = $_POST['data_emi_inicial'];
    $filtro->dataEmissaoFinal = $_POST['data_emi_final'];

    $filtro->dataVencimentoInicial = $_POST['data_venc_inicial'];
    $filtro->dataVencimentoFinal = $_POST['data_venc_final'];

    $filtro->dataPagamentoInicial = $_POST['data_pag_inicial'];
    $filtro->dataPagamentoFinal = $_POST['data_pag_final'];
    $filtro->pessoaId = $_POST['idCliente'];

    $filtro->campoOrdem = "situacao, data_pago DESC, data_vencto";

    $model = $contasDAO->getAll($filtro);
  }

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Menu Principal</title>
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="css/chosen.css">
</head>
<body>

<div class="container">
    <h4>Contas a Receber</h4>
    <form id="pagar-form" name="receber" action="contas_receber.php" method="post">
        <div class="row">
            <div class="form-group col-sm-4">
              <label id="lblContato">Contato</label>
                <select name="idCliente" id="idCliente" class="form-control escolher" value="">
                  <option value="0">--Todos--</option>
                      <?php
                          foreach($clienteLista as $cli)
                          {
                            if ($codigo == $cli->codigo)
                              echo '<option value=' .$cli->codigo .' selected="selected"'.'>'. $cli->nome .'</option>';
                            else
                              echo '"<option value="' .$cli->codigo .'">'. $cli->nome .'</option>"';
                          }
                      ?>;
                </select>
            </div>
            <div class="form-group col-sm-2">
                <label>Situação</label>
                <select name="cbo_situacao" id="cbo_situacao" class="form-control escolher" value="">
                  <option value="T" <?php echo $situacao == "T" ? 'selected' : ''?>>Todos</option>
                  <option value="A" <?php echo $situacao == "A" ? 'selected' : ''?>>Abertas</option>
                  <option value="P" <?php echo $situacao == "P" ? 'selected' : ''?>>Pagas</option>
                </select>
            </div>
            <div class="form-group col-sm-3">
                <label>Emissão Inicial</label>
                <input type="date" id="data_emi_inicial" name="data_emi_inicial" class="form-control" value="<?=$data_Emi_inicial ?>">
            </div>
            <div class="form-group col-sm-3">
                <label>Emissão Final</label>
                <input type="date" id="data_emi_final" name="data_emi_final" class="form-control" value="<?=$data_Emi_final ?>">
            </div>
        </div>
        <div class="row">
          <div class="form-group col-sm-3">
                <label>Vencimento Inicial</label>
                <input type="date" id="data_venc_inicial" name="data_venc_inicial" class="form-control" value="<?=$data_venc_inicial ?>">
          </div>
          <div class="form-group col-sm-3">
                <label>Vencimento Final</label>
                <input type="date" id="data_venc_final" name="data_venc_final" class="form-control" value="<?=$data_venc_final ?>">
          </div>
          <div class="form-group col-sm-3">
                <label>Pagamento Inicial</label>
                <input type="date" id="data_pag_inicial" name="data_pag_inicial" class="form-control" value="<?=$data_pag_inicial ?>">
          </div>
          <div class="form-group col-sm-3">
                <label>Pagamento Final</label>
                <input type="date" id="data_pag_final" name="data_pag_final" class="form-control" value="<?=$data_pag_final ?>">
          </div>
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
          <th>Data Recebimento</th>
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
          $modelConta->setDataPago($item->data_pago);

          $valorPagar = $valorPagar + $item->valor_pagar;
          $valorPago = $valorPago + $item->valor_pago;
          ?>
          <tr>
          <td > <?php echo $item->documento ?></td>
          <td> <?php echo $modelConta->getDataEmissao(); ?></td>
          <td> <?php echo $modelConta->getDataVencto(); ?></td>
          <td align="right"> <?php echo $modelConta->getValorPagar() ?></td>
          <td > <?php echo $modelConta->getDataPago(); ?></td>
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
        <label><b>Valor Recebido</b></label>
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
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<!-- <script src="js/chosen.jquery.js" type="text/javascript"></script> -->
<script type="text/javascript" src="js/chosen.jquery.js"></script>

<script type="text/javascript">
  $(document).ready( function ()
  {
    $('.escolher').chosen(); 

    // $("#idCliente").on('change', function() {
    //   var option = $(this).find('option:selected').text();
    //   $('#lblContato').html("Contato: "+option);
    //   });

    });
</script>
</html>