<?php

include_once '../Model/Horas.php';
include_once '../Persistence/Conexao.php';
session_start();


$horas = new Horas();
$conexao = new Conexao();
echo date('H:m:s')."<br>";
echo date('Y-m-d');
?>