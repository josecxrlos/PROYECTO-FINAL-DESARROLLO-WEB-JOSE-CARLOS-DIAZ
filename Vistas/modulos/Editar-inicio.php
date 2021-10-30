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
                <div class="row">
                    <div class="col-md-6 col-xs-12">



                        <?php
                            $columna = "id";
                            $valor = 1;

                            $resultado = AjustesC::VerAjustesC($columna, $valor);

                            echo' <h2>Semestre Actual: '.$resultado["semestre"].'</h2>
                            <form method="POST">
                                <button type="submit" class="btn btn-primary">1er Semestre</button>
                                <input type="hidden" name="semestreA" value="1er Semestre">';

                                    $semestre = new AjustesC();
                                    $semestre -> CambiarSemestreC();
                                echo'</form>
                            <br>
                            <form method="POST">
                                <button type="submit" class="btn btn-success">2do Semestre</button>
                                <input type="hidden" name="semestreA" value="2do Semestre">';

                                $semestre = new AjustesC();
                                $semestre -> CambiarSemestreC();
                            echo '</form>
                            <br>
                            <form method="POST">
                                <h2>1er semestre</h2>
                                <h3>Inicio: <input type="text" class="input-lg" name="1_fecha_inicio" value="'.$resultado["1_fecha_inicio"].'"></h3>
                                <h3>Fin: <input type="text" class="input-lg" name="1_fecha_fin" value="'.$resultado["1_fecha_fin"].'"></h3>
                                <br>
                                <h2>2do semestre</h2>
                                <h3>Inicio: <input type="text" class="input-lg" name="2_fecha_inicio" value="'.$resultado["2_fecha_inicio"].'"></h3>
                                <h3>Fin: <input type="text" class="input-lg" name="2_fecha_fin" value="'.$resultado["2_fecha_fin"].'"></h3>
    
                                    
            
                            </div>
            
                                <div class="col-md-6 col-xs-12">
                                    <br>
                                    <h2>Fechas de examenes próximos: </h2>
                                    <h3>Desde: <input type="text" class="input-lg" name="examenes_i" value="'.$resultado["examenes_i"].'"></"></h3>
                                    <h3>Hasta: <input type="text" class="input-lg" name="examenes_f" value="'.$resultado["examenes_f"].'"></"></h3>
                                    <br>
                                    <h2>Fechas para inscripción a cursos: </h2>
                                    <h3>Desde: <input type="text" class="input-lg" name="cursos_i" value="'.$resultado["cursos_i"].'"></"></h3>
                                    <h3>Hasta: <input type="text" class="input-lg" name="cursos_f" value="'.$resultado["cursos_f"].'"></"></h3>
            
                            </div>

                       
                    <br>
                    <button type="submit" class="btn btn-success btn-lg">Guardar cambios</button>';
            
                        $guardarAjustes = new AjustesC();
                        $guardarAjustes -> ActualizarAjustesC();
                    ?>
                
                </form>
                </div>
            </div>
        </div>
    </section>
</div>