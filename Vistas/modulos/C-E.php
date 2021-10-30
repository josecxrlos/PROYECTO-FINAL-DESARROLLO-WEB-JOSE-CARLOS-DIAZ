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
                <form method="POST">
                    <?php

                        $exp = explode("/", $_GET["url"]);
                        $columna = "id";
                        $valor = $exp[2];

                        $materia = CursosC::VerCursos2C($columna, $valor);

                        echo '<h2>Crear una fecha de examen para: <br><br>'.$materia["nombre"].'</h2>
                        
                        <input type="hidden" name="id_curso" value="'.$exp[2].'">
                        <input type="hidden" name="estado" value="1">
                        <input type="hidden" name="id_carrera" value="'.$exp[1].'">';
                    ?>

                    <div class="row">
                        <div class="col-md-6 col-xs-12">
                            <h2>Fecha:</h2>
                            <input type="text" class="input-lg" name="fecha">

                            <h2>Hora:</h2>
                            <input type="text" class="input-lg" name="hora">
                        </div>

                        <div class="col-md-6 col-xs-12">
                            <h2>Profesor:</h2>
                            <input type="text" class="input-lg" name="profesor">

                            <h2>Aula:</h2>
                            <input type="text" class="input-lg" name="aula">
                            <br><br>

                            <button type="submit" class="btn btn-primary btn-lg">Crear mesa</button>
                        </div>
                    </div>

                    <?php

                    $crearE = new ExamenesC();

                    $crearE -> CrearExamenC();
                    ?>
                </form>
            </div>
        </div>
    </section>
</div>