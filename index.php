<?php 
	
	session_start(); 
	require 'ConeccaoBD.php';

	$sql = "SELECT REC_USU_ID, REC_ID, REC_NOME, REC_INGREDIENTES, REC_PREPARO, REC_UTENSILHOS FROM VEG_RECEITA ORDER BY REC_NOME";

	$cmd = $pdo->prepare($sql);

    $cmd->execute();

    $cmd = $pdo->query($sql);

    $dados = $cmd->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
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
	

	<a href="Perfil.php"> perfil</a>



    <?php  if ( isset ( $_SESSION [ 'auten' ]) && $_SESSION [ 'auten' ] !== null ): ?>
        <a  href =" SairConta.php " > Sair da conta </a>
    <?php  else : ?>
		<a href="Entrada.php"> Usar conta</a> <a href="Registrar.php">Criar conta</a>
    <?php  endif  ?>


	<p>Bem vindo(a) <?= $_SESSION['nome_usuario'] ?> </p>
	<h2>Lista de receitas</h2>

	<?php if(count($dados) != 0) : ?>
	<table>
		<tr>
			<th>Autor</th>
			<th>Nome</th>
			<th>Ingredientes</th>
			<th>Preparo</th>
			<th>Utensilios</th>
		</tr>
		
		<?php for ($i = 0; $i < count($dados); $i++) : ?>

            <tr>

                <?php foreach ($dados[$i] as $k => $v) : ?>
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
				<td><a href="PaginaReceita.php?codigo= <?php echo $dados[$i]['REC_ID'];?>">Ver mais</a></td>
            </tr>

        <?php endfor ?>

	</table>
	<?php else : ?>
		<p>Não temos nem uma receita no momento ;-;</p>
	<?php endif ?>
</body>
</html>



	

