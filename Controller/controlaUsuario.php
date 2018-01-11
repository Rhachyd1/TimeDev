<?php
    include_once '../Model/Usuario.php';
    include_once '../Model/Endereco.php';
    $temp =json_decode( $_POST['usuario'] );   
    $usuario = new Usuario();
    $tempend = json_decode($_POST['endereco']);
    var_dump($_POST['usuario']);
    var_dump($_POST['endereco']); 
    $usuario->novoUsuario($temp->nome, $temp->sobrenome, $temp->cargo, $temp->telCel, $temp->cpf, $temp->login ,$temp->senha);
    $usuario->codCargo($temp->cargo);   
    $usuario->insereUsuario();
    $endereco = new Endereco();   
    $endereco->novoEndereco($tempend->rua,$tempend->bairro,$tempend->telRes,$tempend->estado, $tempend->municipio, $tempend->cep);  
    $endereco->insereEndereco($usuario->getId());
   
    
?>