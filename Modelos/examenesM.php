<?php
require_once "ConexionBD.php";

class ExamenesM extends ConexionBD{

    static public function CrearExamenM($tablaBD, $datosC){

        $pdo = ConexionBD::cBD()->prepare("INSERT INTO $tablaBD (id_carrera, id_curso, estado, aula, profesor, hora, fecha)
        VALUES (:id_carrera, :id_curso, :estado, :aula, :profesor, :hora, :fecha)");

        $pdo -> bindParam(":id_carrera", $datosC["id_carrera"], PDO::PARAM_INT);
        $pdo -> bindParam(":id_curso", $datosC["id_curso"], PDO::PARAM_INT);
        $pdo -> bindParam(":estado", $datosC["estado"], PDO::PARAM_INT);
        $pdo -> bindParam(":profesor", $datosC["profesor"], PDO::PARAM_STR);
        $pdo -> bindParam(":aula", $datosC["aula"], PDO::PARAM_STR);
        $pdo -> bindParam(":hora", $datosC["hora"], PDO::PARAM_STR);
        $pdo -> bindParam(":fecha", $datosC["fecha"], PDO::PARAM_STR);

        if($pdo->execute()){
            return true;
        }

        $pdo -> close();
        $pdo =null;
    }

    static public function VerExamenesM($tablaBD, $columna, $valor){

        if($columna==null){
            $pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD");
            $pdo -> execute();

            return $pdo -> fetchAll();

        }else{

            $pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE $columna = :$columna");

            $pdo -> bindParam(":".$columna, $valor, PDO::PARAM_STR);

            $pdo -> execute();

            return $pdo -> fetch();

            $pdo -> close();
            $pdo =null;


        }
    }

    static public function InscribirseExamenM($tablaBD, $datosC){
        $pdo = ConexionBD::cBD()->prepare("INSERT INTO $tablaBD (id_alumno, id_examen, carnet) VALUE (:id_alumno, :id_examen, :carnet)");

        $pdo -> bindParam(":id_alumno", $datosC["id_alumno"], PDO::PARAM_INT);
        $pdo -> bindParam(":id_examen", $datosC["id_examen"], PDO::PARAM_INT);
        $pdo -> bindParam(":carnet", $datosC["carnet"], PDO::PARAM_STR);

        if($pdo->execute()){
            return true;
        }

        $pdo -> close();
        $pdo =null;
    }

    static public function VerInsExamenM($tablaBD, $columna, $valor){

        $pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE $columna = :$columna");
        $pdo -> bindParam(":".$columna, $valor, PDO::PARAM_STR);

        $pdo -> execute();

        return $pdo -> fetchAll();

        $pdo -> close();
        $pdo =null;
    }
}