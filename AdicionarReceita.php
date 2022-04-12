<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Mande sua receita</title>
</head>
<body>

	<?php if (isset($_GET['msg'])) : ?>

		<div> <?= $_GET['msg'] ?> </div>

	<?php endif ?>

	<form action="ValidaReceita.php" method="POST">
		
		<input type="text" name="nome" placeholder="nome">
		<input type="text" name="ingrediente" placeholder="Ingrediente">
		<input type="text" name="preparo" placeholder="Mode de preparo">
		<input type="text" name="utensilhos" placeholder="Utensilhos">
		<input type="submit" name="enviar">

	</form>

</body>
</html>