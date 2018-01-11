<?php
include_once '../Persistence/DAO_Object/DAOProjeto.php';

class Projeto{

    private $id;
    private $fase;
    private $dtInicio;
    private $dtFim;
    private $nomeProjeto;
    private $dtProrrogada;


    public function montaProjeto($dados){    
        $this->fase= $dados->fase;
        $this->dtInicio= $dados->dtIn;
        $this->dtFim= $dados->dtfim;
        $this->nomeProjeto=$dados->nome ;

    }
    public function montaAtualizar($dados){    
        $this->fase= $dados['fase'];
        $this->dtInicio= $dados['dtIn'];
        $this->dtFim= $dados['dtfim'];
        $this->nomeProjeto=$dados['nome'] ;
        $this->id = $dados['id'];

    }
    public function adProrrog($p, $i){
        $this->dtProrrogada = $p;
        $this->id = $i;
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
    public function prepRemocao($i){
        $this->id= $i;
    }


    public function ExibeProjetos(){
       $dao = new DAOProjeto();
       $json = $dao->ExibeProjetos();
       return $json;
    }

    public function AdicionaProjeto(){        
        $dao = new DAOProjeto();
        $dao->AdicionaProjeto($this->fase, $this->dtInicio, $this->dtFim, $this->nomeProjeto);
    }
    public function ProrrogaProjeto(){
        $dao = new DAOProjeto();
        $dao->AtualizaProjeto($this->dtProrrogada, $this->id);
    }
    public function AtualizaProjeto(){
        $dao = new DAOProjeto();
        $dao->AtualizaProjeto($this->fase, $this->dtInicio, $this->dtFim, $this->nomeProjeto, $this->id);
    }
    public function RemoveProjeto(){
        $dao = new DAOProjeto();
        $dao->RemoveProjeto($this->id);
    }
}
?>