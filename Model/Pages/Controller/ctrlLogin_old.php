<?php 
include_once '../Persistence/Conexao.php';
include_once '../Model/Usuario.php';
include_once '../Model/Horas.php';
   
    session_start();
    if(isset($_POST['btLogin'])){
        echo 'teste';
    }
    $u = $_POST['login'];
    $s = $_POST['senha'];
   
    $conexao = new Conexao();
    $usuario = new Usuario();
    $horas = new Horas();  
    $id = $usuario->Login($conexao,$s,$u);
    var_dump($id);

  
    if($id==null){
        echo "Login ou Senha Inválidos!";
    }elseif($id['cargo']=='Administrador'){
        echo"admin";
        $_SESSION['Usuario']=$id['id'];
        $horas->iniciaDia($conexao, $_SESSION['Usuario'] );
        
     //  var_dump($_POST);
    }elseif($id['cargo']=='Gestor'){
        echo "Gestor";
        $_SESSION['Usuario']=$id;       
    }else{
        echo "Usuario";
        $_SESSION['Usuario']=$id;  
        die();         
    } 
   

?>

