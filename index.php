<?php 
	
	session_start(); 
	require 'ConeccaoBD.php';

	$sql = "SELECT REC_USU_ID, REC_NOME, REC_INGREDIENTES, REC_PREPARO, REC_UTENSILHOS FROM VEG_RECEITA ORDER BY REC_NOME";

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
</head>
<body>
	

	<a href="Perfil.php"> perfil</a>



    <?php  if ( isset ( $_SESSION [ 'auten' ]) && $_SESSION [ 'auten' ] !== null ): ?>
        <a  href =" SairConta.php " id =" a1 " > Sair da conta </a>
    <?php  else : ?>
		<a href="Entrada.php"> Usar conta</a> <a href="Registrar.php">Criar conta</a>
    <?php  endif  ?>


	<p>Bem vindo(a) <?= $_SESSION['nome_usuario'] ?> </p>
	<h2>Lista de receitas</h2>

	<?php if(count($dados) != 0) : ?>
	<table>
		<tr>
			<td>Altor</td>
			<td>Nome</td>
			<td>Ingrediente</td>
			<td>Preparo</td>
			<td>Utensilhos</td>
		</tr>
		
		<?php for ($i = 0; $i < count($dados); $i++) : ?>

            <tr>

                <?php foreach ($dados[$i] as $k => $v) : ?>

                    <?php if ($k == 'REC_USU_ID') : ?>
                    	<?php 
						
							$cmd = $pdo->prepare("SELECT USU_NOME FROM VEG_USUARIO WHERE USU_ID = :id");
                    		$cmd->bindValue(":id", $v);
                    		$cmd->execute();
                    		$resultado = $cmd->fetch();
                    		
						?>
						<th>
							<?= $resultado[0] ?>
						</th>
					
                    <?php else : ?>
                        <th>
                            <?= $v ?>
                        </th>

                    <?php endif ?>

                <?php endforeach ?>
            </tr>

        <?php endfor ?>

	</table>
	<?php else : ?>
		<p>Não temos nem uma receita no momento ;-;</p>
	<?php endif ?>
</body>
</html>



	

