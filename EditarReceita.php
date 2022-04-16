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
    <div id="myModal<?php echo $aqui['login_id']?>" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Editar Receita</h4>
                </div>
                <div class="modal-body">
                    <form role="form" method="POST" action="ModificarReceita.php?codigo= <?php echo $ap;?>">
                        <div class="form-group">
                                <input id="id" class="form-control" value=" <?= $ap ?> " name="id" type="hidden">
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
                            <input type="submit" name="enviar">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php ?>