<?php
include_once 'Conexao.php';
            

class DAOHoras{


public function __constructor(){
  
}
    public function exibeHoras($id){

        $con = new Conexao();
        
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

    public function iniciaDia($h, $dt,  $id){
        
        $con = new Conexao();        
        $query = $con->retornaConexao();
        $sql="INSERT INTO HORAS (HoraEntrada, HoraSaida, HoraAcumulada,HoraDevida, DataHora,FkEmpregado) 
        values (:horaEntrada, :horaSaida, :horaAcumulada, :horaDevida, :Dia, :fkEmpregado  )";
        $smt = $con->retornaConexao();
        $state = $smt->prepare($sql);
       
       
        $state->bindParam(':horaEntrada',$h);
        $null = null;
        $state->bindParam(':horaSaida', $null);
        $state->bindParam(':horaAcumulada',$null);
        $state->bindParam(':horaDevida',$null);
        
        $state->bindParam(':Dia',$dt);
        $state->bindParam(':fkEmpregado', $id);
     
        $state -> execute();
    }

    public function atualizaDia(Conexao $con, $id){
      //Update  
    }






}
?>