<?php 
    include_once '../../../Persistence/DAO_Object/DAOUsuario.php';    
    header('Content-Type: application/json');
    session_start();
    $usuario = new DAOUsuario();   
    $user = $usuario->exibeUsuario($_SESSION['Usuario']['id']);
    echo json_encode($user); 
  
?>

