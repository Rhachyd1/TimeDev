<?php 

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
    public function exibeHoras(Conexao $con, $id){
        $query = $con->retornaConexao();
        $sql="SELECT * FROM HORAS WHERE FKEMPREGADO='$id'";
        $jsonHoras=[];
        $a=[
            "horaEntrada"=>"",
           "horaSaida"=>"",
           "HorasAcumuladas"=>"",
           "HorasDevidas"=>"",
           "DataTrab"=>""];
        $result = $query->query($sql);
        while ($linha = $result->fetch(PDO::FETCH_ASSOC)){
           $a["horaEntrada"]= $linha["HoraEntrada"];
           $a["horaSaida"]= $linha["HoraSaida"];
           $a["HorasAcumuladas"]= $linha["HoraAcumulada"];
           $a["horasDevidas"]= $linha["HoraDevida"];
           $a["DataTrab"]= $linha["DataHora"];
           array_push($jsonHoras,$a);
        }
        return $jsonHoras;    
    }

    public function iniciaDia($id){
        $dao = new DAOHoras();
        $dao->iniciaDia($this->horaEntr, $this->DataTrab, $id);
    }

    public function atualizaDia(Conexao $con, $id){
      //Update  
    }
    
}



?>