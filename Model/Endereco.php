<?php 
include_once '../Persistence/DAO_Object/DAOEndereco.php';

class Endereco{

    private $idend;
    private $rua;
    private $bairro;
    private $estado;
    private $municipio;
    private $telResidencial;
    private $cep;

    public function novoEndereco($r, $b, $tR, $es, $m, $c){
        $this->rua = $r;
        $this->bairro = $b;        
        $this->estado = $es;
        $this->telResidencial = $tR;
        $this->municipio = $m;
        $this->cep = $c;
    }

    public function insereEndereco($id){
        $daoEnd = new DAOEndereco();
        $daoEnd->novo($this->rua, $this->bairro, $this->estado, $this->telResidencial, $id, $this->municipio, $this->cep);
    }
    public function buscaEndereco(){
        
    }
    public function atualizaEndereco($i){
        $dao = new DAOEndereco();
        echo $i;        
        $dao->atualizaEndereco($this->rua, $this->bairro, $this->estado, $this->telResidencial, $this->municipio, $this->cep, $i);
    }
}


?>