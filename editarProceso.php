<?php
    print_r($_POST);
    if(!isset($_POST['codigo'])){
        header('Location: index.php?mensaje=error');

    }
    include 'modelos/conexion.php';
    $codigo = $_POST['codigo'];

    $nombre = $_POST["txtNombre"];
    $edad = $_POST["txtEdad"];
    $sueldo = $_POST["txtSueldo"];
    $bonos = $_POST["txtBonos"];

    $sentencia = $bd->prepare("UPDATE persona SET nombre=?,edad=?,sueldo=?,bonos=? WHERE codigo = ?;");
    $resultado = $sentencia->execute([$nombre,$edad,$sueldo,$bonos,$codigo]);

    if ($resultado === true) {
        header('Location: index.php?mensaje=editado');
    } else {
        header('Location: index.php?mensaje=error');
        exit();
    }
    
    

?>