<?php
include_once '../Model/Equipe.php';

$e = new Equipe();
$a=$e->ExibeUserProjeto($_POST["d"]);
echo json_encode($a);


?>