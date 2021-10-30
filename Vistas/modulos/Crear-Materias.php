<?php

if($_SESSION["rol"] != "Administrador"){

    echo '<script>
    
    window.locations = "inicio";
    </script>';
}

?>


<div class="content-wrapper">
    <section class="content-header">

        <?php

            $exp = explode("/", $_GET["url"]);
            $columna = "id";
            $valor = $exp[1];

            $carrera = CarrerasC::CarreraC($columna, $valor);

            echo ' <h1>Gestor de cursos de la carrera: '.$carrera["nombre"].'</h1>
            ';

        ?>  
       
    </section>

    <section class="content">
        <div class="box">
            <div class="box-header">
                <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#CrearCurso">Crear curso</button>
            </div>
            <div class="box-body">
                <table class="table table-bordered table-hover table-striped T">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Nombre</th>
                            <th>Año</th>
                            <th>Tipo</th>
                            <th>Programa</th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php

                            $resultado = CursosC::VerCursosC();

                            foreach($resultado as $key => $value){

                                if($value["id_carrera"] == $exp[1]){
                                    echo '<tr>
                                    <td>'.$value["codigo"].'</td>
                                    <td>'.$value["nombre"].'</td>
                                    <td>'.$value["grado"].'</td>
                                    <td>'.$value["tipo"].'</td>';
    
                                    if($value["programa"]!= ""){
                                        echo '<td><a href="'.$value["programa"].'" download="'.$value["nombre"].'
                                        ">Descargar programa</a></td>';
                                    }else{
    
                                        echo'<td>No tiene programa</td>';
                                    }
    
                                    
                                    
                                    echo '<td>
            
                                        <div class="btn-group">
                                            <a href="http://localhost/universidad/Crear-Comisiones/'.$value["id"].'">
                                                <button class="btn btn-default">Horario</button>
                                            </a>
                                            <a href="#">
                                                <button class="btn btn-danger EliminarCurso" Mid="'.$value["id"].'"
                                                Cid="'.$exp[1].'" >Borrar</button>
                                            </a>
                                        </div>
            
            
                                    </td>
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


<?php

   $eliminarM = new CursosC();
   $eliminarM -> EliminarCursoC();

?>


<div class="modal fade" id="CrearCurso">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" enctype="multipart/form-data">
                <div class="modal-body">


                    <div class="form-group">
                        <h2>Codigo: </h2>
                        <input type="text" class="form-control input-lg" name="codigo" required="">
                        
                        <?php

                            echo '
                            <input type="hidden" name="Cid" value="'.$exp[1].'">
                                ';

                        ?>

                     </div>
                    <div class="form-group">
                        <h2>Nombre: </h2>
                        <input type="text" class="form-control input-lg" name="nombre" required="">
                   </div>

                   <div class="form-group">
                        <h2>Año: </h2>
                        <input type="number" class="form-control input-lg" name="grado" required="">
                   </div>
                   <div class="form-group">
                        <h2>Tipo: </h2>
                            <select class="form-control input-lg" name="tipo">
                                <option>Seleccionar</option>

                                <option value="Anual">Anual</option>
                                <option value="1er semestre">1er semestre</option>
                                <option value="2do semestre">2do semestre</option>

                            </select>
                    </div>
                    <div class="form-group">
                        <h2>Programa: </h2>
                        <input type="file" name="programa" >
                   </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Crear curso</button>

                    <button type="submit" class="btn btn-danger">Cancelar</button>
                </div>

                 <?php

                    $crearM = new CursosC();
                    $crearM -> CrearCursoC();

                ?>
            </form>
        </div>
    </div>
</div>
