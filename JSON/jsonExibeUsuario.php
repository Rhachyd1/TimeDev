<?php
include '../Model/Usuario.php';

$u = new Usuario();
$j = $u->retornaUsuario();
echo json_encode($j);

?>