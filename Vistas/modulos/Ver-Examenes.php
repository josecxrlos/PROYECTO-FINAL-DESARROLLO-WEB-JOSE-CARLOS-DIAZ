<div class="content-wrapper">
    <section class="content-header">
        <?php

        $exp = explode("/", $_GET["url"]);

        $columna = "id";
        $valor = $exp[1];

        $carrera = CarrerasC::VerCarreras2C($columna, $valor);

        echo '<h1>Examenes de la carrera: '.$carrera["nombre"].'</h1>';


        ?>
    </section>

    <section class="content">
        <div class="box">
            <div class="box-body">
                <?php

                $columna = "id";
                $valor = 1;

                $ajustes = AjustesC::VerAjustesC($columna, $valor);

                if($ajustes["h_examenes"]!=0){

                    echo '
                    <table class="table table-bordered table-hover table-striped">

                    <thead>
                    
                        <tr>
                        
                            <th>Curso</th>
                            <th>Fecha</th>';

                            if($_SESSION["rol"]=="Administrador"){

                                echo '<th>Profesor</th>
                                <th>Hora</th>
                                <th>Aula</th>';
                            }

                           echo '<th></th>
                        
                        </tr>
                    
                    </thead>

                    <tbody>';

                    $columna = null;
                    $valor = null;

                    $resultado = ExamenesC::VerExamenesC($columna, $valor);
                    
                    foreach ($resultado as $key => $value) {
                       if($value["id_carrera"]==$exp[1]){
                            if($_SESSION["rol"]=="Estudiante" && $value["estado"]==1){
                                echo ' <tr>';

                                $columna = "id";
                                $valor = $value["id_curso"];

                                $materia = CursosC::VerCursos2C($columna, $valor);

                                if($value["id_curso"]==$materia["id"]){
                                    echo '<td>'.$materia["nombre"].'</td>';
                                }

                                echo '<td>'.$value["fecha"].'</td>';

                                
                                echo '<td>
                                
                                <div class="btn-group">';

                                if($_SESSION["rol"]=="Estudiante"){

                                    echo '<a href="http://localhost/universidad/insc-examen/'.$_SESSION["id_carrera"].'/'.$value["id"].'">
                                    
                                    <button class="btn btn-primary">Ver detalles</button>
                                    
                                    </a>';
                                }
         

                               echo '</div>
                               </td></tr>';

                            }else if($_SESSION["rol"]=="Administrador"){

                                echo ' <tr>';

                                $columna = "id";
                                $valor = $value["id_curso"];

                                $materia = CursosC::VerCursos2C($columna, $valor);

                                if($value["id_curso"]==$materia["id"]){
                                    echo '<td>'.$materia["nombre"].'</td>';
                                }

                                echo '<td>'.$value["fecha"].'</td>';

                                if($_SESSION["rol"]=="Administrador"){

                                    echo '<td>'.$value["profesor"].'</td>
                                    <td>'.$value["hora"].'</td>
                                    <td>'.$value["aula"].'</td>';
                                }

                                echo '<td>
                                
                                <div class="btn-group">';


                                if($_SESSION["rol"]=="Administrador"){

                                    echo '<a href="http://localhost/universidad/Inscriptos-examen/'.$value["id"].'">
                                    
                                    <button class="btn btn-primary">Ver inscritos</button>
                                    
                                    </a>';

                                        if($value["estado"]==1){

                                            echo '<a href="http://localhost/universidad/">
                                        
                                            <button class="btn btn-warning">Deshabilitar</button>
                                        
                                            </a>';
                                        }else{

                                            echo '<a href="http://localhost/universidad/">
                                        
                                            <button class="btn btn-success">Habilitar</button>
                                        
                                            </a>';
                                        }
                                    
                                    
                                    echo '<a href="http://localhost/universidad/">
                                    
                                    <button class="btn btn-danger">Borrar</button>
                                    
                                    </a>';
                                }

                               echo '</div>
                               </td></tr>';
                            }

                       }
                    }
                           

                                
                            
                            
                    
                    echo '</tbody>
                    
                    
                    
                    </table>';

                }else{
                    echo '<div class="alert alert-warning">Aún no están habilitadas las fechas de inscripciones</div>';
                }

                ?>
            </div>
        </div>
    </section>
</div>