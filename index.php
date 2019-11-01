<?php
    require_once 'class/usuarios.php';
    session_start();
    if(isset($_SESSION['id_usuario'])){
        $us = new Usuario("php","localhost","root","");
        $info = $us->buscarDadosUser($_SESSION['id_usuario']);    
    }elseif(isset($_SESSION['id_master'])){
        $us = new Usuario("php","localhost","root","");
        $info = $us->buscarDadosUser($_SESSION['id_master']);    
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <title>Sistema de Comentarios</title>
        <link rel="stylesheet" href="css/estilo.css">
    </head>
    <body>
        <nav>
            <ul>
                <li><a href="discussao.php">Discussão</a></li>
                <?php
                    if(isset($_SESSION['id_master'])){
                        ?>
                            <li><a href="dados.php">Dados</a></li>                      
                        <?php
                    }
                    if(isset($info)){
                        ?>
                            <li><a href="sair.php">Sair</a></li>      
                        <?php
                    }else{
                        ?>
                            <li><a href="entrar.php">Entrar</a></li>      
                        <?php
                    }
                ?>
            </ul>
        </nav>
        <?php
            if(isset($_SESSION['id_master']) || isset($_SESSION['id_usuario'])){
                ?>
                    <h2>
                        <?php
                            echo "Olá! ";
                            echo $info['nome'];
                            echo ", seja bem vindo(a)!";
                        ?>
                    </h2>
                <?php
            }
        ?>
        <h3>Conteúdo qualquer</h3>
    </body>
</html>