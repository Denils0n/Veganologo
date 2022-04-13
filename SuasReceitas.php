<?php 
	
	session_start(); 
	require 'ConeccaoBD.php';

	$sql = "SELECT REC_ID, REC_NOME, REC_INGREDIENTES, REC_PREPARO, REC_UTENSILHOS FROM VEG_RECEITA ORDER BY REC_NOME";

	$cmd = $pdo->prepare($sql);

    $cmd->execute();

    $cmd = $pdo->query($sql);

    $dados = $cmd->fetchAll(PDO::FETCH_ASSOC);

?>
<?php if(count($dados) != 0) : ?>
	<table>
		<tr>
			
			<td>Nome</td>
			<td>Ingrediente</td>
			<td>Preparo</td>
			<td>Utensilhos</td>
            
		</tr>
		
		<?php for ($i = 0; $i < count($dados); $i++) : ?>
            

            <tr>

                <?php foreach ($dados[$i] as $k => $v) : ?>
                   
                    <?php ?>
                    <?php 
                        
                        if ($k == "REC_ID") {
                            
                        } elseif ($k == "REC_USU_ID") {
                            
                        }else {
                            echo "<th>" . $v  ."</th>";
                        }
                            
                        
                    ?>
                        
                        
                        
                        <?php endforeach ?>
                        <th>
                            
                            <th> <a href="EditarReceita.php?codigo= <?php echo $dados[$i]['REC_ID'];?>"> editar </a> </th>
                            <th> <a href="ApagarReceita.php?codigo= <?php echo $dados[$i]['REC_ID'];?>">apagar</a> </th>
                        </th>
            </tr>
        <?php endfor ?>

	</table>
<?php endif ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suas receitas</title>
</head>
<body>

    <a href="index.php">Pagina principal</a>

</body>
</html>