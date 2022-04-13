<?php

	$email = $_POST['email'];
	$Senha = $_POST['senha'];



	require 'ConeccaoBD.php';


	$sql = "SELECT USU_ID,USU_NOME FROM VEG_USUARIO WHERE USU_EMAIL = '$email' AND USU_SENHA = '$Senha'";
	
	$resultado = $pdo-> query($sql);
	
	
	$usuario = $resultado->fetch();
	
	if ($usuario === false) {
		
		header("location:Entrada.php?msg=Email ou senha errada");
		exit();
	}
	session_start();

	$_SESSION['auten'] = true;
	$_SESSION['codigo_usuario'] = $usuario['USU_ID'];
	$_SESSION['nome_usuario'] = $usuario['USU_NOME'];
	
	header("location:index.php")
		



?>