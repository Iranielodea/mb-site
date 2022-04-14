<?php
session_start();

use App\DAO\TransportadoraDAO;
use App\Models\TransportadoraModel;

  require_once 'cabecalho.php';
  //require_once 'security.php';

  require_once 'App/DAO/TransportadoraDAO.php';
  require_once 'App/Models/TransportadoraModel.php';

  $id = $_GET['id'] ?? 0;

  $tansportadoraDao = new TransportadoraDAO();
//   $transportadoraModel = new TransportadoraModel();
  $transportadora = $tansportadoraDao->find($id);
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
    <h4><b>Detalhes Transportadora</b></h4>
  </div>

  <div class="container">
    <div class="row">
        <div class="col-sm-6">
            <label>Nome</label>
            <input type="texto" class="form-control" id="nome" name="nome" value="<?php echo $transportadora->nome ?>">
        </div>

        <div class="col-sm-2">
            <label>CNPJ</label>
            <input type="texto" class="form-control" value="<?php echo $transportadora->cnpj ?>">
        </div>

        <div class="col-sm-2">
            <label>Inscrição Estadual</label>
            <input type="texto" class="form-control" value="<?php echo $transportadora->insc_estadual ?>">
        </div>

        <div class="col-sm-2">
            <label>CPF</label>
            <input type="texto" class="form-control" value="<?php echo $transportadora->cpf_transp ?>">
        </div>
    </div>

    <div class="row">
        <div class="col-sm-6">
            <label>Endereço</label>
            <input type="texto" class="form-control" value="<?php echo $transportadora->endereco ?>">
        </div>
            
        <div class="col-sm-6">
            <label>Bairro</label>
            <input type="texto" class="form-control" value="<?php echo $transportadora->bairro ?>">
        </div>   
    </div>

    <div class="row">
        <div class="col-sm-4">
            <label>Cidade</label>
            <input type="texto" class="form-control" value="<?php echo $transportadora->nome_cidade ?>">
        </div>
            
        <div class="col-sm-4">
            <label>CEP</label>
            <input type="texto" class="form-control" value="<?php echo $transportadora->cep ?>">
        </div>   

        <div class="col-sm-4">
            <label>UF</label>
            <input type="texto" class="form-control" value="<?php echo $transportadora->uf ?>">
        </div>   
    </div>

    <div class="row">
        <div class="col-sm-3">
            <label>DDD</label>
            <input type="texto" class="form-control" value="<?php echo $transportadora->ddd ?>">
        </div>
            
        <div class="col-sm-3">
            <label>Telefone</label>
            <input type="texto" class="form-control" value="<?php echo $transportadora->fone1 ?>">
        </div>   

        <div class="col-sm-3">
            <label>Telefone2</label>
            <input type="texto" class="form-control" value="<?php echo $transportadora->fone2 ?>">
        </div>

        <div class="col-sm-3">
            <label>Fax</label>
            <input type="texto" class="form-control" value="<?php echo $transportadora->fax ?>">
        </div>
    </div>

    <div class="row">
        <div class="col-sm-6">
            <label>Contato</label>
            <input type="texto" class="form-control" value="<?php echo $transportadora->contato ?>">
        </div>
                
        <div class="col-sm-6">
            <label>Email</label>
            <input type="texto" class="form-control" value="<?php echo $transportadora->email ?>">
        </div>   
    </div>

    <div class="row">
        <div class="col-sm-12">
            <label>Observação</label>
            <!-- <input type="texto" class="form-control" value="<?php echo $transportadora->obs ?>"> -->
            <textarea class="form-control" id="obs" rows="3"><?php echo $transportadora->obs ?></textarea>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-4">
            <label>Nro.Banco</label>
            <input type="texto" class="form-control" value="<?php echo $transportadora->num_banco ?>">
        </div>

        <div class="col-sm-4">
            <label>Nome Banco</label>
            <input type="texto" class="form-control" value="<?php echo $transportadora->nome_banco ?>">
        </div>

        <div class="col-sm-4">
            <label>Nro Agência</label>
            <input type="texto" class="form-control" value="<?php echo $transportadora->num_agencia ?>">
        </div>
    </div>

    <div class="row">
        <div class="col-sm-6">
            <label>Nro.Conta</label>
            <input type="texto" class="form-control" value="<?php echo $transportadora->num_conta ?>">
        </div>

        <div class="col-sm-6">
            <label>Nome Títular</label>
            <input type="texto" class="form-control" value="<?php echo $transportadora->nome_titular ?>">
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <hr>
            <button class="btn primary btn-primary" onclick="history.go(-1);">Voltar</button>
        </div>
    </div>
</div>

    
</div>

  <?php
    require_once 'rodape.php';
  ?>
  <script type="text/javascript" src="js/bootstrap.js"></script>
  <script type="text/javascript" src="js/jquery.js"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>