<?php 
	
	session_start(); 

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Perfil</title>
</head>
<body>

	<p> <?= $_SESSION['nome_usuario'] ?> </p>
	<a href="AdicionarReceita.php"> Adiconar receitas</a>
	<a href="SuasReceitas.php"> sua receitas</a>


</body>
</html>