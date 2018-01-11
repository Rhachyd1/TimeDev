<?php 
    include_once '../Model/Usuario.php';    
    header('Content-Type: application/json');
    session_start();
    $usuario = new Usuario();   
    $user = $usuario->exibeUsuario($_SESSION['Usuario']);
    echo json_encode($user);   
?>

