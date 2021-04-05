<?php
session_start();

use App\DAO\ContaBancoDAO;
use App\Models\ContaBancoModel;

  require_once 'cabecalho.php';
  //require_once 'security.php';

  require_once 'App/DAO/ContaBancoDAO.php';
  require_once 'App/Models/ContaBancoModel.php';

  $id = $_GET['id'] ?? 0;

  $contaBancoDao = new ContaBancoDAO();
  $contaBanco = new ContaBancoModel();
  $contaBanco = $contaBancoDao->find($id);
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
    <h4><b>Detalhes Conta Bancária</b></h4>
    <hr>
</div>

<div class="container">
    <div class="row">
        <div class="col-sm-6">
            <label>Nro Conta</label>
            <input type="texto" class="form-control" value="<?php echo $contaBanco->num_conta ?>">
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <label>Agência</label>
            <input type="texto" class="form-control" value="<?php echo $contaBanco->agencia ?>">
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <label>Banco</label>
            <input type="texto" class="form-control" value="<?php echo $contaBanco->nome_banco ?>">
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <label>CNPJ/CPF</label>
            <input type="texto" class="form-control" value="<?php echo $contaBanco->cnpj_cpf ?>">
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