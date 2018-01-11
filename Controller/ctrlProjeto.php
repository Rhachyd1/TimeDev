<?php 

include_once "../Model/Projeto.php";
$temp = json_decode($_POST['jproj']);
var_dump(($temp));
$p= new Projeto();
$p->montaProjeto($temp);
$p->AdicionaProjeto();




?>