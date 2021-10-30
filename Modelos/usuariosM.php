<?php

require_once "ConexionBD.php";

class UsuariosM extends ConexionBD{

    //Iniciar Sesión

    static public function IniciarSesionM($tablaBD, $datosC){

        $pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE carnet = :carnet");

        $pdo->bindParam(":carnet", $datosC["carnet"], PDO::PARAM_STR);

        $pdo -> execute();

        return $pdo -> fetch();

        $pdo -> close();
        $pdo = null;



    }

    //Ver mis datos
    static public function VerMisDatosM($tablaBD, $id){
        $pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE id = :id");

        $pdo->bindParam(":id", $id, PDO::PARAM_INT);

        $pdo -> execute();

        return $pdo -> fetch();

        $pdo -> close();
        $pdo = null;
    }

    //Guardar mis datos
    static public function GuardarDatosM($tablaBD, $datosC){
        $pdo = ConexionBD::cBD()->prepare("UPDATE $tablaBD SET fechanac = :fechanac, direccion = :direccion,
        telefono = :telefono, correo = :correo, diversificado = :diversificado, pais = :pais, clave = :clave where id = :id");

        $pdo->bindParam(":id", $datosC["id"], PDO::PARAM_INT);
        $pdo->bindParam(":fechanac", $datosC["fechanac"], PDO::PARAM_STR);
        $pdo->bindParam(":direccion", $datosC["direccion"], PDO::PARAM_STR);
        $pdo->bindParam(":telefono", $datosC["telefono"], PDO::PARAM_STR);
        $pdo->bindParam(":correo", $datosC["correo"], PDO::PARAM_STR);
        $pdo->bindParam(":diversificado", $datosC["diversificado"], PDO::PARAM_STR);
        $pdo->bindParam(":pais", $datosC["pais"], PDO::PARAM_STR);
        $pdo->bindParam(":clave", $datosC["clave"], PDO::PARAM_STR);

        if($pdo -> execute()){
            return true;
        }

        $pdo -> close();
        $pdo = null;


    }

    //crear usuario
    static public function CrearUsuarioM($tablaBD, $datosC){

        $pdo = ConexionBD::cBD()->prepare("INSERT INTO $tablaBD (carnet, clave, apellido, nombre, id_carrera, rol)
        VALUES (:carnet, :clave, :apellido, :nombre, :id_carrera, :rol)");

        $pdo->bindParam(":carnet", $datosC["carnet"], PDO::PARAM_STR);
        $pdo->bindParam(":clave", $datosC["clave"], PDO::PARAM_STR);
        $pdo->bindParam(":apellido", $datosC["apellido"], PDO::PARAM_STR);
        $pdo->bindParam(":nombre", $datosC["nombre"], PDO::PARAM_STR);
        $pdo->bindParam(":id_carrera", $datosC["id_carrera"], PDO::PARAM_INT);
        $pdo->bindParam(":rol", $datosC["rol"], PDO::PARAM_STR);

        if($pdo->execute()){
            return true;
        }

        $pdo -> close();
        $pdo = null;

    }

    //ver usuarios
    static public function VerUsuariosM($tablaBD, $columna, $valor){
        if($columna!=null){
            $pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE $columna = :$columna");
            $pdo -> bindParam(":".$columna, $valor, PDO::PARAM_STR);
            $pdo -> execute();
            return $pdo -> fetch();
        }else{
            $pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD");
            $pdo -> execute();
            return $pdo -> fetchAll();
        }

        $pdo -> close();
        $pdo = null;
    }

    static public function VerUsuarios2M($tablaBD, $columna, $valor){
        
            $pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE $columna = :$columna");
            $pdo -> bindParam(":".$columna, $valor, PDO::PARAM_STR);
            $pdo -> execute();
            
            return $pdo -> fetchAll();
        

        $pdo -> close();
        $pdo = null;
    }

    //actualizar usuarios
    static public function ActualizarUsuariosM($tablaBD, $datosC){
        $pdo = ConexionBD::cBD()->prepare("UPDATE $tablaBD SET apellido = :apellido, nombre = :nombre, carnet = :carnet, 
        clave = :clave, id_carrera = :id_carrera, rol = :rol WHERE id = :id");

        $pdo->bindParam(":id", $datosC["id"], PDO::PARAM_INT);
        $pdo->bindParam(":apellido", $datosC["apellido"], PDO::PARAM_STR);
        $pdo->bindParam(":nombre", $datosC["nombre"], PDO::PARAM_STR);
        $pdo->bindParam(":carnet", $datosC["carnet"], PDO::PARAM_STR);
        $pdo->bindParam(":clave", $datosC["clave"], PDO::PARAM_STR);
        $pdo->bindParam(":id_carrera", $datosC["id_carrera"], PDO::PARAM_INT);
        $pdo->bindParam(":rol", $datosC["rol"], PDO::PARAM_STR);

        if($pdo->execute()){
            return true;
        }

        $pdo -> close();
        $pdo = null;
    }

    //eliminar usuarios

    static public function EliminarUsuariosM($tablaBD, $id){

        $pdo = ConexionBD::cBD()->prepare("DELETE FROM $tablaBD WHERE id = :id");
        $pdo -> bindParam(":id", $id, PDO::PARAM_INT);
        if($pdo->execute()){
            return true;
        }

        $pdo -> close();
        $pdo = null;


    }

}