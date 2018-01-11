<?php 
include_once 'Conexao.php';

class DAOEndereco{



    public function novo($r, $b, $es, $tr, $id, $m, $c){
        $con = new Conexao();
        $state = $con->retornaConexao();       
        $sql = 'INSERT INTO ENDERECO (RUA, BAIRRO, ESTADO, TELEFONERES, MUNICIPIO, CEP,  FKEMPREGADO) VALUES
                                     (:RUA, :BAIRRO, :ESTADO, :TELEFONE, :MUNICIPIO, :CEP , :ID)';
        $st = $state->prepare($sql);  
        $st->bindParam(":ID", $id);
        $st->bindParam(":RUA", $r);
        $st->bindParam(":BAIRRO", $b);
        $st->bindParam(":ESTADO" , $es);
        $st->bindParam(":TELEFONE", $tr);
        $st->bindParam(":MUNICIPIO", $m);       
        $st->bindParam(":CEP", $c);       
        $st->execute();
    }
    
    public function AtualizaEndereco($r, $b, $es, $tr, $m, $c, $i){
        $con = new Conexao();
        $state = $con->retornaConexao();       
        $sql = 'UPDATE ENDERECO SET RUA = :RUA, BAIRRO = :BAIRRO , ESTADO = :ESTADO, TELEFONERES = :TELEFONE, MUNICIPIO= :MUNICIPIO,
        CEP = :CEP WHERE FKEMPREGADO = :ID ';
        $st = $state->prepare($sql);  
        $st->bindParam(":ID", $i);
        $st->bindParam(":RUA", $r);
        $st->bindParam(":BAIRRO", $b);
        $st->bindParam(":ESTADO" , $es);
        $st->bindParam(":TELEFONE", $tr);
        $st->bindParam(":MUNICIPIO", $m);       
        $st->bindParam(":CEP", $c);       
        $st->execute();
    }
}
?>