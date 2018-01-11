<?php
include_once "../Model/Equipe.php";
$e = new Equipe();
$e->NovaEquipe($_POST["nEquipe"],$_POST["idProj"]);
$e->InsereEquipe();
?>