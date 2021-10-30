<?php

if($_SESSION["rol"] != "Administrador"){
    echo '<script>
    
    window.location = "http://localhost/universidad/inicio";
    </script>';

    return;

}

?>


<div class="content-wrapper">
    <section class="content">
        <div class="box">
            <div class="box-body">
                <form method="POST">

                    <?php

                    $exp = explode("/", $_GET["url"]);

                    $columna = "carnet";
                    $valor = $exp[2];

                    $estudiante = UsuariosC::VerUsuariosC($columna, $valor);

                    echo '<h2>Alumno: '.$estudiante["apellido"].' '.$estudiante["nombre"].' - Carnet: '.$estudiante["carnet"].'</h2>';
                   
                    echo '<input type="hidden" name="id_alumno" value="'.$estudiante["id"].'">
                    <input type="hidden" name="carnet" value="'.$estudiante["carnet"].'">
                    <input type="hidden" name="id_carrera" value="'.$exp[1].'">';

                    $columna = "id";
                    $valor = $exp[1];

                    $materia = CursosC::VerCursos2C($columna, $valor);

                    echo '<h2>Curso: '.$materia["nombre"].'</h2>
                    <input type="hidden" name="id_curso" value="'.$materia["id"].'">';
                    ?>
                     

                    <div class="row">
                        <div class="col-md-6 col-xs-12">

                         <?php

                            $columna = "id";
                            $valor = $exp[3];

                            $resultado = CursosC::VerNotas2C($columna, $valor);

                            echo'<h2>Fecha:</h2>
                                <input type="text" class="input-lg" name="fecha" value="'.$resultado["fecha"].'">
                                <input type="hidden" class="input-lg" name="nota_id" value="'.$resultado["id"].'">


                                <h2>Profesor: </h2>
                                <input type="text" class="input-lg" name="profesor" value="'.$resultado["profesor"].'">
                                </div>
                                <div class="col-md-6 col-xs-12">

                                <h2>Estado actual: '.$resultado["estado"].'</h2>
                                <select class="input-lg" name="estado">
                                
                                <option value="'.$resultado["estado"].'">Seleccionar...</option>
                                
                                <option value="No cursada">No cursada</option>
                                <option value="Aprobado">Aprobado</option>
                                <option value="Regular">Regular</option>
                                <option value="Desaprobado">Desaprobado</option>
                                </select>
                                <h2>Nota Final: </h2>
                                <input type="text" class="input-lg" name="nota_final" value="'.$resultado["nota_final"].'">
                            ';

                         ?>
                            <br><br>

                            <button class="btn btn-success btn-lg" type="submit">Guardar nota</button>
                        </div>
                    </div>

                    <?php

                    $notas = new CursosC();
                    $notas -> CambiarNotaC();

                    ?>
                </form>
            </div>
        </div>
    </section>
</div>