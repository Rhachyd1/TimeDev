<?php 

    class Conexao{

        private $conexao;
        
        public function __construct(){
            try{
                $this->conexao = new PDO('mysql:host=localhost:3306;dbname=timejob','root','a2d5a2x2');
                $this->conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }catch(PDOException $e){
                echo ("error".$e->getMessage());
            }
            return $this->conexao;
        }

        public function  retornaConexao(){
            return $this->conexao;
        }
        public function fechaConexao(){
            $this->conexao=null;
            return $this->conexao;
        }




    }

?>