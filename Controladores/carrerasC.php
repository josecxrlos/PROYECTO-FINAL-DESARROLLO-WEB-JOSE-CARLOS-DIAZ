<?php

class CarrerasC{
    //Crear carrera
    public function CrearCarreraC(){
        if(isset($_POST["carrera"])){
            $tablaBD = "carreras";

            $carrera = $_POST["carrera"];

            $resultado = CarrerasM::CrearCarreraM($tablaBD, $carrera);

            if($resultado==true){
                echo '<script>
                window.location = "http://localhost/universidad/Carreras";
                </script>';
            }
        }
    }

    //ver carreras

    static public function VerCarrerasC(){
        $tablaBD = "carreras";

        $resultado = CarrerasM::VerCarrerasM($tablaBD);

        return $resultado;
    }

    static public function VerCarreras2C($columna, $valor){
        $tablaBD = "carreras";

        $resultado = CarrerasM::VerCarreras2M($tablaBD, $columna, $valor);

        return $resultado;
    }

    static public function CarreraC($columna, $valor){
        $tablaBD = "carreras";

        $resultado = CarrerasM::CarreraM($tablaBD, $columna, $valor);

        return $resultado;
    }


    //editar carrera
    public function EditarCarreraC(){
        $tablaBD = "carreras";

        $exp = explode("/", $_GET["url"]);

        $id = $exp[1];

        $resultado = CarrerasM::EditarCarreraM($tablaBD, $id);
           
            echo '<div class="col-md-6 col-xs-12">
            <h2>Nombre de la carrera</h2>
            <input type="text" name="carrera" class="form-control input-lg" value="'.$resultado['nombre'].'" required>
            <input type="hidden" name="Cid" value="'.$resultado['id'].'">
            <br>
            <button class="btn btn-success" type="submit">Guardar cambios</button>
            </div>'; 
        
       
    }

    //actualizar carrera
    public function ActualizarCarrerasC(){
        if(isset($_POST["carrera"])){
            $tablaBD = "carreras";

            $datosC = array("id"=>$_POST["Cid"], "carrera"=>$_POST["carrera"]);
            $resultado = CarrerasM::ActualizarCarrerasM($tablaBD, $datosC);

            if($resultado == true){
                echo '<script>
                window.location = "http://localhost/universidad/Carreras";
                </script>';
            }
        }
    }
    //borrar carreras
    public function BorrarCarrerasC(){
        $exp = explode("/", $_GET["url"]);

        $id = $exp[1];

        if(isset($id)){

            $tablaBD = "carreras";

            $resultado = CarrerasM::BorrarCarrerasM($tablaBD, $id);
            
            if($resultado == true){
                echo '<script>
                window.location = "http://localhost/universidad/Carreras";
                </script>';
            }
        }
    }


}