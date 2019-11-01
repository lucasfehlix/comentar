<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <title>Sistema de Comentarios</title>
        <link rel="stylesheet" href="css/entrar.css">
    </head>
    <body>
        <span>Lucas<br>Dev</span>
        <form method="POST">
            <h1>Acesse com sua conta</h1>
            <img src="img/envelope.png">
            <input type="email" name="email" id="">
            <img src="img/cadeado.png">
            <input type="password" name="senha" id="">
            <input type="submit" value="ENTRAR">
            <a href="cadastrar.php">Registre-se agora!</a>
        </form>
    </body>
</html>
<?php
    if(isset($_POST['email'])){
        $email = htmlentities(addslashes($_POST['email']));
        $senha = htmlentities(addslashes($_POST['senha']));
        if (!empty($email) && !empty($senha)) {
            require_once 'class/usuarios.php';
            $us = new Usuario("php","localhost","root","");
            if($us->entrar($email,$senha)){
                header("location: index.php");                            
            }else{
                ?>
                    <div class="mensagem">
                        Erro: Email e/ou senha estão incorretos!
                    </div> 
                <?php
            }
        }else{
            ?>
                <div class="mensagem">
                    Preencha todos os campos!
                </div> 
            <?php
        }
    }
?>