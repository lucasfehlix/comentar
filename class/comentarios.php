<?php
    date_default_timezone_set('America/Fortaleza');
    class Comentario{
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
        public function buscarComentarios(){
            $sql = $this->pdo->prepare("SELECT *, (SELECT nome FROM usuarios WHERE id = fk_id_usuario) AS nome_usuario FROM comentarios ORDER BY dia DESC, horario DESC, id DESC");
            $sql->execute();
            $dados = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $dados;
        }
        public function excluirComentario($id_coments, $id_user){
            if($id_user == 1){
                $sql = $this->pdo->prepare("DELETE FROM comentarios WHERE id = :id_c");
                $sql->bindValue(":id_c",$id_coments);
                $sql->execute();
            }else{
                $sql = $this->pdo->prepare("DELETE FROM comentarios WHERE id = :id_c AND fk_id_usuario = :id_u");
                $sql->bindValue(":id_c",$id_coments);
                $sql->bindValue(":id_u",$id_user);
                $sql->execute();       
            }
        }
        public function inserirComentario($id_user, $comentario){
            $sql = $this->pdo->prepare("INSERT INTO comentarios (comentario,dia,horario,fk_id_usuario) VALUES (:c, :d, :h, :id_u)");
            $sql->bindValue(":c",$comentario);
            $sql->bindValue(":d",date("Y-m-d"));
            $sql->bindValue(":h",date('H:i'));
            $sql->bindValue(":id_u",$id_user);
            $sql->execute();
        }
    }
?>