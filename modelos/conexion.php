<?php
$pssw = "Literaturarusa1";
$usuario ="root";
$nombre_base = "crud";

try{
    $bd=new PDO(
        'mysql:host=localhost;
        dbname='.$nombre_base,
        $usuario,
        $pssw,
        array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
    );
}catch(Exception $e){
    echo "Problema con la conexion de base de datos : ".$e->getMessage();
}


?>