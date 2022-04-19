<?php

    session_start();
    if (isset($_GET['codigo'])) {
        $ap = addslashes($_GET['codigo']);
    }
            
        
    require 'ConeccaoBD.php';
    

    $cmd = $pdo->prepare("SELECT REC_NOME,REC_INGREDIENTES,REC_PREPARO,REC_UTENSILHOS FROM VEG_RECEITA WHERE REC_ID = :d");
    $cmd->bindValue(":d",$ap);
    $cmd->execute();
    $resultado = $cmd->fetch(PDO::FETCH_ASSOC);
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vai que é tua Paloma</title>
    <style>
		body{
			background-color: #90ee90;
		}
		#div1{
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
		#button{
			background-color: dodgerblue;
			border:none;
			padding: 15px;
			width:100%;
			border-radius: 10px;
			color: white;
			font-size: 15px;
			cursor:pointer;
			width: 100%;

		}
		#button:hover{
			background-color: deepskyblue;
			cursor: pointer;
		}
		#button1{
			float:left;
			width: 90%;
		}
		#button2{
			float:left;
			width: 90%;
		}
		#button3{
			float:left;
			width: 90%;
		}
		#button4{
			float:left;
			width: 90%;
		}
		
	</style>
</head>
<body>
    
<div id="myModal<?php echo $aqui['login_id']?>" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Editar Receita</h4>
            </div>
            <div class="modal-body">
            <div id="div1">
                <form role="form" method="POST" action="ModificarReceita.php?codigo= <?php echo $ap;?>">
                    <div class="form-group">
                            <input id="id" class="form-control" value=" <?= $ap ?> " name="id" type="hidden">
                            <br><br>    
                    </div>
                    <div class="form-group">
                        <div class="form-line">
                            <input type="text" class="form-control" required value="<?= $resultado['REC_NOME']?>" name="nome">
                        </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" class="form-control" value="<?= $resultado['REC_INGREDIENTES']?>" required  name="ingrediente">
                            </div>
                            <div class="col-sm-12">
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" class="form-control" required value="<?= $resultado['REC_PREPARO']?>" name="preparo">
                            </div>
                            <div class="col-sm-12">
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" class="form-control" required value="<?= $resultado['REC_UTENSILHOS']?>" name="utensilhos">
                            </div>
                        </div>
                    </div>
                    <div class="form-line">
                        <input type="submit" name="enviar" >
                    </div>
                </form>
            </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
