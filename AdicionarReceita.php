<?php 
session_start(); 

if ( isset ( $_SESSION [ 'auten' ]) && $_SESSION [ 'auten' ] === null ){
    header("location:Registrar.php");

}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Mande sua receita</title>
	<style>
		body{
			background-color: #90ee90;
		}
		#div1{
			background-color: rgba(0,0,0,0.9);
			position: absolute;
			top: 50%;
			left: 50%;
			transform: translate(-50%,-50%);
			padding: 60px;
			border-radius: 15px;
			color: #ffff;
			
		}
		input{
			padding:15px;
			border:none;
			outline: none;
			font-size: 15px;
		}
		#button{
			background-color: dodgerblue;
			border:none;
			padding: 15px;
			width:100%;
			border-radius: 10px;
			color: white;
			font-size: 15px;
			cursor:pointer;
			width: 100%;

		}
		#button:hover{
			background-color: deepskyblue;
			cursor: pointer;
		}
		#button1{
			float:left;
			width: 90%;
		}
		#button2{
			float:left;
			width: 90%;
		}
		#button3{
			float:left;
			width: 90%;
		}
		#button4{
			float:left;
			width: 90%;
		}
		
	</style>
</head>
<body>
	<?php if (isset($_GET['msg'])) : ?>

		<div> <?= $_GET['msg'] ?> </div>

	<?php endif ?>

	<form action="ValidaReceita.php" method="POST">
	<div id="div1">
		<h1>Adicione sua receita<h1>
		<input type="text" name="nome" placeholder="Nome" id="button1">
		<br><br>
		<input type="text" name="ingrediente" placeholder="Ingredientes" id="button2">
		<br><br>
		<input type="text" name="preparo" placeholder="Modo de preparo" id="button3">
		<br><br>
		<input type="text" name="utensilhos" placeholder="Utensilios" id="button4">
		<br><br>
		<input type="submit" name="enviar" id="button">
	</div>

	</form>

	<a href="SuasReceitas.php"> Voltar </a>

</body>
</html>