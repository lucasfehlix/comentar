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