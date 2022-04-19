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
	<meta name="viewport" content="widtd=device-widtd, initial-scale=1">
	<title>Receitas</title>
    <style>
            body{
                background-color: #90ee90;
            }
            #receitas{
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
            th{
                text-align: center;
                background: #666;
                color: black;
            }
            table{
                background: #E6E6FA;
                border-color: #2F4F4F;
                border-style: dotted;
            }
            tr{
                text-align: center; 
            }
            
            </style>
	
</head>
<body>
	

	<?php if(count($d) != 0) : ?>
        <table>
            <tr>
                <th>Autor</th>
                <th>Nome</th>
                <th>Ingredientes</th>
                <th>Preparo</th>
                <th>Utensilios</th>
            </tr>
            
     
                <tr>
                    
                    <?php foreach ($d as $k => $v) : ?>
					<?php 
						if ($k == 'REC_USU_ID') {
							
							$cmd = $pdo->prepare("SELECT USU_NOME FROM VEG_USUARIO WHERE USU_ID = :id");
                    		$cmd->bindValue(":id", $v);
                    		$cmd->execute();
                    		$resultado = $cmd->fetch();
							echo "<td>". $resultado[0]. "</td>";
							
						}elseif ($k == 'REC_ID') {
							
						}else {
							echo "<td>". $v . "</td>";
						}
						?>
						
										
                <?php endforeach ?>
				
            </tr>

    <?php endif ?>
	</table>
<a href="Comentarar.php">Comentar</a>
</body>
</html>
