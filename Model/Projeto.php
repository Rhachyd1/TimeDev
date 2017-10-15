<?php


class Projeto{

    private $id;
    private $fase;
    private $dtInicio;
    private $dtFim;
    private $nomeProjeto;
    private $dtProrrogada;


    public function montaProjeto($dados){    
        $this->fase= $dados[':fase'];
        $this->dtInicio= $dados[':dtIn'];
        $this->dtFim= $dados[':dtFm'];
        $this->nomeProjeto=$dados[':nome'] ;

    }
    public function getFase(){
        return $this->fase;
    }
    public function getdtInicio(){
        return $this->dtInicio;
    }
    public function getdtFim(){
        return $this->dtFim;
    }
    public function getNomeProjeto(){
        return $this->nomeProjeto;
    }
    public function getDtProrrogada(){
        return $this->dtProrrogada;
    }



    public function ExibeProjetos(Conexao $con){
        $sql = "SELECT * FROM PROJETO ";
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
        

        $sql = "INSERT INTO projeto  (Fase ,  DtInicio , DtFim , NomeProjeto)
        VALUES (:fase,  :dtInicio, :dtFim,  :NomeProjeto )   ";

        $smt = $con->retornaConexao();
        $state = $smt->prepare($sql);
        $null = null;
        $state->bindParam(':fase', $p->fase);
        $state->bindParam(':dtInicio', $p->dtInicio);
        $state->bindParam(':dtFim',$p->dtFim);
        $state->bindParam(':NomeProjeto',$p->nomeProjeto);
        
        $state -> execute();
    }
}
?>