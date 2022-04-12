<?php  
if (isset($_GET['codigo'])) {
        
$ap = addslashes($_GET['codigo']);
}

$nome = $_POST['nome'];
$ingrediente = $_POST['ingrediente'];
$preparo = $_POST['preparo'];
$utensilhos = $_POST['utensilhos'];

require 'ConeccaoBD.php';


$cmd = $pdo->prepare("UPDATE VEG_RECEITA SET REC_NOME = :n, REC_INGREDIENTES = :i, REC_PREPARO = :p, REC_UTENSILHOS = :u WHERE REC_ID = :codigo");
$cmd->bindValue(":n", $nome);
$cmd->bindValue(":i", $ingrediente);
$cmd->bindValue(":p", $preparo);
$cmd->bindValue(":u", $utensilhos);
$cmd->bindValue(":codigo", $ap);
$cmd->execute();
header("location:SuasReceitas.php");
?>