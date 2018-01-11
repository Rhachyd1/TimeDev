<?php 
    include_once '../Model/Usuario.php';    
    header('Content-Type: application/json');
    $temp = json_decode($_POST['d']);     
    $usuario = new Usuario();
    $usuario->novoUsuario($temp->nome, $temp->sobrenome,null, $temp->teleCel, $temp->cpf, null, null); 
    $usuario->Matricula($temp->matricula);
    $user = $usuario->exibeTodosEnd();
    echo json_encode($user);   
?>
