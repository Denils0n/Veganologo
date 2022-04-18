<?php 

session_start();

if (isset($_GET['codigo'])) {
    $ap = addslashes($_GET['codigo']);
}
        
    
    require 'ConeccaoBD.php';
    

    $cmd = $pdo->prepare("SELECT REC_USU_ID, REC_ID, REC_NOME,REC_INGREDIENTES,REC_PREPARO,REC_UTENSILHOS FROM VEG_RECEITA WHERE REC_ID = :d");
    $cmd->bindValue(":d",$ap);
    $cmd->execute();
    
    $d = $cmd->fetch(PDO::FETCH_ASSOC);


    
    

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Receitas</title>
	
</head>
<body>
	

	<?php if(count($d) != 0) : ?>
        <table>
            <tr>
                <td>Altor</td>
                <td>Nome</td>
                <td>Ingrediente</td>
                <td>Preparo</td>
                <td>Utensilhos</td>
            </tr>
            
     
                <tr>
                    
                    <?php foreach ($d as $k => $v) : ?>
					<?php 
						if ($k == 'REC_USU_ID') {
							
							$cmd = $pdo->prepare("SELECT USU_NOME FROM VEG_USUARIO WHERE USU_ID = :id");
                    		$cmd->bindValue(":id", $v);
                    		$cmd->execute();
                    		$resultado = $cmd->fetch();
							echo "<th>". $resultado[0]. "</th>";
							
						}elseif ($k == 'REC_ID') {
							
						}else {
							echo "<th>". $v . "</th>";
						}
						?>
						
										
                <?php endforeach ?>
				
            </tr>

    <?php endif ?>
	</table>
<a href="Comentarar.php">Comentarar</a>
</body>
</html>
