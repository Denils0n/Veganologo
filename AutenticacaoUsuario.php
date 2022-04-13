<?php  

	require ('ConeccaoBD.php');
	
	$email = $_POST['email'];
	$nome = $_POST['nome'];
	$senha = $_POST['senha'];
	

	$res = $pdo->prepare("INSERT INTO VEG_USUARIO (USU_NOME, USU_EMAIL, USU_SENHA) VALUES (:n, :e, :s)");
	$res->bindValue(":n", $nome);
	$res->bindValue(":e", $email);
	$res->bindValue(":s", $senha);
	$res->execute();

	header("location:Entrada.php");

?>