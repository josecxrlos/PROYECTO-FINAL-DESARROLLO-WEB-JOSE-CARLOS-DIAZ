<?php

if($_SESSION["rol"] != "Administrador"){

    echo '<script>
    
    window.location = "http://localhost/universidad/inicio";
    </script>';

    return;
}

?>

<div class="content-wrapper">
    <section class="content-header">
        <h1>Gestor de usuarios</h1>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-header">
                <button class="btn btn-primary" data-toggle ="modal" data-target="#CrearUsuario">Crear nuevo usuario</button>
            </div>
            <div class="box-body">

                <table class="table table-bordered table-hover table-striped T">
                    <thead>
                        <tr>
                            <th>Apellido</th>
                            <th>Nombres</th>
                            <th>Carrera</th>
                            <th>Usuario</th>
                            <th>Contraseña</th>
                            <th>Rol</th>
                            <th>Editar / Borrar</th>
                        </tr>
                    </thead>

                        <tbody>

                        <?php
                            $columna = null;
                            $valor = null;

                            $resultado = UsuariosC::VerUsuariosC($columna, $valor);
                            foreach($resultado as $key => $value){
                                echo '<tr>
                                <td>'.$value["apellido"].'</td>
                                <td>'.$value["nombre"].'</td>';

                                if($value["id_carrera"] == 0){
                                    echo '<td>Usuario administrador</td>';
                                }else{
                                $columnaC = "id";
                                $valorC = $value["id_carrera"];

                                $carrera = CarrerasC::CarreraC($columnaC, $valorC);

                                echo '<td>'.$carrera["nombre"].'</td>';
                                }
                                
                                

                                echo '<td>'.$value["carnet"].'</td>
                                <td>'.$value["clave"].'</td>
                                <td>'.$value["rol"].'</td>

                                <td>
                                    <div class="btn-group">

                                        <button class="btn btn-success EditarUsuario" Uid="'.$value["id"].'" data-toggle="modal" 
                                        data-target="#EditarUsuario">Editar</button>
                                        <button class="btn btn-danger EliminarUsuario" Uid="'.$value["id"].'">Borrar</button>
                                    </div>


                                </td>
                                </tr>';
                            }
                        ?>
                            
                        </tbody>
                </table>


            </div>
        </div>
    </section>
</div>




<div class="modal fade" id="CrearUsuario">
    <div class="modal-dialog">

    <div class="modal-content">
        <form method="POST">
            <div class="modal-body">
                <div class="box-body">
                    <div class="form-group">
                        <h2>Apellido:</h2>
                        <input class="form-control input-lg" type="text" name="apellidoU" required>
                    </div>
                    <div class="form-group">
                        <h2>Nombre:</h2>
                        <input class="form-control input-lg" type="text" name="nombreU" required>
                    </div>
                    <div class="form-group">
                        <h2>Usuario:</h2>
                        <input class="form-control input-lg" type="text" id="carnet" name="usuarioU" required>
                    </div>
                    <div class="form-group">
                        <h2>Contraseña:</h2>
                        <input class="form-control input-lg" type="text" name="claveU" required>
                    </div>
                    <div class="form-group">
                        <h2>Seleccionar Carrera:</h2>
                        <select class="form-control input-lg" name="carreraU">
                        <option value="0">Seleccionar Carrera...</option>  
                        
                        <?php
                            $carreras = CarrerasC::VerCarrerasC();

                            foreach($carreras as $key => $value){
                                echo '<option value="'.$value["id"].'">'.$value["nombre"].'</option>';
                            }
                        ?>
                        


                        </select>
                    </div>

                    <div class="form-group">
                        <h2>Seleccionar Rol:</h2>
                        <select class="form-control input-lg" name="rolU" required>
                        <option>Seleccionar Rol...</option>    
                        <option value="Administrador">Administrador</option>
                        <option value="Estudiante">Estudiante</option>


                        </select>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Crear</button>
                <button type="submit" class="btn btn-danger">Salir</button>
            </div>

            <?php

            $crearU = new UsuariosC();
            $crearU -> CrearUsuarioC();

            ?>
        </form>
    </div>
    </div>
</div>

<div class="modal fade" id="EditarUsuario">
    <div class="modal-dialog">

    <div class="modal-content">
        <form method="POST">
            <div class="modal-body">
                <div class="box-body">
                    <div class="form-group">
                        <h2>Apellido:</h2>
                        <input class="form-control input-lg" type="text" id="apellidoEU" name="apellidoEU" required>
                        
                        <input class="form-control input-lg" type="hidden" id="Uid" name="Uid" required>
                    </div>
                    <div class="form-group">
                        <h2>Nombre:</h2>
                        <input class="form-control input-lg" type="text" id="nombreEU" name="nombreEU" required>
                    </div>
                    <div class="form-group">
                        <h2>Usuario:</h2>
                        <input class="form-control input-lg" type="text" id="usuarioEU" name="usuarioEU" required>
                    </div>
                    <div class="form-group">
                        <h2>Contraseña:</h2>
                        <input class="form-control input-lg" type="text" id="claveEU" name="claveEU" required>
                    </div>
                    <div class="form-group" id="carrera">

                       <h2>Seleccionar carrera:</h2>
                        <select class="form-control input-lg" name="carreraEU">
                        
                        <option id="carr"></option>  
                        
                        
                        <?php
                            $carreras = CarrerasC::VerCarrerasC();

                            foreach($carreras as $key => $value){
                                echo '<option value="'.$value["id"].'">'.$value["nombre"].'</option>';
                            }
                        ?>


                        </select>
                    </div>

                    <div class="form-group">

                    <h2 id="rolActual">/h2>

                        <h2>Seleccionar nuevo rol:</h2>
                        <select class="form-control input-lg" name="rolEU" required>
                       
                        <option id="rol"></option>    
                        
                        <option value="Administrador">Administrador</option>
                        <option value="Estudiante">Estudiante</option>


                        </select>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-success">Guardar Cambios</button>
                <button type="submit" class="btn btn-danger">Salir</button>
            </div>

            <?php
                $actualizarU = new UsuariosC();
                $actualizarU -> ActualizarUsuariosC();
            ?>
        </form>
    </div>
    </div>
</div>



<?php
    $eliminarU = new UsuariosC();
    $eliminarU -> EliminarUsuariosC();
?>