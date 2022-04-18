<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Entrar</title>
	<style>
		body{
			background-color: #90ee90;
		}
		#div2{
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

		}
		button:hover{
			background-color: deepskyblue;
			cursor: pointer;
		}
		
	</style>
</head>
<body>

	<?php if (isset($_GET['msg'])) : ?>

		<div id="div1"> <?= $_GET['msg'] ?> </div>

	<?php endif ?>


	<form action="VerificacaoEntrada.php" method="POST">

	<div id="div2">
		<h1>Entrar<h1>
		<input type="text" name="email" placeholder="email">
		<br><br>
		<input type="password" name="senha" placeholder="senha">
		<br><br>
		<input type="submit" name="entrar" id="button">
	</div>


	</form>

</body>
</html>