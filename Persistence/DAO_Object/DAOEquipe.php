<?php
include_once 'Conexao.php';

class DAOEquipe{

    public function InsereEquipe($n, $i, $d){
        $con = new Conexao();
        $sql = "INSERT INTO EQUIPE (NOME_EQUIPE , FKPROJETO , DTENTRADA ) values (:N , :I, :D)";
        $state=$con->retornaConexao();
        $smt = $state->prepare($sql);
        $smt->bindParam(":N" , $n);
        $smt->bindParam(":I" , $i);
        $smt->bindParam(":D" , $d);
        $smt->execute();
    }
    public function buscaEquipe($n){
        
        $con = new Conexao();
        $sql = "select * from Equipe where Nome_Equipe = '$n'";
        $smt = $con->retornaConexao();
        $list = $smt->query($sql);
        $i=["id"=>"",
            "FkProjeto"=>"",
            "NomeProj"=>""];
        $json=[];
        while($linha = $list->fetch(PDO::FETCH_ASSOC) ){
            $i["id"] = $linha['IdEquipe'];
            $i["FkProjeto"] = $linha['FkProjeto'];
            $i["NomeProj"] = $linha['Nome_Equipe'];
            array_push($json,$i);
        }           
        return $json;
    }

    public function ExibeUserProjetos($n){
        $sql = "select empregado.nome, empregado.idempregado, empregado.matricula, empregado.sobrenome,
        equipe.IdEquipe, equipe.nome_equipe as Equipe ,
        projeto.IdProjeto, projeto.nomeprojeto as Projeto from empregado
        inner join equipe on empregado.FkEquipe = equipe.IdEquipe
        inner join projeto on empregado.fkProjeto = projeto.IdProjeto where equipe.Nome_Equipe ='$n'";
        $con = new Conexao();
        $query = $con->retornaConexao();
        $a = [];
        $jsonProjeto=[];       
        $a=[
            "NUsuario"  =>"",
            "idEmp"  => "",
            "mat"  => "",
            "sob"    =>"",
            "idEq"=> "",
            "NomeEq"  => "",
            "idProj"  => "",
            "nomeProj"  =>""
        ];
        $result = $query->query($sql);
    
        while ($linha = $result->fetch(PDO::FETCH_ASSOC) ) {
            $a=[
                "NUsuario"  => $linha['nome'],
                "idEmp"  => $linha['idempregado'],
                "mat"  => $linha['matricula'],
                "sob"    => $linha['sobrenome'],
                "idEq"=> $linha['IdEquipe'],
                "NomeEq"  => $linha['Equipe'],
                "idProj"  => $linha['IdProjeto'],
                "nomeProj"  => $linha['Projeto']
            ];
            array_push($jsonProjeto, $a);
        }
        return $jsonProjeto;
    }


    public function RemoveEquipe(){
        $con = new Conexao();
    }
    public function AtualizaEquipe(){
        $con = new Conexao();
    }
}







?>