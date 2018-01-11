<?php 
include_once '../Persistence/DAO_Object/DAOUsuario.php';
            
class Usuario{

    private $nome;
    private $sobrenome;
    private $cargo;
    private $login;
    private $telcel;
    private $cpf;
    private $senha;
    private $id;
    private $saidajson;
    private $matricula;


public function novoUsuario($n, $sn, $c, $tc, $cpf,  $l, $s){
     $this->nome = $n;
     $this->sobrenome = $sn;
     $this->cargo = $c;
     $this->login = $l;
     $this->telcel = $tc;
     $this->cpf = $cpf;
     $this->senha = $s;     
}
public function Matricula($m){
    $this->matricula = $m;
}
public function getLogin(){
    return $this->login;
}
public function getId(){
    $dao = new DAOUsuario();
    $this->id = $dao->buscaId($this->login, $this->senha);
    return $this->id;
}
public function getSenha(){
    return $this->senha;
}
public function getJson(){
    return $this->saidajson;
}

public function getNome(){
    return $this->nome;
}
public function getSobrenome(){
     return $this->sobrenome;
}
public function getDataNasc(){
    return $this->dataNasc;    
}
public function montaLogin($s, $l){
    $this->login = $l;
    $this->senha = $s;
    $dao = new DAOUsuario();
    $ret = $dao->Login($l, $s);
    return $ret;
}
  public function exibeUsuario($i){
      $dao = new DAOUsuario();
     $j = $dao->exibeUsuario($i);
      return $j;     
  } 
 public function exibeTodosEnd(){      
     $dao = new DAOUsuario();
     $temp = $dao->ExibeTodosEnd($this->nome, $this->sobrenome, $this->matricula, $this->telcel,$this->cpf); 
     return $temp;
     
   
}
public function codCargo($c){
    $this->cargo = $c;
    if ($this->cargo=="Administrador"){
        $this->matricula="100";
    }elseif ($this->cargo=="Gestor"){
        $this->matricula="110";
    }else{
        $this->matricula="120";
    }    
}    
public function insereUsuario(){
 $dao = new DAOUsuario();
 $this->matricula;
 $this->id = $dao->insereUsuario($this->nome, $this->sobrenome,$this->telcel, $this->cpf,$this->cargo,$this->login,$this->senha);
 $dao->insereMatricula($this->id,$this->matricula);
}
public function Logoff($i){
    $dao = new DAOUsuario();
    $dao->Logoff($i);
}
public function AtualizaUsuario(){
    $dao = new DAOUsuario();
    $dao->AtualizaUsuario($this->nome, $this->sobrenome,$this->telcel, $this->cargo,$this->cpf,$this->matricula);  
}
public function RemoveUsuario(){
    $dao = new DAOUsuario();
    $dao->RemoveUsuario($this->matricula);
}
public function retornaUsuario(){
    $dao = new DAOUsuario();
    $json = $dao->retornaUsuario();
    return $json;
}
}
?>