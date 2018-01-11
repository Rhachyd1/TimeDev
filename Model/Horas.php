<?php 
    include_once '../Persistence/DAO_Object/DAOHoras.php';
class Horas{

    private $idlog;
    private $horaEntr;
    private $horaSaid;
    private $HorasTrab;
    private $HorasDev;
    private $DataTrab;
    
    public function Horas(){
        date_default_timezone_set('America/Sao_Paulo');  
        $this->horaEntr = date('H:m:s');
        $this->DataTrab = date('Y-m-d');
    }
    public function getHoraEntr(){
     return $this->horaEntr;   
    }
    public function getHoraSaid(){
        return $this->horaSaid;   
    }
    public function getHoraTrab(){
        return $this->HorasTrab;   
    }
    public function getHoraDev(){
        return $this->HorasDev;   
    }
     public function getDataTrab(){
        return $this->DataTrab;   
     }
    public function exibeHoras($id){
        $dao = new DAOHoras();
        $j = $dao->exibeHoras($id);
        return $j;
    }

    public function iniciaDia($id){
        $dao = new DAOHoras();
        $dao->iniciaDia($this->horaEntr, $this->DataTrab, $id);
    }

    
}



?>