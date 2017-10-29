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



public function novoUsuario($n, $sn, $c, $tc, $cpf,  $l, $s){
     $this->nome = $n;
     $this->sobrenome = $sn;
     $this->cargo = $c;
     $this->login = $l;
     $this->telcel = $tc;
     $this->cpf = $cpf;
     $this->senha = $s;
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
  public function exibeUsuario(Conexao $con){
      session_start();
      $this->id = $_SESSION['Usuario'];
      $sql= "SELECT NOME, SOBRENOME, CPF FROM EMPREGADO WHERE IDEMPREGADO='$this->id'";
      $query = $con->retornaConexao();
      
    $result = $query->query($sql);
     $a=[
         "nome"=>"",
         "sobrenome"=>"",
         "cpf"=>"",
     ];
    $jsonUsuario=[];
      while ($linha = $result->fetch(PDO::FETCH_ASSOC)){
         $a["nome"]= $linha['NOME'];
         $a["sobrenome"]= $linha['SOBRENOME'];
         $a["cpf"]= $linha['CPF'];
        array_push($jsonUsuario,$a);
      }
     $this->saidajson = $jsonUsuario;
     
  } 
 public function exibeTodos(Conexao $con){      
      
      $sql= "SELECT * FROM EMPREGADO";
      $query = $con->retornaConexao();
      $result = $query->query($sql);
     $i=0;
     $json=[];
     $a=[
         "nome"=>"",
         "sobrenome"=>"",
         "cpf"=>"",
     ];
   
      while ($linha = $result->fetch(PDO::FETCH_ASSOC)){
          $a["nome"]= $linha['NOME'];
          $a["sobrenome"]= $linha['SOBRENOME'];
          $a["cpf"]= $linha['CPF'];
          array_push($json,$a);
      }
     return $json;
   
  }    
public function insereUsuario(){
 $dao = new DAOUsuario();
 $dao->insereUsuario($this->nome, $this->sobrenome,$this->telcel, $this->cpf,$this->cargo,$this->login,$this->senha);
}

}
?>