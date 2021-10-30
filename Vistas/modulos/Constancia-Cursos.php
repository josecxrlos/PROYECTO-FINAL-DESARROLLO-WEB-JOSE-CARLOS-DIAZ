<?php

if($_SESSION["rol"] != "Estudiante"){

    echo '<script>
    
    window.location = "inicio";
    </script>';
}

?>

<div class="content-wrapper">
    <section class="content">
        <div class="box">
            <div class="box-body">

            <h2>Constancia de Alumno</h2>
            <form method="POST">
                <?php

                echo'<h3>Alumno: '.$_SESSION["apellido"].', '.$_SESSION["nombre"].'</h3>';

                $columna = "id";
                $valor = $_SESSION["id_carrera"];

                $carrera = CarrerasC::VerCarreras2C($columna, $valor);

                echo '<h3>Carrera: '.$carrera["nombre"].'</h3>
                
                <h3>Carnet: '.$_SESSION["carnet"].'</h3>
                
                <input type="hidden" name="id_alumno" value="'.$_SESSION["id"].'">
                <input type="hidden" name="tipo" value="cursos">
                <input type="hidden" name="estado" value="No impreso">';
                
                $columna = "id_alumno";
                $valor = $_SESSION["id"];

                $cert = CertificadosC::VerCertificadosC($columna, $valor);

                foreach ($cert as $key => $value) {
                    if($_SESSION["id"]==$value["id_alumno"] && $value["tipo"] == "cursos"){
                        echo '<div class="alert alert-success">Ya ha solicitado el certificado de cursos</div>';
                    }
                }
                
                
                echo '
                
                <button class="btn btn-primary btn-lg" type="submit">Solicitar certificado</button>

                ';

                $certificado = new CertificadosC();

                $certificado -> PedirCertificados2C();

                ?>

                
            </form>
            </div>
        </div>
    </section>
</div>