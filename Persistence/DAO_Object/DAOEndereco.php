<?php 
include_once 'Conexao.php';

class DAOEndereco{



    public function novo($r, $b, $es, $tr, $id){
        $con = new Conexao();
        $state = $con->retornaConexao();       
        $sql = 'INSERT INTO ENDERECO (RUA, BAIRRO, ESTADO, TELEFONERES, FKEMPREGADO) VALUES (:RUA, :BAIRRO, :ESTADO, :TELEFONE, :ID)';
        $st = $state->prepare($sql);  
        $st->bindParam(":ID", $id);
        $st->bindParam(":RUA", $r);
        $st->bindParam(":BAIRRO", $b);
        $st->bindParam(":ESTADO" , $es);
        $st->bindParam(":TELEFONE", $tr);       
        $st->execute();
    }
}
?>