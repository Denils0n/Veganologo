<?php

session_start();

$usu = $_SESSION['codigo_usuario']; 
$nome = $_POST['nome'];
$ingrediente = $_POST['ingrediente'];
$preparo = $_POST['preparo'];
$utensilhos = $_POST['utensilhos'];

require 'ConeccaoBD.php';

$sql = "SELECT REC_NOME FROM VEG_RECEITA WHERE REC_NOME = '$nome'";
	
$resultado = $pdo-> query($sql);
	
$receita = $resultado->fetch();




if ($receita === false) {
		
	$res = $pdo->prepare("INSERT INTO VEG_RECEITA (REC_USU_ID, REC_NOME, REC_INGREDIENTES, REC_PREPARO, REC_UTENSILHOS) VALUES (:us, :n, :i, :p, :u)");
	$res->bindValue(":us", $usu);
	$res->bindValue(":n", $nome);
	$res->bindValue(":i", $ingrediente);
	$res->bindValue(":p", $preparo);
	$res->bindValue(":u", $utensilhos);
	$res->execute();
	header("location:AdicionarReceita.php?msg=receita adicionada com sucesso :) obg <3");

}else{

	header("location:AdicionarReceita.php?msg=Receita já existe no site ou já temos uma receita com o mesmo nome");
	exit();

}


?>