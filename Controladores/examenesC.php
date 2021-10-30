<?php

class ExamenesC{

    public function CrearExamenC(){

        if(isset($_POST["estado"])){

            $tablaBD = "examenes";

            $id_carrera = $_POST["id_carrera"];

            $datosC = array("estado"=>$_POST["estado"], "id_carrera"=>$_POST["id_carrera"], "id_curso"=>$_POST["id_curso"], "profesor"=>$_POST["profesor"], "aula"=>$_POST["aula"],
            "fecha"=>$_POST["fecha"], "hora"=>$_POST["hora"]);

            $resultado = ExamenesM::CrearExamenM($tablaBD, $datosC);

            if($resultado==true){
                echo '<script>
                
                window.location = "http://localhost/universidad/Crear-Examenes/'.$id_carrera.'";
                </script>';
            }
        }
    }

    static public function VerExamenesC($columna, $valor){

        $tablaBD = "examenes";
        $resultado = ExamenesM::VerExamenesM($tablaBD, $columna, $valor);
        return $resultado;
    }

    public function InscribirseExamenC(){

        if(isset($_POST["id_alumno"])){

            $tablaBD = "insc_examenes";

            $datosC = array("id_alumno"=>$_POST["id_alumno"], "id_examen"=>$_POST["id_examen"], "carnet"=>$_POST["carnet"]);

            $id_carrera = $_POST["id_carrera"];

            $resultado = ExamenesM::InscribirseExamenM($tablaBD, $datosC);

            if($resultado==true){

                echo '<script>
                
                window.location = "http://localhost/universidad/Ver-Examenes/'.$id_carrera.'";
                </script>';
            }
        }
    }

    static public function VerInsExamenC($columna, $valor){

        $tablaBD = "insc_examenes";
        $resultado = ExamenesM::VerInsExamenM($tablaBD, $columna, $valor);
        return $resultado;
    }
}