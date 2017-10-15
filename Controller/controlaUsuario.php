<?php
    include_once '../Model/Usuario.php';
    $temp =json_decode( $_POST['usuario'] );   
    $usuario = new Usuario();
    
  
    $usuario->novoUsuario($temp->nome, $temp->sobrenome, $temp->cargo, $temp->telCel, $temp->cpf, $temp->login ,$temp->senha);
    $usuario->insereUsuario();
?>