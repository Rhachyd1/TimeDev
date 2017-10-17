<?php
    include_once '../Model/Usuario.php';
    $temp =json_decode( $_POST['usuario'] );   
    $usuario = new Usuario();
    $tempend = json_decode($_POST['endereco']);
    var_dump($tempend);  
    $usuario->novoUsuario($temp->nome, $temp->sobrenome, $temp->cargo, $temp->telCel, $temp->cpf, $temp->login ,$temp->senha);   
    echo $usuario->getId();  
    die();
    $usuario->insereUsuario();
    $endereco = new Endereco();
    $endereco->novoEndereco($tempend->rua,$tempend->bairro,$tempend->telRes,$tempend->estado, $usuario->getId());
    
    
?>