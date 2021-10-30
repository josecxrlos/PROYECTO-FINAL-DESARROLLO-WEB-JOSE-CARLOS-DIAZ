<?php

$exp = explode("/", $_GET["url"]);

if($_SESSION["id_carrera"]!=$exp[1]){

    echo '<script>
    
    window.location = "http://localhost/universidad/inicio";

    </script>';

    return;
}

$columna = "id_curso";
$valor = $exp[2];

$ins = CursosC::VerInscMateriasC($columna, $valor);

foreach ($ins as $key => $m){
    if($m["id_curso"] == $exp[2] && $m["id_alumno"] == $_SESSION["id"]){

        echo '<script>
    
    window.location = "http://localhost/universidad/inscripto-M/'.$exp[1].'/'.$exp[2].'";

    </script>';

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
                    $columna = "id";

                    $valor = $exp[2];

                    $curso = CursosC::VerCursos2C($columna, $valor);

                    echo '<h2>Inscribirse a curso: <br><br>'.$curso["nombre"].'</h2>

                    <input type="hidden" name="id_alumno" value="'.$_SESSION["id"].'">
                    <input type="hidden" name="id_curso" value="'.$curso["id"].'">
                    
                    <div class="row">
                        <div class="col-md-6 col-xs-12">
                            <h2>Código: '.$curso["codigo"].'</h2>
                            <h2>Año: '.$curso["grado"].'</h2>
                        </div>
                        <div class="col-md-6 col-xs-12">
                            <h2>Tipo: '.$curso["tipo"].'</h2>
                            <p>*Solo se podrá inscribir a un horario por única vez</p>';

                            $columna = "id_curso";
                            $valor = $exp[2];

                            $comisiones = CursosC::VerComisionesC($columna, $valor);

                            foreach ($comisiones as $key => $value) {

                                $columna = "id_comision";
                                $valor = $value["id"];
                                
                                $insc = CursosC::VerInscMateriasC($columna, $valor);

                                if(count($insc) < $value["c_maxima"]){

                                    $lugares = ($value["c_maxima"] - count($insc));

                                    echo '<input type="radio" name="id_comision" value="'.$value["id"].'" required>'.$value["dias"].': '.$value["horario"].' - Alumnos: '.$lugares.' <br>';
                                }

                                
                            }

                            

                            ?>
                            
                            <br><br>

                            <button class="btn btn-primary" type="submit">Inscribirse</button>

                            <?php

                                $inscribir = new CursosC();
                                $inscribir -> InscribirCursoC();
                            ?>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>