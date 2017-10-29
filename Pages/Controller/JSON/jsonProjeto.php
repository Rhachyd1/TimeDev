<?php 

include_once "../../Model/Projeto.php";
include_once "../../Persistence/DAO_Object/DAOProjeto.php";
$adm = new DAOProjeto();

$json = $adm->ExibeProjetos();

echo json_encode($json);


?>