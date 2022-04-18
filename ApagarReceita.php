
<?php 

    if (isset($_GET['codigo'])) {
        $ap = addslashes($_GET['codigo']);
    }

    
	require 'ConeccaoBD.php';
    

    $cmd = $pdo->prepare("DELETE FROM VEG_RECEITA WHERE REC_ID = :d");
    $cmd->bindValue(":d",$ap);
    $cmd->execute();
    header("location:index.php");

?>
