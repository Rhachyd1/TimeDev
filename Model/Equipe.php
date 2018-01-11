<?php
include_once "../Persistence/DAO_Object/DAOEquipe.php";
class Equipe{

    private $nome;
    private $dtEnt;
    private $id;
    private $fkProj;


    public function NovaEquipe($n,  $f ){
        date_default_timezone_set('America/Sao_Paulo');       
        $this->nome=$n;
        $this->dtEnt = date('Y-m-d');
        $this->fkProj = $f;
    }
    public function InsereEquipe(){
        $dao = new DAOEquipe();
        $dao->InsereEquipe($this->nome, $this->fkProj, $this->dtEnt);
    }
    public function buscaEquipe($n){
        $dao = new DAOEquipe();
       $json= $dao->buscaEquipe($n);
       return $json;
    }
    public function ExibeUserProjeto($a){
        $dao = new DAOEquipe();
        $json = $dao->ExibeUserProjetos($a);
        return $json;
    }
    public function AtualizaEquipe(){

    }
    public function RemoveEquipe(){
        
    }
}

?>