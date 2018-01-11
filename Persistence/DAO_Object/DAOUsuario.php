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
public function buscaId($l, $s){
    $con = new Conexao();
    
    $query = $con->retornaConexao();    
    $sql= "SELECT IDEMPREGADO FROM EMPREGADO WHERE LOGIN = '$l' AND SENHA = '$s'";
    $result = $query->query($sql);
    $id=null;   
    try{
        while($linha = $result->fetch(PDO::FETCH_ASSOC) ){
          $id = $linha['IDEMPREGADO'];
            
         }
        }catch(PDOException $e){
       // print($e);
        $id=null;
        exit("Error: " . $e->getMessage() );
        }    
    
    return $id;
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
    $result = $smt->query("SELECT LAST_INSERT_ID()");
    $id = 0;
    while ($linha = $result->fetch(PDO::FETCH_ASSOC)){
        $id= $linha['LAST_INSERT_ID()'];
    }
    return $id;


}
public function Logoff($i){
    $con = new Conexao();
    $sql= "CALL LOGOFF(CURTIME(), :id);";
    $smt = $con->retornaConexao();
    $state = $smt->prepare($sql);
    $state->bindParam(":id",$i);
    $state->execute();
}

public function ExibeTodosEnd($n, $s, $m, $tc, $cpf){
    $con = new Conexao();
    $sql= "CALL buscaGeral('$m' , '$n' , '$s' , '$tc' , '$cpf' )";
    $query = $con->retornaConexao();
    $result = $query->query($sql);
    $i=0;
    $json=[];
    $a=[
       "nome"=>"",
       "sobrenome"=>"",
       "cpf"=>"",
       "cargo"=>"",
       "id"=>"",
       "telefone"=>"",
       "matricula"=>"",
       "rua"=>"",
       "bairro"=>"",
       "estado"=>"",
       "idend"=>"",
       "municipio"=>"",
       "telefoneres"=>"",
       "cep"=>"",
       "fkid"=>"",
    ];
 
    while ($linha = $result->fetch(PDO::FETCH_ASSOC)){
        $a["nome"]= $linha['Nome'];
        $a["sobrenome"]= $linha['Sobrenome'];
        $a["cpf"]= $linha['CPF'];
        $a["cargo"]= $linha['Cargo'];
        $a["id"]= $linha['IdEmpregado'];
        $a["telefone"]= $linha['TelefoneCel'];
        $a["matricula"]= $linha['Matricula'];
        $a["rua"]= $linha['Rua'];
        $a["bairro"]= $linha['Bairro'];
        $a["estado"]= $linha['Estado'];
        $a["idend"]= $linha['IdEndereco'];
        $a["municipio"]= $linha['Municipio'];
        $a["telefoneres"]= $linha['TelefoneRes'];
        $a["cep"]= $linha['CEP'];
        $a["fkid"]= $linha['FkEmpregado'];
        array_push($json,$a);
    }
   return $json;
}

public function insereMatricula($i, $m){
    echo $m;
    $con = new Conexao();
    $sql = "CALL atualizaMatricula(:id, :mat)";
    $smt = $con->retornaConexao();
    $state= $smt->prepare($sql);
    $state->bindParam(":id", $i);
    $state->bindParam(":mat",$m);
    $state->execute();
}

public function Matricula($l, $s){
    $con = new Conexao();
    
    $query = $con->retornaConexao();    
    $sql= "SELECT MATRICULA FROM EMPREGADO WHERE LOGIN = '$l' AND SENHA = '$s'";
    $result = $query->query($sql);
    $id=null;   
    try{
        while($linha = $result->fetch(PDO::FETCH_ASSOC) ){
          $id = $linha['MATRICULA'];
            
         }
        }catch(PDOException $e){
       // print($e);
        $id=null;
        exit("Error: " . $e->getMessage() );
        }    
    
    return $id;
}
public function RemoveUsuario($m){
  $sql = "CALL REMOVEUSUARIO( :MAT)"  ;
  $con = new Conexao();
  $state = $con->retornaConexao();
  $smt= $state->prepare($sql);
  $smt->bindParam(":MAT",$m);
  $smt->execute();
}
public function AtualizaUsuario($n, $s, $t, $c, $cpf,$m){
 $sql="UPDATE EMPREGADO SET NOME = :N, SOBRENOME = :S, TELEFONECEL = :TC, CARGO = :CR, CPF = :CPF  WHERE MATRICULA = :MAT";
 $con = new Conexao();
 $state = $con->retornaConexao();
 $smt = $state->prepare($sql);
 $smt->bindParam(":N",$n);
 $smt->bindParam(":S",$s);
 $smt->bindParam(":TC",$t);
 $smt->bindParam(":CR",$c);
 $smt->bindParam(":CPF",$cpf);
 $smt->bindParam(":MAT",$m);
 $smt->execute();
}
 public function retornaUsuario(){
   $sql = " select * from empregado where FkEquipe is null and FkProjeto is null and matricula is not null and nome!='Administrador'"  ;
   $con = new Conexao();
   $query = $con->retornaConexao();
   $result = $query->query($sql);
   $json=[];
   $a=[
      "nome"=>"",
      "sobrenome"=>"",
      "cpf"=>"",
      "cargo"=>"",
      "id"=>"",
      "telefone"=>"",
      "matricula"=>""      
   ];
   while ($linha = $result->fetch(PDO::FETCH_ASSOC) ){
       $a["nome"] = $linha["Nome"];
       $a["sobrenome"] = $linha["Sobrenome"];
       $a["cpf"] = $linha["CPF"];
       $a["cargo"] = $linha["Cargo"];
       $a["id"] = $linha["IdEmpregado"];
       $a["telefone"] = $linha["TelefoneCel"];
       $a["matricula"] = $linha["Matricula"];
       array_push($json, $a);
   }
   return $json;
   
}

}

?>