<?php
include_once '../Model/Projeto.php';
$proj = new Projeto();
$proj->prepRemocao($_POST['id']);
$proj->RemoveProjeto();


?>