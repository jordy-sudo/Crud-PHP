<?php include 'template/header.php'?>


<?php
    include_once "modelos/conexion.php";
    $sentencia = $bd -> query("select * from persona");
    $persona = $sentencia->fetchAll(PDO::FETCH_OBJ);
    //print_r($persona)

?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <!--Inicio de alerta -->
            <?php
                if(isset($_GET['mensaje']) and $_GET['mensaje']=='Vacio'){
            ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                <strong>Error</strong> Los campos no pueden estar vacios
            </div>
            
            <?php
                }
            ?>
            <!--Segunda alerta-->
            <?php
                if(isset($_GET['mensaje']) and $_GET['mensaje']=='registrado'){
            ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                <strong>OK !</strong> Registro guardado correctamente.!
            </div>
            
            <?php
                }
            ?>
            <!--Tercera alerta alerta-->
            <?php
                if(isset($_GET['mensaje']) and $_GET['mensaje']=='error'){
            ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                <strong>Error !</strong> Algo salio mal :( .!
            </div>
            
            <?php
                }
            ?>
            <!--Cuarta alerta alerta-->
            <?php
                if(isset($_GET['mensaje']) and $_GET['mensaje']=='editado'){
            ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                <strong>Editado !</strong> El usuario a sido editado correctamente.!
            </div>
            
            <?php
                }
            ?>
            <!--Cuarta alerta alerta-->
            <?php
                if(isset($_GET['mensaje']) and $_GET['mensaje']=='eliminado'){
            ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                <strong>Eliminado !</strong> Usuario eliminado correctamente.!
            </div>
            
            <?php
                }
            ?>
            <!--Fin de alerta-->
            <div class="card border-success mb-3" >
                <div class="card-header">
                    Lista de Empleados
                </div>
                <div class="p-4">
                    <table class="table aling-middle ">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nombre </th>
                                <th scope="col">Edad</th>
                                <th scope="col">Sueldo</th>
                                <th scope="col" colspan="2">Bonos</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                foreach($persona as $dato){

                                
                            ?>
                            <tr>
                                <td scope="row"><?php echo $dato->codigo; ?></td>
                                <td><?php echo $dato->nombre; ?></td>
                                <td><?php echo $dato->edad; ?></td>
                                <td><?php echo $dato->sueldo; ?></td>
                                <td><?php echo $dato->bonos; ?></td>
                                <td ><a class="text-success" href="editar.php?codigo=<?php echo $dato->codigo; ?>"><i class="bi bi-pencil-square"></i></td>
                                <td><a onclick="return confirm('Seguro de eliminar el usuario')" class="text-danger" href="eliminar.php?codigo=<?php echo $dato->codigo; ?>"><i class="bi bi-trash-fill"></i></td>
                            </tr>

                            <?php
                                }
                            ?>
                        </tbody>
                    </table>
                    
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Ingresar Datos de un Empleado
                </div>
                <form class="p-4" method="POST" action="registrar.php">
                    <div class="mb-3">
                        <label class="form-label">Nombre:</label>
                        <input type="text" class="form-control" name="txtNombre" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Edad:</label>
                        <input type="number" class="form-control" name="txtEdad" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Sueldo:</label>
                        <input type="text" class="form-control" name="txtSueldo" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Bonos:</label>
                        <input type="text" class="form-control" name="txtBonos" autofocus required>
                    </div>
                    <div class="d-grid">
                        <input type="hidden" name="oculto" value="1">
                        <input type="submit" class="btn btn-primary" value="Registrar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<?php include 'template/footer.php'?>
    
    
    