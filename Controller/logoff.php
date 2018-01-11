<?php
include '../Model/Usuario.php';
session_start();
$u = new Usuario();
$u->Logoff($_SESSION['Usuario']['id']);

if($_SESSION['Usuario']!=null){
    $_SESSION['Usuario'] =null;
}
session_destroy();
header("Location: ../View/Login.html");
die();

?>