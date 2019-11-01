<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset=UTF-8">
		<title>Sistema de Comentarios</title>
		<link rel="stylesheet" href="css/cadastrar.css">
	</head>
	<body>
		<form method="POST">
			<h1>CADASTRE-SE</h1>
			<label for="nome">NOME</label>
			<input type="text" name="nome" id="nome" maxlength="40">
			<label for="email">EMAIL</label>
			<input type="email" name="email" autocomplete="off" id="email" maxlength="40">
			<label for="senha">SENHA</label>
			<input type="password" name="senha" id="senha">
			<label for="confSenha">CONFIRMAR SENHA</label>
			<input type="password" name="confSenha" id="confSenha">
			<input type="submit" value="cadastrar">
		</form>
	</body>
</html>

<?php
/*
	1-VERIFICAR SE ELA APERTOU O BOTÃO CADATRAR - OK
	2-GUARDAR DADOS DENTRO DE VARIAVEIS
	3-ENVAR DADOS COHIDOS PARA CLASSE - FUNÇÃO CADASTRAR
	4-VERIFICAR O RETORNO FALSE OU TRUE
*/
	//verificar se clicou no botão
	if(isset($_POST['nome'])){
		$nome = htmlentities(addslashes($_POST['nome']));
		$email = htmlentities(addslashes($_POST['email']));
		$senha = htmlentities(addslashes($_POST['senha']));
		$confSenha = htmlentities(addslashes($_POST['confSenha']));
		//verificar se ta preenchido
		if (!empty($nome) && !empty($email) && !empty($senha) && !empty($confSenha)) {
			if($senha == $confSenha){
				require_once 'class/usuarios.php';
				$us = new Usuario("php","localhost","root","");
				if($us->cadastrar($nome,$email,$senha)){
					?>
						<div class="mensagem">
							Cadastrado com sucesso!
							<a href="entrar.php">Acesse já!</a>
						</div> 
					<?php
				}else{
					?>
						<div class="mensagem">
							Email já cadastrado!
						</div> 
					<?php
				}
			}else{
				?>
					<div class="mensagem">
						Erro: Senha e Confirmar Senha não confere!
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