
<?php 

	
	session_start(); 
    $ab = $_SESSION['codigo_usuario'];

	require 'ConeccaoBD.php';



    session_start(); 
	require 'ConeccaoBD.php';

	$sql = "SELECT REC_USU_ID,REC_ID, REC_NOME, REC_INGREDIENTES, REC_PREPARO, REC_UTENSILHOS FROM VEG_RECEITA WHERE REC_USU_ID = $ab";

	$cmd = $pdo->prepare($sql);

    $cmd->execute();

    $cmd = $pdo->query($sql);

    $dados = $cmd->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Suas receitas</title>
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
    
    <a href="index.php">Pagina principal</a>
    
    <?php if(count($dados) != 0) : ?>
    
        <table>
            <tr>
            
                <th>Nome</th>
                <th>Ingredientes</th>
                <th>Preparo</th>
                <th>Utensilios</th>
    
            </tr>
            
            <?php for ($i = 0; $i < count($dados); $i++) : ?>
                
    
                <tr>
    
                    <?php foreach ($dados[$i] as $k => $v) : ?>
                       
                        <?php ?>
                        <?php 
                            
                            if ($k == "REC_ID") {
                                
                            } elseif ($k == "REC_USU_ID") {
                                
                            }else {
                                echo "<td>" . $v  ."</td>";
                            }
                                
                            
                        ?>
                            
                            
                            
                            <?php endforeach ?>
                            
                                
                                <td> <a href="EditarReceita.php?codigo= <?php echo $dados[$i]['REC_ID'];?>"> editar </a> </td>
                                <td> <a href="ApagarReceita.php?codigo= <?php echo $dados[$i]['REC_ID'];?>">apagar</a> </td>
                            
                </tr>
            <?php endfor ?>
    
        </table>
    <?php endif ?>
</body>
</html>