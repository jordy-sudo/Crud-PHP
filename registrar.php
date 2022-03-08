<?php
    if(empty($_POST["oculto"] )|| empty($_POST["txtNombre"]) || empty($_POST["txtEdad"])){
        header('Location: index.php?mensaje=Vacio');
        exit();
    }

    include_once 'modelos/conexion.php';
    $nombre = $_POST["txtNombre"];
    $edad = $_POST["txtEdad"];
    $sueldo = $_POST["txtSueldo"];
    $bonos = $_POST["txtBonos"];

    $sentencia = $bd->prepare("INSERT INTO persona(nombre,edad,sueldo,bonos) VALUES (?,?,?,?);");
    $resultado = $sentencia->execute([$nombre,$edad,$sueldo,$bonos]);
    if ($resultado === TRUE) {
        header('Location: index.php?mensaje=registrado');
    } else {
        header('Location: index.php?mensaje=error');
        exit();
    }
    

?>