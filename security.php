<?php
//ob_start();
// session_start();
//echo $_SESSION['idUsuario'];
//unset($_SESSION['idUsuario']);
// var_dump($_SESSION['idUsuario']);
// exit;
if ($_SESSION['idUsuario'] == null){
    //$_SESSION['secury'] = "Erro faça login";
    header("Location: login.php");
}