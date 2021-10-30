<?php

if($_SESSION["rol"] != "Administrador"){

    echo '<script>
    
    window.locations = "inicio";
    </script>';
}

?>

<div class="content-wrapper">
    <section class="content-header">
        <h1>Gestor de examenes</h1>
        <br>
 
    </section>

    <section class="content">
        <div class="box">
            <div class="box-body">
                <table class="table table-bordered table-hover table-striped">

                <thead>
                    <tr>
                        <th>Código</th>
                        <th>Nombre</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>

                <?php


                $carrera = CarrerasC::VerCarrerasC();

                foreach ($carrera as $key => $value) {
                    echo '<tr>
                    <td>'.$value["id"].'</td>
                    <td>'.$value["nombre"].'</td>
                    <td>

                        <div class="btn-group">
                            <a href="Ver-Examenes/'.$value["id"].'">
                                <button class="btn btn-success">Ver exámenes</button>
                            </a>
                            <a href="Crear-Examenes/'.$value["id"].'">
                                <button class="btn btn-primary">Crear examen</button>
                            </a>
                        </div>
                    </td>
                </tr>';
                }
                ?>
                    
                </tbody>
                </table>
            </div>
        </div>
    </section>
</div>