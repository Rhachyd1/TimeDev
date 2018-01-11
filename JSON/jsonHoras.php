<?php     
    include_once '../Model/Horas.php';
    session_start();
    header('Content-Type: application/json');     
    $hora = new Horas();   
    $time = $hora->exibeHoras($_SESSION['Usuario']);  
    echo json_encode($time);  
?>

