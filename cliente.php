<?php 
  session_start();
  header('Cache-Control: no cache');
  require_once 'security.php';
  require_once 'cabecalho.php';
  require_once 'App/Models/ClienteModel.php';
  require_once 'App/DAO/UsuarioDAO.php';
  require_once 'App/DAO/ClienteDAO.php';
use App\DAO\UsuarioDAO;
use App\Models;
use App\DAO\ClienteDAO;
use App\Models\ClienteModel;

$clienteDao = new ClienteDAO();
$clientes = new ClienteModel();

if (isset($_POST['btnPesquisar']))
  $clientes = $clienteDao->getAll($_POST['campos'], $_POST['texto']);



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
<h4>Clientes</h4>
<form class="form-inline" id="cliente-form" action="cliente.php" method="post">
  <div class="form-group mb-2">
    <label for="staticEmail2" class="sr-only">Campos</label>
    <select name="campos" id="campos" class="form-control">
      <option value="nome">Nome</option>
      <option value="cnpj">CNPJ</option>
      <option value="fone">Telefone</option>
      <option value="email">Email</option>
    </select">
    <!-- <input type="text" readonly class="form-control-plaintext" id="staticEmail2" value="email@exemplo.com"> -->
  </div>
  <div class="form-group mx-sm-3 mb-2">
    <label for="inputPassword2" class="sr-only">Texto a pesquisar</label>
    <input type="text" class="form-control" id="texto" name="texto" placeholder="Texto a Pesquisar">
  </div>
  <button type="submit" class="btn btn-primary mb-2" id="btnPesquisar" name="btnPesquisar">Pesquisar</button>
</form>
</div>

<div class="container">
  <div class="table-responsive table-striped table-hover">
    <table class="table">
      <thead class="thead-dark">
        <tr>
          <th>Nome</th>
          <!-- <th class="hidden-xs">CNPJ</th> -->
          <!-- <th class="hidden-xs">Telefone</th>
          <th class="hidden-xs">Email</th> -->
          <th>Telefone</th>
          <th>Email</th>
          <th>Ação</th>
        </tr>
      </thead>
      <tbody>
      <?php
        foreach($clientes as $cliente)
        {?>
          <tr>
          <td > <?php echo $cliente->nome ?></td>
          <!-- <td class="hidden-xs"> <?php echo $cliente->cnpj ?></td> -->
          <td> <?php echo $cliente->fone ?></td>
          <td> <?php echo $cliente->email ?></td>
          <!-- <td class="hidden-xs"> <?php echo $cliente->fone ?></td>
          <td class="hidden-xs"> <?php echo $cliente->email ?></td> -->

          <td ><a href='cliente_detalhe.php?id= <?php echo $cliente->id ?>'><button class='btn primary btn-primary'>Detalhes</button></a></td>
          <!-- <td><a href='transportadora_editar.php?id={$transportadora->id}'>Detalhes</a></td> -->
          </tr>
        <?php } ?>
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