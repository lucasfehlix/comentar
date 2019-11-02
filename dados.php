<?php
    session_start();
    if(!isset($_SESSION['id_master'])){
        header("location: index.php");            
    }
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
            <tr>
                <td>1</td>
                <td>Lucas</td>
                <td>lucas@gmail.com</td>
                <td>100</td>
            </tr>
        </table>
    </body>
</html>