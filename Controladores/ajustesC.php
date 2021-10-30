<?php

class AjustesC{


    static public function VerAjustesC($columna, $valor){
        $tablaBD = "ajustes";

        $resultado = AjustesM::VerAjustesM($tablaBD, $columna, $valor);

        return $resultado;


    }

    public function CambiarSemestreC(){
        if(isset($_POST["semestreA"])){
            $tablaBD = "ajustes";

            $semestre = $_POST["semestreA"];

            $resultado = AjustesM::CambiarSemestreM($tablaBD, $semestre);
            
            if($resultado==true){
                echo '<script>
                window.location = "http://localhost/universidad/Editar-inicio";
                </script>';
            }
        }
    }

    public function ActualizarAjustesC(){
        if(isset($_POST["1_fecha_inicio"])){
            $tablaBD = "ajustes";

            $datosC = array("1_fecha_inicio"=>$_POST["1_fecha_inicio"], "1_fecha_fin"=>$_POST["1_fecha_fin"], "2_fecha_inicio"=>$_POST["2_fecha_inicio"], "2_fecha_fin"=>$_POST["2_fecha_fin"]
            , "examenes_i"=>$_POST["examenes_i"], "examenes_f"=>$_POST["examenes_f"], "cursos_i"=>$_POST["cursos_i"], "cursos_f"=>$_POST["cursos_f"]);

            $resultado = AjustesM::ActualizarAjustesM($tablaBD, $datosC);
            
            if($resultado==true){
                echo '<script>
                window.location = "http://localhost/universidad/Editar-inicio";
                </script>';
            }
        }
    }

    public function HMC(){

        if(isset($_POST["h_cursos"])){

            $tablaBD = "ajustes";

            $datosC = array("id"=>1, "h_cursos"=>$_POST["h_cursos"]);

            $resultado = AjustesM::HMM($datosC, $tablaBD);

            if($resultado==true){
                echo '<script>
                window.location = "http://localhost/universidad/Carreras";
                </script>';
            }
        }
    }

    
}