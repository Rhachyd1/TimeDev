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
            "fase"=> $linha['Fase'],
        "dtIn"=> $linha['DtInicio'],
        "dtFm"=> $linha['DtFim'],
        "id"=> $linha['IdProjeto'],
        "dtProg"=> $linha['DtProrrogada'],
        "Nome"=> $linha['NomeProjeto']
        ];
        array_push($jsonProjeto, $a);
    }
    return $jsonProjeto;
}

public function AdicionaProjeto(Projeto $p){
    $con = new Conexao();

    $sql = "INSERT INTO projeto  (Fase ,  DtInicio , DtFim , NomeProjeto)
    VALUES (:fase,  :dtInicio, :dtFim,  :NomeProjeto )   ";

    $smt = $con->retornaConexao();
    $state = $smt->prepare($sql);
    $null = null;
    $fase = $p->getfase();
    $din = $p->getdtInicio();
    $fim = $p->getdtFim();
    $nome = $p->getNomeProjeto();

    $state->bindParam(':fase', $fase);
    $state->bindParam(':dtInicio', $din);
    $state->bindParam(':dtFim',$fim);
    $state->bindParam(':NomeProjeto', $nome);
    
    $state -> execute();
}



}
?>