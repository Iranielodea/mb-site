<?php
session_start();

use App\DAO\ContasDAO;
use App\Models\ContaBancoModel;
use App\Models\ContasModel;

  require_once 'cabecalho.php';
  //require_once 'security.php';

  require_once 'App/DAO/ContasDAO.php';
  require_once 'App/Models/ContasModel.php';
  require_once 'App/Models/ContaBancoModel.php';

  $id = $_GET['id'] ?? 0;
  $tipo = $_GET['tipo'];

  $tituloPessoa = '';
  $nomePessoa = '';

  $contasDAO = new ContasDAO();
  $contas = new ContasModel();
  $contasResultado = $contasDAO->obterPorId($id);

  $contaModel = new ContasModel();
  $contaBancoModel = new ContaBancoModel();
  $contaModel->setNomeCliente($contasResultado->nome_cliente);
  $contaModel->setDocumento($contasResultado->documento);
  $contaModel->setDataEmissao($contasResultado->data_emissao);
  $contaModel->setDataVencto($contasResultado->data_vencto);
  $contaModel->setValorPagar($contasResultado->valor_pagar);
  $contaModel->setNomeFormaPagto($contasResultado->nome_forma_pagto);
  $contaModel->setDataPago($contasResultado->data_pago);
  $contaModel->setValorPago($contasResultado->valor_pago);
  $contaModel->setSituacao($contasResultado->situacao);
  $contaModel->setNomeFornecedor($contasResultado->nome_fornecedor);
  $contaModel->setDataPago($contasResultado->data_pago);
  $contaBancoModel->setNumConta($contasResultado->num_conta);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Detalhes Conta Bancária</title>
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
</head>
<body>

<div class="container">
    <?php
        if ($tipo == 'R')
        {
            $tituloPessoa = 'Cliente';
            $nomePessoa = $contaModel->getNomeCliente();
            echo '<h4><b>Detalhes Contas a Receber</b></h4>';
        }
        else
        {
            $tituloPessoa = 'Fornecedor';
            $nomePessoa = $contaModel->getNomeFornecedor();
            echo '<h4><b>Detalhes Contas a Pagar</b></h4>';
        }
    ?>
    <hr>
</div>

<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <label><?php echo $tituloPessoa ?></label>
            <input type="texto" class="form-control" value="<?php echo $nomePessoa ?>">
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4">
            <label>Documento</label>
            <input type="texto" class="form-control" value="<?php echo $contaModel->getDocumento(); ?>">
        </div>
        <div class="col-sm-4">
            <label>Data Emissão</label>
            <input type="texto" class="form-control" value="<?php echo $contaModel->getDataEmissao(); ?>">
        </div>
        <div class="col-sm-4">
            <label>Data Vencimento</label>
            <input type="texto" class="form-control" value="<?php echo $contaModel->getDataVencto(); ?>">
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4">
            <label>Valor Pagar</label>
            <input type="texto" class="form-control" value="<?php echo $contaModel->getValorPagar(); ?>">
        </div>
        <div class="col-sm-4">
            <label>Forma de Pagamento</label>
            <input type="texto" class="form-control" value="<?php echo $contaModel->getNomeFormaPagto(); ?>">
        </div>
        <div class="col-sm-4">
            <label>Nro Conta</label>
            <input type="texto" class="form-control" value="<?php echo $contaBancoModel->getNumConta(); ?>">
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3">
            <label>Data de Pagamento</label>
            <input type="texto" class="form-control" value="<?php echo $contaModel->getDataPago(); ?>">
        </div>
        <div class="col-sm-3">
            <label>Valor do Pagamento</label>
            <input type="texto" class="form-control" value="<?php echo $contaModel->getValorPago(); ?>">
        </div>
        <div class="col-sm-3">
            <label>Situação</label>
            <input type="texto" class="form-control" value="<?php echo $contaModel->getSituacao(); ?>">
        </div>
    </div>
    <!-- <div class="row">
        <div class="col-sm-6">
            <label>Valor Pagar</label>
            <input type="texto" class="form-control" value="<?php echo $contas->valor_pagar ?>">
        </div>
    </div> -->
    <div class="row">
        <div class="col-sm-12">
            <hr>
            <button class="btn primary btn-primary" onclick="history.go(-1);">Voltar</button>
        </div>
    </div>
    
</div>


<?php
    require_once 'rodape.php';
  ?>
  <script type="text/javascript" src="js/bootstrap.js"></script>
  <script type="text/javascript" src="js/jquery.js"></script>
  <script type="text/javascript" src="js/bootstrap.minjs"></script>
</body>
</html>