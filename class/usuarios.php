<?php
    class Usuario{
        private $pdo;
        private $msgErro = ""; 
        //Construtor
        public function __construct($dbName, $dbHost, $dbUsuario, $dbSenha){
            try{
                $this->pdo = new PDO("mysql:dbname=".$dbName.";host=".$dbHost,$dbUsuario,$dbSenha);
            }
            catch(PDOException $e){
                $this->msgErro = "Erro com BD: ".$e->getMessage();
            }catch(Exception $e){
                $this->msgErro = "Erro: ".$e->getMessage();
            }
        }
        //Cadastrar
        public function cadastrar($nome,$email,$senha){
            //verifica se ja existe usuario no banco
            $sql = $this->pdo->prepare("SELECT id FROM usuarios WHERE email = :e");
            $sql->bindValue(":e",$email);
            $sql->execute();
            if($sql->rowCount() > 0){
                return false;
            }else{
                //se não //Cadastrar
                $sql = $this->pdo->prepare("INSERT INTO usuarios (nome,email,senha) VALUES (:n,:e,:s)");
                $sql->bindValue(":n",$nome);
                $sql->bindValue(":e",$email);
                $sql->bindValue(":s",md5($senha));
                $sql->execute();
                return true;
            }
        }
        //Logar
        public function entrar($email,$senha){
            //verificar se o email e senha estao cadastrados , se sim entrar no sistema (sessao)
            $sql = $this->pdo->prepare("SELECT id FROM usuarios WHERE email = :e AND senha = :s");
            $sql->bindValue(":e",$email);
            $sql->bindValue(":s",md5($senha));
            $sql->execute();
            if($sql->rowCount() > 0){
                //se sim, entrar no sistema (sessao)
                $dados = $sql->fetch();
                session_start();
                //usuario adm
                if($dados['id'] == 1){
                    //usuario adm
                    $_SESSION['id_master'] = 1;
                }else{
                    //usuario comum
                    $_SESSION['id_usuario'] = $dados['id'];
                }
                return true;//logado com sucesso
            }else{
                //se não, nao foi possivel logar
                return false;
            }
        }

        public function buscarDadosUser($id){
            $sql = $this->pdo->prepare("SELECT * FROM usuarios WHERE id = :i");
            $sql->bindValue(":i",$id);
            $sql->execute();
            $dados = $sql->fetch();
            return $dados;
        }
    }
?>