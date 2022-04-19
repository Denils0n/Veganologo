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
	<meta name="viewport" content="widtd=device-widtd, initial-scale=1">
	<title>Receitas</title>

	
	
<style>
body{
    background: linear-gradient(to right, #dbdbdb, #ababab);
  font-family: 'Roboto', sans-serif;
}


.wrapper {
  display: block;
  widtd: 850px;
  background: #fff;
  margin: 0 auto;
  padding: 10px 17px;
  -webkit-box-shadow: 2px 2px 3px -1px rgba(0,0,0,0.35);
}

table{
  widtd:100%;
  table-layout: fixed;
}
.tbl-header{
  background-color: rgba(255,255,255,0.3);
 }

th{
  padding: 20px 15px;
  text-align: left;
  font-weight: 500;
  font-size: 12px;
  color: #black;;
  text-transform: uppercase;
}
td{
  padding: 15px;
  text-align: left;
  vertical-align:middle;
  font-weight: 300;
  font-size: 12px;
  color: #343434;
  border-bottom: solid 1px rgba(255,255,255,0.1);
}

.nome  {
        font-weight: 600;
    color: #ffffff;
    padding: 13px;
    background: #9f9f9f !important;

}
}
.header  {
    font-weight: 900;
    color: #ffffff;
    background: #ea6153;
}

.verde {
    background: #25c481  !important;
}
th {
    padding: 15px;
    text-align: left;
    vertical-align: middle;
    font-weight: 300;
    font-size: 12px;
    color: #ffffff;
    border-bottom: solid 1px rgba(255,255,255,0.1);
}
.row {
 
    background: #f6f6f6;
}
h1 {
    color: #23af74;
    text-transform: uppercase;
    font-weight: 600;
    text-align: center;
    font-size: 25px;
    margin-bottom: 15px;
}

.button {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 13px 27px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  transition-duration: 0.4s;
  cursor: pointer;
}

.button1:hover {
  background-color: white; 
  color: black; 
  border: 2px solid #02a560;
}

.button1 {
  background-color: #02a560;
  color: white;
}

	
</style>	
</head>
<body>
	 <div class="wrapper">

	<a class="button button1" href="Perfil.php"> perfil</a>



    <?php if ( isset ( $_SESSION [ 'auten' ]) && $_SESSION [ 'auten' ] !== null ): ?>
        <a  class="button button1"   href =" SairConta.php " id =" a1 " > Sair da conta </a>
    <?php  else : ?>
		<a class="button button1" href="Entrada.php"> Usar conta</a> <a  class="button button1"  href="Registrar.php">Criar conta</a>
    <?php  endif  ?>


	<p class="row nome ">Bem vindo(a) <?= $_SESSION['nome_usuario'] ?> </p> 


  <h1>Lista de Receitas</h1>

	<?php if(count($dados) != 0) : ?>
	<table>
		<tr class="row header verde">
			<th>Altor</th>
			<th>Nome</th>
			<th>Ingrediente</th>
			<th>Preparo</th>
			<th>Utensilhos</th>
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
                            echo "<th>". $resultado[0]. "</th>";
                            
                        }elseif ($k == 'REC_ID') {
                            
                        }else {
                            echo "<th>". $v . "</th>";
                        }
                        ?>
                        
                                        
                <?php endforeach ?>
                <th><a href="PaginaReceita.php?codigo= <?php echo $dados[$i]['REC_ID'];?>">Ver mais</a></th>
            </tr>

        <?php endfor ?>

    </table>
    <?php else : ?>
        <p>Não temos nem uma receita no momento ;-;</p>
    <?php endif ?>
</body>
</html>