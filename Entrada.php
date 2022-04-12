<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Entrar</title>
</head>
<body>

	<?php if (isset($_GET['msg'])) : ?>

		<div> <?= $_GET['msg'] ?> </div>

	<?php endif ?>


	<form action="VerificacaoEntrada.php" method="POST">
		
		<input type="text" name="email" placeholder="email">
		<input type="password" name="senha" placeholder="senha">
		<input type="submit" name="entrar">


	</form>

</body>
</html>