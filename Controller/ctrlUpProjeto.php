<?php
include_once '../Model/Projeto.php';
var_dump($_POST);
$proj = new Projeto();
$proj->montaAtualizar($_POST['c']);
$proj->AtualizaProjeto();
?>