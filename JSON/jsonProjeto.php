<?php 
    include_once '../Model/Projeto.php';
    $proj = new Projeto();
    $json = $proj->ExibeProjetos();   
    echo json_encode($json);
?>