<?php 

include_once '../Model/Equipe.php';
$e = new Equipe();
$b=$_POST["d"];
$a = $e->buscaEquipe($b);
echo json_encode($a);



?>