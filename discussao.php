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
        <link rel="stylesheet" href="css/discussao.css">
    </head>
    <body>
        <nav>
            <ul>
                <li><a href="index.php">Inicio</a></li>
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
        <div id="largura-pagina">
            <section id="conteudo1">
                <h1>Guia Definitivo Como Criar um Blog Incrivel e Ganhar Dinheiro Com Ele</h1>
                <img src="img/computador.jpg">
                <p class="texto">É um fato há muito estabelecido que um leitor se distrairá com o conteúdo legível de uma 
                    página ao analisar seu layout. O ponto de usar o Lorem Ipsum é que ele tem uma distribuição 
                    de letras mais ou menos normal, em vez de usar 'Conteúdo aqui, conteúdo aqui'.</p>
                <p class="texto">1. O ponto de usar o Lorem Ipsum</p>
                <p class="texto">2. È que ele tem uma distribuição de letras</p>
                <p class="texto">3. Lorem Ipsum é que ele tem uma distribuição</p>
                <p class="texto">4. letras mais ou menos normal</p>
                <h2>Deixe seu comentário</h2>
                <form method="POST">
                    <img src="img/perfil.png">
                    <textarea name="texto" placeholder="Participe da discussão" cols="30" rows="10" maxlength="400"></textarea>
                    <input type="submit" value="PUBLICAR COMENTARIO">
                </form>
                <div class="area-comentario">
                    <img src="img/perfil.png">
                    <h3>Nome 1</h3>
                    <h4>Horario <a href="">Excluir</a></h4>
                    <p>Comentario</p>
                </div>
                <div class="area-comentario">
                    <img src="img/perfil.png">
                    <h3>Nome 2</h3>
                    <h4>Horario <a href="">Excluir</a></h4>
                    <p>Comentario</p>
                </div>
                <div class="area-comentario">
                    <img src="img/perfil.png">
                    <h3>Nome 3</h3>
                    <h4>Horario <a href="">Excluir</a></h4>
                    <p>Comentario</p>
                </div>
                <div class="area-comentario">
                    <img src="img/perfil.png">
                    <h3>Nome 4</h3>
                    <h4>Horario <a href="">Excluir</a></h4>
                    <p>Comentario</p>
                </div>
                <div class="area-comentario">
                    <img src="img/perfil.png">
                    <h3>Nome 5</h3>
                    <h4>Horario <a href="">Excluir</a></h4>
                    <p>Comentario</p>
                </div>
            </section>
            <section id="conteudo2">
                <div>
                    <img src="img/img-lateral.jpg">
                    <p>
                        Analisar seu layout. O ponto de usar o Lorem Ipsum é que 
                        ele tem uma distribuição de letras mais ou menos normal, 
                        em vez de usar 'Conteúdo aqui, conteúdo aqui'.
                    </p>
                </div>
            </section>
            <section id="conteudo3">
                <div>
                    <h5>Saiba mais sobre como fazer</h5>
                    <p>
                        Analisar seu layout. O ponto de usar o Lorem Ipsum é que 
                        ele tem uma distribuição de letras mais ou menos normal, 
                        em vez de usar 'Conteúdo aqui, conteúdo aqui'.
                    </p>
                </div>
            </section>
        </div>
    </body>
</html>