<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Mande sua receita</title>

	<style>
    body{
      background: #4caf519e;
    }
.input[type=text] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

.input[type=submit] {
  width: 100%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}
 .voltar{
    text-decoration:none;
    text-align: center;
    display: inline-block;
    width: 95%;
    background-color: #0096af;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

.input[type=submit]:hover {
  background-color: #45a049;
}

.div {
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 20px;
    width: 50%;
    display: block;
    width: 710px;
    background: #f3f3f3;
    margin-top: 64px;
    margin: 50px 23%;
}
</style>
</head>
<body>
<?php  if ( isset ( $_SESSION [ 'auten' ]) && $_SESSION [ 'auten' ] !== null ): ?>
        <?php  header("lcoation:Registrar.php")?>

    <?php  endif  ?>
	<?php if (isset($_GET['msg'])) : ?>

		<div> <?= $_GET['msg'] ?> </div>

	<?php endif ?>

<div class="div" >
	<h2>Sua receita</h2>
  <form action="/action_page.php"  method="POST">
    <label for="fname">nome</label>
    <input  class="input" type="text" name="nome" placeholder="nome">

    <label for="lname">Ingrediente</label>
    <input class="input" type="text" name="ingrediente" placeholder="Ingrediente">

  <label for="lname">Mode de preparo</label>
    <input class="input" type="text" name="preparo" placeholder="Mode de preparo">
    
      <label for="lname">Utensilhos</label>
    <input class="input" type="text" name="utensilhos" placeholder="Utensilhos">
  
    <input class="input" type="submit" value="Submit">
    </br>
    </br>
    <a class="voltar" href="Perfil.php"> Voltar </a>
  </form>
</div>

</body>
</html>
