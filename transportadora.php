<?php 
  session_start();
  header('Cache-Control: no cache');
  require_once 'security.php';
  //function __autoload($class_name){
  //  require_once 'App/DAO/'. $class_name . '.php';
    //require_once 'App/Models/'. $class_name . '.php';
    //require_once $class_name . '.php';
  //}
  require_once 'cabecalho.php';
  require_once 'App/Models/TransportadoraModel.php';
  require_once 'App/DAO/UsuarioDAO.php';
  require_once 'App/DAO/TransportadoraDAO.php';
use App\DAO\UsuarioDAO;
use App\Models;
use App\DAO\TransportadoraDAO;
use App\Models\TransportadoraModel;

$tansportadoraDao = new TransportadoraDAO();
$transportadoras = new TransportadoraModel();
$texto = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $texto = filter_input(INPUT_POST, 'texto');    
}

if (isset($_POST['btnPesquisar']))
  $transportadoras = $tansportadoraDao->getAll($_POST['campos'], $_POST['texto']);

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
<h4>Transportadoras</h4>
<form class="form-inline" id="transportadora-form" action="transportadora.php" method="post">
  <div class="form-group mb-2">
    <label for="staticEmail2" class="sr-only">Campos</label>
    <select name="campos" id="campos" class="form-control">
      <option value="nome">Nome</option>
      <option value="cnpj">CNPJ</option>
      <option value="cpf">CPF</option>
    </select">
    <!-- <input type="text" readonly class="form-control-plaintext" id="staticEmail2" value="email@exemplo.com"> -->
  </div>
  <div class="form-group mx-sm-3 mb-2">
    <label for="inputPassword2" class="sr-only">Texto a pesquisar</label>
    <input type="text" class="form-control" id="texto" name="texto" placeholder="Texto a Pesquisar" value="<?=$texto?>">
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
          <th class="hidden-xs">CNPJ</th>
          <th class="hidden-xs">Telefone</th>
          <th>Ação</th>
        </tr>
      </thead>
      <tbody>
      <?php
        foreach($transportadoras as $transportadora)
        {?>
          <tr>
          <td > <?php echo $transportadora->nome ?></td>
          <td class="hidden-xs"> <?php echo $transportadora->cnpj ?></td>
          <td class="hidden-xs"> <?php echo $transportadora->fone1 ?></td>
          <td ><a href='transporte_detalhe.php?id= <?php echo $transportadora->id ?>'><button class='btn primary btn-primary'>Detalhes</button></a></td>
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
<script type="text/javascript" src="js/bootstrap.min.js"></script>

</html>