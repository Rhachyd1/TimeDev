<?php
include '../Model/Usuario.php';

$temp = json_decode($_POST['d']);
var_dump($temp);
$usuario = new Usuario();
$usuario->Matricula($temp);
$usuario->RemoveUsuario();
die();
?>