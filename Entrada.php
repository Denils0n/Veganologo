<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Entrar</title>
	<style>

        body {
            background-color: #b1d0e0;

        }

        h1 {
            margin-top: 2%;
            margin-left: 1%;
            font-size: 50px;
        }

        h2 {
            margin-top: 8%;
            margin-left: 47%;
            font-size: 40px;

        }

       

        .texto {
            width: 80%;
            height: 12%;
            box-shadow: 4px 5px rgba(0, 0, 0, 0.535);
            margin-left: 10%;
            margin-top: 11%;
            background-color: #406882;
            border-radius: 8px;
        }

        .text {
            color: rgb(7, 7, 7);
            font-size: 2vw;
        }

        .t {
            width: 38%;
            height: 35%;
            background-color: #6998AB;
            border-radius: 2%;
            position: absolute;
            top: 36%;
            left: 32%;
            box-shadow: 4px 5px rgba(0, 0, 0, 0.535);
            text-align: center;
        }

        input {
            display: block;
            margin-top: 5%;
            margin-left: 6%;
            font-size: 40px;

        }

	</style>
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