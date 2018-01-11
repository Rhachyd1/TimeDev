<?php
 include_once 'Conexao.php';
class DAOProjeto{

public function ExibeProjetos(){
    $sql = "SELECT * FROM PROJETO ";
    $con = new Conexao();
    $query = $con->retornaConexao();
    $a = [];
    $jsonProjeto=[];
    $a=[
        "fase"=>"",
        "dtIn"=>"",
        "dtFm"=>"",
        "id"=>"",
        "dtProg"=>"",
        "Nome"=>""
    ];

    $result = $query->query($sql);

    while ($linha = $result->fetch(PDO::FETCH_ASSOC) ) {
        $a=[
            "fase"  => $linha['Fase'],
            "dtIn"  => $linha['DtInicio'],
            "dtFm"  => $linha['DtFim'],
            "id"    => $linha['IdProjeto'],
            "dtProg"=> $linha['DtProrrogada'],
            "Nome"  => $linha['NomeProjeto']
        ];
        array_push($jsonProjeto, $a);
    }
    return $jsonProjeto;
}






public function AdicionaProjeto($f, $d, $fn, $n){   
    $con = new Conexao();
    $sql = "INSERT INTO projeto  (Fase ,  DtInicio , DtFim , NomeProjeto)
    VALUES (:fase,  :dtInicio, :dtFim,  :NomeProjeto )   ";
    $smt = $con->retornaConexao();
    $state = $smt->prepare($sql);  
    $state->bindParam(':fase', $f);
    $state->bindParam(':dtInicio', $d);
    $state->bindParam(':dtFim',$fn);
    $state->bindParam(':NomeProjeto', $n);    
    $state -> execute();
}

public function AtualizaProjeto($f, $d, $fn, $n, $i){
    $con = new Conexao();
    $sql = "UPDATE PROJETO SET FASE = :FASE , DTINICIO= :DTINICIO , DTFIM= :DTFIM, NOMEPROJETO = :NOMEPROJETO WHERE IDPROJETO = :ID";
    $smt = $con->retornaConexao();
    $state = $smt->prepare($sql);  
    $state->bindParam(':FASE', $f);
    $state->bindParam(':DTINICIO', $d);
    $state->bindParam(':DTFIM',$fn);
    $state->bindParam(':NOMEPROJETO', $n);
    $state->bindParam(':ID', $i);    
    $state -> execute();
}

public function ProrrogaProjeto($p, $i){
    $sql = "UPDATE PROJETO SET DTPRORROGADA = :DTPROG WHERE IDPROJETO =:ID";
    $con = new Conexao();
    $state = $con->retornaConexao();
    $smt = $state->prepare($sql);
    $smt->bindParam(':DTPROG',$p);
    $smt->bindParam(':ID',$i);
    $smt->execute();
}
public function RemoveProjeto($i){
    $sql = "DELETE FROM PROJETO WHERE IDPROJETO = :ID";
    $con = new Conexao();
    $smt = $con->retornaConexao();
    $state = $smt->prepare($sql);
    $state->bindParam(":ID", $i);
    $state->execute();
}
}
?>