<?php
require_once "ConexionBD.php";

class CertificadosM extends ConexionBD{

    static public function PedirCertificadosM($tablaBD, $datosC){
        $pdo =ConexionBD::cBD()->prepare("INSERT INTO $tablaBD (id_alumno, estado, tipo) values (:id_alumno, :estado, :tipo)");
        $pdo -> bindParam(":id_alumno", $datosC["id_alumno"], PDO::PARAM_INT);
        $pdo -> bindParam(":estado", $datosC["estado"], PDO::PARAM_STR);
        $pdo -> bindParam(":tipo", $datosC["tipo"], PDO::PARAM_STR);

        if($pdo -> execute()){
            return true;

        }

        $pdo -> close();
        $pdo = null;

    }

    static public function VerCertificadosM($tablaBD, $columna, $valor){

        if($columna==null){
            $pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD");
            $pdo -> execute();
            return $pdo -> fetchAll();

        }else{
            $pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE $columna = :$columna");
            $pdo -> bindParam(":".$columna, $valor, PDO::PARAM_STR);
            $pdo -> execute();
            return $pdo -> fetchAll();
        }

        
        $pdo -> close();
        $pdo = null;

    }

    static public function CambiarEM($tablaBD, $datosC){
        $pdo = ConexionBD::cBD()->prepare("UPDATE $tablaBD SET estado = :estado WHERE id = :id");

        $pdo -> bindParam(":id", $datosC["id"], PDO::PARAM_INT);
        $pdo -> bindParam(":estado", $datosC["estado"], PDO::PARAM_STR);

        if($pdo -> execute()){
            return true;

        }

        $pdo -> close();
        $pdo = null;
    }

}