<?php 
include_once "../Persistence/DAO_Object/DAOProjeto.php";
include_once "../Model/Projeto.php";

echo $_POST['selfase']."<br>".$_POST['nm']."<br>".$_POST['dtIn']."<br>".$_POST['dtFm']."<br>"."<br>";
 
/* $dtin = date('d-m-Y', strtotime( $_POST['dtIn']) );
 $dtfim = date('d-m-Y', strtotime( $_POST['dtFm']) );
 $dtprog = date('d-m-Y', strtotime( $_POST['dtPr']) ); */

$dados=[":fase"=>$_POST['selfase'],
        ":nome"=>$_POST['nm'],
        ":dtIn"=>$_POST['dtIn'],
        ":dtFm"=>$_POST['dtFm']
];



$proj = new DAOProjeto();
$p= new Projeto();
$p->montaProjeto($dados);
$proj->AdicionaProjeto($p);



?>