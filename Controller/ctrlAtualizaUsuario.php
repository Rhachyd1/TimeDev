<?php
include_once '../Model/Usuario.php';
include_once '../Model/Endereco.php';
$u = json_decode($_POST['u']);
$e = json_decode($_POST['e']);
$user = new Usuario();
$end = new Endereco();
$user->Matricula($u->matricula);
$user->novoUsuario($u->nome, $u->sobrenome, $u->cargo, $u->teleCel, $u->cpf, null, null);
$end->novoEndereco($e->rua,$e->bairro,$e->teRes,$e->estado, $e->mun, $e->cep);  
$user->AtualizaUsuario();
var_dump($end);
$end->atualizaEndereco($u->id);



?>