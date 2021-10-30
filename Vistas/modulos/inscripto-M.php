<?php

$exp = explode("/", $_GET["url"]);

if($_SESSION["id_carrera"]!=$exp[1]){

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


                

                <?php

                    $exp = explode("/", $_GET["url"]);
                    $columna = "id";

                    $valor = $exp[2];

                    $curso = CursosC::VerCursos2C($columna, $valor);

                    echo '<h2>Curso: <br><br>'.$curso["nombre"].'</h2>

                     
                    <div class="row">
                        <div class="col-md-6 col-xs-12">
                            <h2>Código: '.$curso["codigo"].'</h2>
                            <h2>Año: '.$curso["grado"].'</h2>
                        </div>
                        <div class="col-md-6 col-xs-12">
                            <h2>Tipo: '.$curso["tipo"].'</h2>';

                            $columna = "id_curso";
                            $valor = $exp[2];

                            $insC = CursosC::VerInscMateriasC($columna, $valor);

                            foreach ($insC as $key => $C) {
                                if($C["id_alumno"]==$_SESSION["id"]){
                                    
                                    $columna = "id";
                                    $valor = $C["id_comision"];

                                    $comision = CursosC::VerComisiones2C($columna, $valor);

                                    echo '<h2>Su horario: </h2><h3>'.$comision["dias"].' - '.$comision["horario"].'</h3>';

                                }

                                echo ' <br>

                                <div class="alert alert-success">Usted ya está inscrito a este curso</div>
    
                                <a href="http://localhost/universidad/inscripto-M/'.$exp[1].'/'.$exp[2].'/'.$C["id"].'">
                                <button class="btn btn-danger" >Dar de baja</button>
    
                                </a>';
                            } 

                            
                           

                            ?>
                            
                           
                            
                            
                        </div>
                    </div>
              
            </div>
        </div>
    </section>
</div>

<?php

$borrarI = new CursosC();
$borrarI -> BorrarInscMC();

?>