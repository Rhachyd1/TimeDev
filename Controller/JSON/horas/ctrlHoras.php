<?php 
    
    include_once '../../../Persistence/DAO_Object/DAOHoras.php';

    session_start();
    header('Content-Type: application/json');
     
    $hora = new DAOHoras(); 
  
    $time = $hora->exibeHoras($_SESSION['Usuario']['id']);
  
    echo json_encode($time);
  
   
    
  
?>

