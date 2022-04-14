<?php
session_start();

use App\DAO\UsuarioDAO;

require_once 'App/DAO/UsuarioDAO.php';

$usuarioDao = new UsuarioDAO();

if (isset($_POST['btnLogar'])){
    $usuarioDao->getUser($_POST['usuario'], $_POST['senha']);
}

require_once 'cabecalho.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Menu Principal</title>
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  <link href="css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
</head>
<body>
  <div id="login">
      <!-- <h3 class="text-center text-white pt-5">Login form</h3> -->
      <div class="container">
          <div id="login-row" class="row justify-content-center align-items-center">
              <div id="login-column" class="col-md-6">
                  <div id="login-box" class="col-md-12">
                      <form id="login-form" class="form" action="login.php" method="post">
                          <h3 class="text-center text-info">Login</h3>
                          <div class="form-group">
                              <label for="username" class="text-info">Usuário:</label><br>
                              <input type="text" name="usuario" id="usuario" class="form-control">
                          </div>
                          <div class="form-group">
                              <label for="password" class="text-info">Senha:</label><br>
                              <input type="password" name="senha" id="senha" class="form-control">
                          </div>
                          <div class="form-group">
                              <input type="submit" name="btnLogar" id="btnLogar" class="btn btn-info btn-md" value="Entrar">
                          </div>
                      </form>
                      <p class="text-center text-danger">
                            <?php
                                if (isset($_SESSION['errorLogin'])){
                                    echo $_SESSION['errorLogin'];
                                    unset($_SESSION['errorLogin']);
                                }
                            ?>
                        </p>
                        <!-- <p class="text-center text-danger">
                            <?php
                                // if (isset($_SESSION['secury'])){
                                //     echo $_SESSION['secury'];
                                //     unset($_SESSION['secury']);
                                // }
                            ?>
                        </p> -->
                  </div>
              </div>
          </div>
      </div>
  </div>
    
  <script type="text/javascript" src="js/bootstrap.js"></script>
  <script type="text/javascript" src="js/jquery.js"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>