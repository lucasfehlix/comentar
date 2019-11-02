<?php
    session_start();
    if(!isset($_SESSION['id_master'])){
        header("location: index.php");            
    }
    require_once('class/usuarios.php');
    $us = new Usuario("php","localhost","root","");
    $dados = $us->buscarTodosUsuarios();
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <title>Sistema de Comentarios</title>
        <link rel="stylesheet" href="css/dados.css">
    </head>
    <body>
        <nav>
            <ul>
                <li><a href="index.php">Inicio</a></li>
                <li><a href="discussao.php">Discussão</a></li>
                <li><a href="dados.php">Dados</a></li>
                <li><a href="sair.php">Sair</a></li>         
            </ul>
        </nav>
        <table>
            <tr id="titulo">
                <td>ID</td>
                <td>NOME</td>
                <td>EMAIL</td>
                <td>COMENTARIOS</td>
            </tr>
            <?php
                if(count($dados) > 0){    
                    foreach ($dados as $v) {
                        ?>
                            <tr>
                                <td><?php echo $v['id']?></td>
                                <td><?php echo $v['nome']?></td>
                                <td><?php echo $v['email']?></td>
                                <td><?php echo $v['qtd']?></td>
                            </tr>
                        <?php
                    }
                }else{
                    echo "Ainda não há usuarios cadastrados.";
                }
            ?>
        </table>
    </body>
</html>