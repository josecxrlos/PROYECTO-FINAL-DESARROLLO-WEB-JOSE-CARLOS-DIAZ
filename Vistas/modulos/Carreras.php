<?php

if($_SESSION["rol"] != "Administrador"){

    echo '<script>
    
    window.locations = "inicio";
    </script>';
}

?>

<div class="content-wrapper">
    <section class="content-header">
        <h1>Gestor de carreras universitarias</h1>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-header">
                <form method="POST">

                    <div class="col-md-6 col-xs-12">


                    <input type="text" name="carrera" class="form-control" placeholder="Ingresar nueva carrera" required>
                    
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Crear carrera</button>
                </form>

                    <?php

                        $crearCarrera = new CarrerasC();
                        $crearCarrera -> CrearCarreraC();

                    ?>

                    <br>
                    <?php

                    $columna = "id";
                    $valor = 1;

                    $resultado = AjustesC::VerAjustesC($columna, $valor);

                    if($resultado["h_cursos"]==0){

                        echo '<button class="btn btn-success" type="submit" data-toggle="modal" data-target="#HM">Habilitar inscripciones a cursos</button>';
                    }else{

                        echo '<button class="btn btn-warning" type="submit" data-toggle="modal" data-target="#DM">Deshabilitar inscripciones a cursos</button>';
                   
                    }

                    ?>

                    <button class="btn btn-danger pull-right" type="submit" data-toggle="modal" data-target="#VaciarRegistrosMaterias">Vaciar registros de inscripciones a cursos</button>

            </div>
            <div class="box-body">
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Nombre</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>


                        <?php

                            $resultado = CarrerasC::VerCarrerasC();

                            foreach($resultado as $key => $value){
                                echo '<tr>
                                <td>'.$value["id"].'</td>
                                <td>'.$value["nombre"].'</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="Editar-Carrera/'.$value["id"].'">
                                            <button class="btn btn-success">Editar</button>
                                        </a>
                                        <a href="Carreras/'.$value["id"].'">
                                            <button class="btn btn-danger">Borrar</button>
                                        </a>
                                        <a href="Crear-Materias/'.$value["id"].'">
                                            <button class="btn btn-warning">Cursos</button>
                                        </a>
                                        <a href="Estudiantes/'.$value["id"].'">
                                            <button class="btn btn-primary">Estudiantes</button>
                                        </a>
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


<div class="modal fade" id="HM">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST">
                <div class="modal-body">
                    <div class="box-body">
                        <div class="form-group">
                            <h2>¿Estás seguro de habilitar inscripciones a cursos?</h2>
                            <input type="hidden" name="h_cursos" value="1">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Confirmar</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                </div>

                <?php
                
                $HM = new AjustesC();
                $HM -> HMC();

                ?>
            </form>
        </div>

    </div>
</div>


<div class="modal fade" id="DM">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST">
                <div class="modal-body">
                    <div class="box-body">
                        <div class="form-group">
                            <h2>¿Estás seguro de deshabilitar inscripciones a cursos?</h2>
                            <input type="hidden" name="h_cursos" value="0">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Confirmar</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                </div>
            </form>
        </div>

    </div>
</div>

<div class="modal fade" id="VaciarRegistrosMaterias">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST">
                <div class="modal-body">
                    <div class="box-body">
                        <div class="form-group">
                            <h2>¿Estás seguro de eliminar todas las inscripciones a cursos?</h2>
                            <input type="hidden" name="E" value="E">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Confirmar</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                </div>

                <?php

                $vaciar = new cursosC();
                $vaciar -> VaciarRegistrosMateriasC();

                ?>
            </form>
        </div>

    </div>
</div>
<?php
$borrarCarrera = new CarrerasC();
$borrarCarrera -> BorrarCarrerasC();
