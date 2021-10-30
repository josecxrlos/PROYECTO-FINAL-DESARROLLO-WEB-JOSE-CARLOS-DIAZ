<?php

if($_SESSION["rol"] != "Administrador"){

    echo '<script>
    
    window.locations = "http://localhost/universidad/inicio";
    </script>';
}

?>

<div class="content-wrapper">
    <section class="content-header">

        <?php

        $exp = explode("/", $_GET["url"]);
        $columna = "id";
        $valor = $exp[1];

        $examen = ExamenesC::VerExamenesC($columna, $valor);

        $columna = "id";
        $valor = $examen["id_curso"];

        $materia = CursosC::VerCursos2C($columna, $valor);

        echo '<h1>Inscritos para el examen de: '.$materia["nombre"].'<br><br>
        Fecha: '.$examen["fecha"].' - Hora: '.$examen["hora"].' - Aula: '.$examen["aula"].'</h1>
        
        <br>';

        echo '<a href="http://localhost/universidad/tcpdf/pdf/Inscriptos-Examen.php/'.$exp[1].'" target="blank">
        <button class="btn btn-primary">Generar PDF</button>
        </a>';

        ?>
        
    
        
        
    </section>

    <section class="content">
        <div class="box">
            <div class="box-body">
                <table class="table table-striped table-hover table-bordered">

                    <thead>
                        <tr>
                            <th>N°</th>
                            <th>Carnet</th>
                            <th>Apellido y nombre</th>
                        </tr>
                    </thead>

                    <tbody>

                    <?php

                    $columna = "id_examen";
                    $valor = $exp[1];

                    $insc = ExamenesC::VerInsExamenC($columna, $valor);

                    foreach ($insc as $key => $value) {
                        echo '<tr>
                        
                        <td>'.($key+1).'</td>
                        <td>'.$value["carnet"].'</td>';

                        $columna = "id";
                        $valor = $value["id_alumno"];

                        $alumnos = UsuariosC::VerUsuarios2C($columna, $valor);

                        foreach ($alumnos as $key => $v) {
                            
                            echo '<td>'.$v["apellido"].' '.$v["nombre"].'</td>
                        
                            </tr>';
                        }
                        


                        
                    }

                    ?>

                    </tbody>

                </table>
            </div>
        </div>
    </section>
</div>