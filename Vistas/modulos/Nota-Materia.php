<?php

$exp = explode("/", $_GET["url"]);
$columna = "id_curso";
$valor = $exp[3];

$nota = CursosC::VerNotasC($columna, $valor);

if($_SESSION["rol"] != "Administrador"){
    echo '<script>
    
    window.location = "http://localhost/universidad/inicio";
    </script>';

    return;

}

foreach($nota as $key => $EN){

    if($EN["id_curso"]==$exp[3] && $EN["carnet"]==$exp[2]){

        echo '<script>
    
    window.location = "http://localhost/universidad/Editar-Nota/'.$exp[3].'/'.$exp[2].'/'.$EN["id"].'";
    </script>';

    return;
    }
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
                    $valor = $exp[3];

                    $materia = CursosC::VerCursos2C($columna, $valor);

                    echo '<h2>Curso: '.$materia["nombre"].'</h2>
                    <input type="hidden" name="id_curso" value="'.$materia["id"].'">';
                    ?>
                     

                    <div class="row">
                        <div class="col-md-6 col-xs-12">
                            <h2>Fecha:</h2>
                            <input type="text" class="input-lg" name="fecha">

                            <h2>Profesor: </h2>
                            <input type="text" class="input-lg" name="profesor">
                        </div>
                        <div class="col-md-6 col-xs-12">
                            <h2>Estado:</h2>
                            
                            <select class="input-lg" name="estado">
                            <option>Seleccionar...</option>
                            <option value="No cursada">No cursada</option>
                            <option value="Aprobado">Aprobado</option>
                            <option value="Regular">Regular</option>
                            <option value="Desaprobado">Desaprobado</option>
                            </select>
                            <h2>Nota Final: </h2>
                            <input type="text" class="input-lg" name="nota_final">
                            <br><br>

                            <button class="btn btn-success btn-lg" type="submit">Guardar nota</button>
                        </div>
                    </div>

                    <?php

                    $notas = new CursosC();
                    $notas -> ColocarNotaC();

                    ?>
                </form>
            </div>
        </div>
    </section>
</div>