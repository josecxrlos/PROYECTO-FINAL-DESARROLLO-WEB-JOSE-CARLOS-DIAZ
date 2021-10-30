<?php

class CertificadosC{
    public function PedirCertificadosC(){
        if(isset($_POST["id_alumno"])){
            $tablaBD = "certificados";
            $datosC = array("id_alumno"=>$_POST["id_alumno"], "tipo"=>$_POST["tipo"], "estado"=>$_POST["estado"]);

            $resultado = CertificadosM::PedirCertificadosM($tablaBD, $datosC);

            if($resultado==true){

                echo '<script>
                
                window.location = "Constancia-Alumno";
                
                </script>';
            }
        }
     }

     public function PedirCertificados2C(){
        if(isset($_POST["id_alumno"])){
            $tablaBD = "certificados";
            $datosC = array("id_alumno"=>$_POST["id_alumno"], "tipo"=>$_POST["tipo"], "estado"=>$_POST["estado"]);

            $resultado = CertificadosM::PedirCertificadosM($tablaBD, $datosC);

            if($resultado==true){

                echo '<script>
                
                window.location = "Constancia-Cursos";
                
                </script>';
            }
        }
     }

    static public function VerCertificadosC($columna, $valor){
         $tablaBD = "certificados";
         $resultado = CertificadosM::VerCertificadosM($tablaBD, $columna, $valor);

         return $resultado;
     }

     public function CambiarEC(){

        if(isset($_POST["Eid"])){
            $tablaBD = "certificados";

            $datosC = array("id"=>$_POST["Eid"], "estado"=>$_POST["estado"]);

            $resultado = CertificadosM::CambiarEM($tablaBD, $datosC);

            if($resultado==true){

                echo '<script>
                
                window.location = "Certificados";
                
                </script>';
            }
        }

     }
}