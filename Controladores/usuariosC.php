<?php

class UsuariosC{
    //iniciar sesión
    public function IniciarSesion(){

        if(isset($_POST["carnet"])){

            if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["carnet"]) && preg_match('/^[a-zA-Z0-9.]+$/', $_POST["clave"])){

                $tablaBD = "usuarios";

                $datosC = array("carnet"=>$_POST["carnet"], "clave"=>$_POST["clave"]);

                

                $resultado = UsuariosM::IniciarSesionM($tablaBD, $datosC);
                

                if($resultado["carnet"] == $_POST["carnet"] && $resultado["clave"] == $_POST["clave"]){

                    
                    $_SESSION["Ingresar"] = true;
                    $_SESSION["rol"] = $resultado["rol"];
					$_SESSION["carnet"] = $resultado["carnet"];
					$_SESSION["clave"] = $resultado["clave"];
					$_SESSION["nombre"] = $resultado["nombre"];
					$_SESSION["apellido"] = $resultado["apellido"];
					$_SESSION["id_carrera"] = $resultado["id_carrera"];
					$_SESSION["id"] = $resultado["id"];

                    echo '<script>
                    
                    window.location = "http://localhost/universidad/inicio";
                    </script>';
                }else{
                    echo '<br> <div class="alert alert-danger">Error al Ingresar</div>';
                }
            }

        }

    }
    // ver mis datos
    public function VerMisDatosC(){
        $tablaBD = "usuarios";
        $id = $_SESSION["id"];

        $resultado = UsuariosM::VerMisDatosM($tablaBD, $id);

        echo '<form method="post">
        <div class="row">
             <div class="col-md-6 col-xs-12">
                 <h2>Fecha de nacimiento: </h2>
                 <input type="text" class="input-lg" name="fechanac" value="'.$resultado["fechanac"].'">

                 <input type="hidden" name="Uid" value="'.$_SESSION["id"].'">

                 <h2>Direccion: </h2>
                 <input type="text" class="input-lg" name="direccion" value="'.$resultado["direccion"].'">

                 <h2>Telefono: </h2>
                 <input type="text" class="input-lg" name="telefono" value="'.$resultado["telefono"].'">
                 <h2>Contraseña: </h2>
                 <input type="text" class="input-lg" name="clave" value="'.$resultado["clave"].'">
             </div>

             <div class="col-md-6 col-xs-12">
                 <h2>Correo Electrónico: </h2>
                 <input type="email" class="input-lg" name="correo" value="'.$resultado["correo"].'">

                 <h2>Diversificado: </h2>
                 <input type="text" class="input-lg" name="diversificado" value="'.$resultado["diversificado"].'">

                 <h2>País: </h2>
                 <input type="text" class="input-lg" name="pais" value="'.$resultado["pais"].'">
                 
                 <br><br>

                 <button type="submit" class="btn btn-success">Guardar Datos</button>
             </div>
        </div>
    </form>';
    }


    //Actualizar mis datos
    public function GuardarDatosC(){
        if(isset($_POST["Uid"])){

            $tablaBD = "usuarios";

            $datosC = array("id"=>$_POST["Uid"], "fechanac"=>$_POST["fechanac"], "direccion"=>$_POST["direccion"], 
            "telefono"=>$_POST["telefono"], "correo"=>$_POST["correo"], "diversificado"=>$_POST["diversificado"],
            "pais"=>$_POST["pais"], "clave"=>$_POST["clave"]);

            $resultado = UsuariosM::GuardarDatosM($tablaBD, $datosC);

            if($resultado==true){
                echo '<script>
                    
                    window.location = "http://localhost/universidad/mis-datos";
                    </script>';
            }
        }
    }

    //Crear Usuario

    public function CrearUsuarioC(){

        if(isset($_POST["apellidoU"])){

            $tablaBD = "usuarios";
            $datosC = array("apellido"=>$_POST["apellidoU"], "nombre"=>$_POST["nombreU"], "carnet"=>$_POST["usuarioU"], 
            "clave"=>$_POST["claveU"], "id_carrera"=>$_POST["carreraU"], "rol"=>$_POST["rolU"]);

            $resultado = UsuariosM::CrearUsuarioM($tablaBD, $datosC);

            if($resultado==true){
                echo '<script>
                    
                    window.location = "http://localhost/universidad/usuarios";
                    </script>';
            }
        }
    }

    //ver usuarios
     static public function VerUsuariosC($columna, $valor){
         $tablaBD = "usuarios";
         $resultado = UsuariosM::VerUsuariosM($tablaBD, $columna, $valor);
         return $resultado;
     }

     static public function VerUsuarios2C($columna, $valor){
        $tablaBD = "usuarios";
        $resultado = UsuariosM::VerUsuarios2M($tablaBD, $columna, $valor);
        return $resultado;
    }


     //actualizar usuarios
     public function ActualizarUsuariosC(){

        if(isset($_POST["Uid"])){
            $tablaBD = "usuarios";

            $datosC = array("id"=>$_POST["Uid"], "apellido"=>$_POST["apellidoEU"],
            "nombre"=>$_POST["nombreEU"], "carnet"=>$_POST["usuarioEU"], "clave"=>$_POST["claveEU"],
            "id_carrera"=>$_POST["carreraEU"], "rol"=>$_POST["rolEU"]);

            $resultado = UsuariosM::ActualizarUsuariosM($tablaBD, $datosC);

            if($resultado==true){
                echo '<script>
                    
                    window.location = "http://localhost/universidad/usuarios";
                    </script>';
            }
        }
     }

     //eliminar usuarios
     public function EliminarUsuariosC(){

        if(isset($_GET["Uid"])){

            $tablaBD = "usuarios";

            $id = $_GET["Uid"];

            $resultado = UsuariosM::EliminarUsuariosM($tablaBD, $id);
            if($resultado==true){
                echo '<script>
                    
                    window.location = "http://localhost/universidad/usuarios";
                    </script>';
            }
        }
     }


}