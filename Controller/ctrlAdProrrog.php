<?php 
include_once '../Model/Projeto.php';
var_dump($_POST);
$proj = new Projeto();
$proj->adProrrog($_POST['prog'], $_POST['id'] );
$proj->ProrrogaProjeto();
die();

?>