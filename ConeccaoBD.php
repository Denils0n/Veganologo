<?php


    $localhost = "localhost" ;
    $usuario = 'admin';
    $senha = 'admin';
    $banco = "VEGANOLOGO" ;
    global  $pdo ;

    try {
        $pdo = new  PDO ( "mysql:dbname=" .$banco. "; host =" .$localhost , $usuario , $senha );
        $pdo -> setAttribute ( PDO :: ATTR_ERRMODE , PDO :: ERRMODE_EXCEPTION );
    } catch ( Exception  $e ) {
        echo  "ERRO:" .$e->getMessage();    
        exit();
        
    }
?>