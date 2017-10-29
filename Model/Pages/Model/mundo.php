<?php 
include_once '../Persistence/Conexao.php';
include_once '../Controller/ctrlUsuario.php';
include_once 'Usuario.php';

printf("Ola Mundo!");

$teste = new ctrlUsuario();
$teste->Login();
echo '<br>'.$_SESSION['usuario'];


?>