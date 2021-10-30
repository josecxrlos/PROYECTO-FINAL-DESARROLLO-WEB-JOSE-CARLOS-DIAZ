<?php

if($_SESSION["rol"] != "Administrador"){

    echo '<script>
    
    window.locations = "inicio";
    </script>';
}

?>



<div class="content-wrapper">
    <section class="content">
        <div class="box">
            <div class="box-body">

            <?php

                $exp = explode("/", $_GET["url"]);

                $columna = "id";
                $valor = $exp[1];

                $materia = CursosC::VerCursos2C($columna, $valor);

                echo '<h2>Horarios del curso: '.$materia["nombre"].'</h2>';
            ?>
                

                <div class="row">
                    <div class="col-md-12 col-xs-12">
                        <button class="btn btn-primary btn-md" data-toggle="modal" 
                        data-target="#CrearComision">Crear horario</button>

                        <h2>Horarios: </h2>

                        <table class="table table-bordered table-hover table-striped T">
                            <thead>
                                <tr>
                                    <th>N°</th>
                                    <th>Máximo de alumnos</th>
                                    <th>Días</th>
                                    <th>Horarios</th>

                                    <th></th>
                                </tr>
                            </thead>

                            <tbody>

                                <?php

                                    $columna = "id_curso";
                                    $valor = $exp[1];

                                    $comisiones = CursosC::VerComisionesC($columna, $valor);

                                    foreach($comisiones as $key => $value){

                                        echo '<tr>
                                        <td>'.$value["numero"].'</td>
                                        <td>'.$value["c_maxima"].'</td>
                                        <td>'.$value["dias"].'</td>
                                        <td>'.$value["horario"].'</td>
    
                                        <td>

                                            <a href="http://localhost/universidad/tcpdf/pdf/Inscriptos-Materia.php/'.$exp[1].'/'.$value["id"].'" target="blank">

                                            <button class="btn btn-primary">Generar PDF</button>
                                            
                                            </a>
                                            <button class="btn btn-danger BorrarComision" Cid="'.$value["id"].'"
                                            Mid="'.$exp[1].'">Eliminar horario</button>
                                        </td>
                                        </tr>';
                                    }

                                ?>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<div class="modal fade" id="CrearComision">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST">
                <div class="box-body">
                    <div class="form-group">
                        <h2>Número:</h2>
                        <input type="number" class="form-control input-lg" name="numero" required="">

                        <?php

                            echo '<input type="hidden" class="form-control input-lg" name="id_curso" 
                            value="'.$exp[1].'" required="">
                            ';

                        ?>
                    </div>
                    <div class="form-group">
                        <h2>Máximo de alumnos: </h2>
                        <input type="number" class="form-control input-lg" name="c_maxima" required="">
                    </div>
                    <div class="form-group">
                        <h2>Días: </h2>
                        <input type="text" class="form-control input-lg" name="dias" required="">
                    </div>
                    <div class="form-group">
                        <h2>Horarios</h2>
                        <input type="text" class="form-control input-lg" name="horario" required="">
                    </div>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-primary" type="submit">Crear</button>
                    <button class="btn btn-danger" type="button" data-dismiss="modal">Cancelar</button>
                </div>

                <?php

                    $crearC = new CursosC();
                    $crearC -> CrearComisionC();

                ?>
            </form>
        </div>
    </div>
</div>

<?php

    $borrarC = new CursosC();
    $borrarC -> BorrarComisionC();

?>

