<?php 
include_once '../Persistence/DAO_Object/DAOUsuario.php';
class Gerente extends Usuario {

   
    public function insereUsuario(){
        $dao = new DAOUsuario();
        $this->matricula;
        $this->id = $dao->insereUsuario($this->nome, $this->sobrenome,$this->telcel, $this->cpf,$this->cargo,$this->login,$this->senha);
        $dao->insereMatricula($this->id,$this->matricula);
    }

}

?>