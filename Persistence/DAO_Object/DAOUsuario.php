<?php 
include_once 'Conexao.php';

class DAOUsuario{
    private $con;

public function __constructor(){
   
}
public function Login($l, $s){
        $con = new Conexao();
        
        $query = $con->retornaConexao();
      
        
        $sql= "SELECT IDEMPREGADO, CARGO FROM EMPREGADO WHERE LOGIN = '$l' AND SENHA = '$s'";
        $result = $query->query($sql);
        $id=null;
        $cargo = null;
        try{
            while($linha = $result->fetch(PDO::FETCH_ASSOC) ){
              $id = $linha['IDEMPREGADO']; 
              $cargo = $linha['CARGO']  ;
              }
              $a = [
                  'id'=>$id,
                  'cargo'=>$cargo
              ];
              return $a;
        }catch(PDOException $e){
           // print($e);
            $id=null;
            return $id;
        }
       
}
public function exibeUsuario($id){
        $con = new Conexao();
        
       
         
          $sql= "SELECT NOME, SOBRENOME, CPF FROM EMPREGADO WHERE IDEMPREGADO='$id'";
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
          return $jsonUsuario;
         
      } 
     public function exibeTodos(){      
          
          $sql= "SELECT * FROM EMPREGADO";
          $query = $this->con->retornaConexao();
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

public function insereUsuario($n, $sn, $tc, $cpf, $cr, $log, $s){
    $con = new Conexao();
    $sql = "INSERT INTO EMPREGADO (NOME, SOBRENOME, TELEFONECEL, CPF, CARGO, LOGIN, SENHA) VALUES (:nome, :snome, :telcel, :cpf, :cargo, :login, :senha)";
    $smt = $con->retornaConexao();
    $state = $smt->prepare($sql);   
    $state->bindParam(":nome", $n);
    $state->bindParam(":snome",$sn);
    $state->bindParam(":telcel",$tc);
    $state->bindParam(":cpf",$cpf);
    $state->bindParam(":cargo",$cr);
    $state->bindParam(":login",$log);
    $state->bindParam(":senha",$s);
    $state->execute();
}
}

?>