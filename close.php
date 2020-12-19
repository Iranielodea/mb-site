<?php
$_SESSION['idUsuario'] = "";
unset($_SESSION['idUsuario']);
//unset($_SESSION['secury']);
unset($_SESSION['errorLogin']);
//$_SESSION['secury'] = "Erro faça login";
//session_destroy();
header("Location: login.php");

// if ($_SESSION['idUsuario'] == null){
//     $_SESSION['secury'] = "Erro faça login";
//     header("Location: login.php");
// }
//header("Location: login.php");