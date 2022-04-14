<?php 
  session_start();
  header('Cache-Control: no cache');
  require_once 'security.php';
  require_once 'cabecalho.php';
  require_once 'App/Models/ContaBancoModel.php';
  require_once 'App/DAO/ContaBancoDAO.php';
// use App\Models;
use App\DAO\ContaBancoDAO;
use App\Models\ContaBancoModel;

$clienteDAO = new ContaBancoDAO();
$model = new ContaBancoModel();
$texto = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $texto = filter_input(INPUT_POST, 'texto');    
}

if (isset($_POST['btnPesquisar']))
  $model = $clienteDAO->getAll($_POST['campos'], $_POST['texto']);

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
<h4>Contas Bancárias</h4>
<form class="form-inline" id="conta_banco-form" action="conta_banco.php" method="post">
  <div class="form-group mb-2">
    <label for="staticEmail2" class="sr-only">Campos</label>
    <select name="campos" id="campos" class="form-control">
      <option value="codigo">Código</option>
      <option value="num_conta">Nro Conta</option>
      <option value="agencia">Agência</option>
      <option value="nome_banco">Banco</option>
    </select">
    <!-- <input type="text" readonly class="form-control-plaintext" id="staticEmail2" value="email@exemplo.com"> -->
  </div>
  <div class="form-group mx-sm-3 mb-2">
    <label for="inputPassword2" class="sr-only">Texto a pesquisar</label>
    <input type="text" class="form-control" id="texto" name="texto" placeholder="Texto a Pesquisar", value="<?=$texto?>">
  </div>
  <button type="submit" class="btn btn-primary mb-2" id="btnPesquisar" name="btnPesquisar">Pesquisar</button>
</form>
</div>

<div class="container">
  <div class="table-responsive table-striped table-hover">
    <table class="table">
      <thead class="thead-dark">
        <tr>
          <th>Código</th>
          <th>Nro Conta</th>
          <th>Agência</th>
          <th>Banco</th>
          <th>Ação</th>
        </tr>
      </thead>
      <tbody>
      <?php
        foreach($model as $item)
        {?>
          <tr>
          <td > <?php echo $item->codigo ?></td>
          <td> <?php echo $item->num_conta ?></td>
          <!-- <td class="hidden-xs"> <?php echo $item->num_conta ?></td> -->
          <td> <?php echo $item->agencia ?></td>
          <td> <?php echo $item->nome_banco ?></td>

          <td ><a href='conta_banco_detalhe.php?id= <?php echo $item->id ?>'><button class='btn primary btn-primary'>Detalhes</button></a></td>
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