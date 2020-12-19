<?php
session_start();

use App\DAO\ClienteDAO;
use App\Models\ClienteModel;

  require_once 'cabecalho.php';
  //require_once 'security.php';

  require_once 'App/DAO/ClienteDAO.php';
  require_once 'App/Models/ClienteModel.php';

  $id = $_GET['id'] ?? 0;

  $clienteDao = new ClienteDAO();
  $cliente = new ClienteModel();
  $cliente = $clienteDao->find($id);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Detalhes Transporte</title>
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
</head>
<body>

<div class="container">
    <h4><b>Detalhes Cliente</b></h4>
    <hr>
</div>

<div class="container">
    <div class="row">
        <div class="col-sm-6">
            <label>Nome</label>
            <input type="texto" class="form-control" value="<?php echo $cliente->nome ?>">
        </div>
        <div class="col-sm-4">
            <label>Nome Fantasia</label>
            <input type="texto" class="form-control" value="<?php echo $cliente->fantasia ?>">
        </div>
        <div class="col-sm-2">
            <label>Data Cadastro</label>
            <input type="texto" class="form-control" value="<?php echo date("d/m/Y", strtotime($cliente->data_cadastro)) ?>">
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3">
            <label>CNPJ</label>
            <input type="texto" class="form-control" value="<?php echo $cliente->cnpj ?>">
        </div>
        <div class="col-sm-3">
            <label>Inscrição Estadual</label>
            <input type="texto" class="form-control" value="<?php echo $cliente->insc_estadual ?>">
        </div>
        <div class="col-sm-3">
            <label>CPF</label>
            <input type="texto" class="form-control" value="<?php echo $cliente->cpf ?>">
        </div>
        <div class="col-sm-3">
            <label>RG</label>
            <input type="texto" class="form-control" value="<?php echo $cliente->rg ?>">
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <label>Endereço</label>
            <input type="texto" class="form-control" value="<?php echo $cliente->endereco ?>">
        </div>
        <div class="col-sm-2">
            <label>Número</label>
            <input type="texto" class="form-control" value="<?php echo $cliente->numero ?>">
        </div>
        <div class="col-sm-4">
            <label>Complemento</label>
            <input type="texto" class="form-control" value="<?php echo $cliente->complemento ?>">
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4">
            <label>Cidade</label>
            <input type="texto" class="form-control" value="<?php echo $cliente->nome_cidade ?>">
        </div>
        <div class="col-sm-4">
            <label>CEP</label>
            <input type="texto" class="form-control" value="<?php echo $cliente->cep ?>">
        </div>
        <div class="col-sm-4">
            <label>UF</label>
            <input type="texto" class="form-control" value="<?php echo $cliente->uf ?>">
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3">
            <label>Telefone</label>
            <input type="texto" class="form-control" value="<?php echo $cliente->fone ?>">
        </div>
        <div class="col-sm-3">
            <label>Fax</label>
            <input type="texto" class="form-control" value="<?php echo $cliente->fax ?>">
        </div>
        <div class="col-sm-6">
            <label>Email</label>
            <input type="texto" class="form-control" value="<?php echo $cliente->email ?>">
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <label>Observação</label>
            <textarea class="form-control" id="obs" rows="3"><?php echo $cliente->obs ?></textarea>
        </div>
    </div>
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