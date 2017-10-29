<?php 
include "Usuario.php";

class Administrador extends Usuario {


    public function AdicionaGestor(){
        
    }   

    
    
    public function insereUsuario(Conexao $con, Usuario $u){

        $sql = "INSERT INTO Usuario  (Fase ,  DtInicio , DtFim , NomeProjeto)
        VALUES (:fase,  :dtInicio, :dtFim,  :NomeProjeto )   ";

        $smt = $con->retornaConexao();
        $state = $smt->prepare($sql);
        $null = null;
        $state->bindParam(':fase', $dados[':fase']);
        $state->bindParam(':dtInicio', $dados[':dtIn']);
        $state->bindParam(':dtFim',$dados[':dtFm']);
        $state->bindParam(':NomeProjeto',$dados[':nome']);
         
        $state -> execute();

    }


}
?>