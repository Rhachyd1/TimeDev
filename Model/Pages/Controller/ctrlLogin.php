<?php 

include_once '../Persistence/DAO_Object/DAOUsuario.php';
include_once '../Persistence/DAO_Object/DAOHoras.php';
include_once '../Model/Usuario.php';
include_once '../Model/Horas.php';
   
    session_start();
    if(isset($_POST['btLogin'])){
        echo 'teste';
    }
    $u = $_POST['login'];
    $s = $_POST['senha'];
   
    $usuario = new Usuario();
    $id = $usuario->montaLogin($s,$u); 
    if($id==null){
        echo "Login ou Senha Inválidos!";
    }elseif($id['cargo']=='Administrador'){
        echo "admin";
        $_SESSION['Usuario']=$id['id'];
        $horas = new Horas();
        $horas->iniciaDia($id['id']); 
        die();     
    }elseif($id['cargo']=='Gestor'){
        echo "gestor";
        $_SESSION['Usuario']=$id; 
        $horas = new Horas();
        $horas->iniciaDia($id['id']); 
        die();           
    }else{
        echo "usuario";
        $_SESSION['Usuario']=$id;  
        $horas = new Horas();
        $horas->iniciaDia($id['id']); 
        die();  
    } 
   

?>

