<?php
  session_start();
  require_once 'cabecalho.php';
  require_once 'security.php';
  
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
    <p>Seja bem Vindo!</p>
  </div>
  <?php
    require_once 'rodape.php';
  ?>
  <script type="text/javascript" src="js/bootstrap.js"></script>
  <!-- <script type="text/javascript" src="js/jquery.js"></script> -->
  <script type="text/javascript" src="js/bootstrap.minjs"></script>
</body>
</html>