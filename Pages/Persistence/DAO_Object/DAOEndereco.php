<?php 
include_once 'Conexao.php';

class DAOEndereco{



    public function novo($r, $b, $es, $tr, $id){
        $con = new Conexao();
        $state = $con=>retornaConexao();       
        $sql = 'INSERT INTO ENDERECO (RUA, BAIRRO, ESTADO, TELEFONERESIDENCIAL, $FKIDEMPREGADO) VALUES (:RUA, :BAIRRO, :ESTADO, :TELEFONE, :ID)';
        $st = $state->prepare($sql);
        $st->bindParam(,);
        $st->bindParam(,);
        $st->bindParam(,);
        $st->bindParam(,);
        $st->bindParam(,);
        $st->execute($sql);
    }
}
?>