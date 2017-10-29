<?php 
include_once '../Persistence/DAO_Object/DAOEndereco.php';

class Endereco{

    private $idend;
    private $rua;
    private $bairro;
    private $estado;
    private $telResidencial;

    public function novoEndereco($r, $b, $es, $tR){
        $this->rua = $r;
        $this->bairro = $b;        
        $this->estado = $es;
        $this->telResidencial = $tR;
    }

    public function insereEndereco($id){
        $daoEnd = new DAOEndereco();
        $daoEnd->novo($this->rua, $this->bairro, $this->estado, $this->telResidencial, $id);
    }
    public function buscaEndereco(){
        
    }
    public function atualizaEndereco(){
        
    }
}


?>