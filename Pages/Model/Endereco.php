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
        $this->telResidencial = $tr;
    }

    public function novoEndereco(){
        $daoEnd = new DAOEndereco();
        $daoEnd->novo($this->rua, $this->bairro, $this->estado, $this->telResidencial);
    }
    public function buscaEndereco(){
        
    }
    public function atualizaEndereco(){
        
    }
}


?>