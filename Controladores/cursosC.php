<?php

class CursosC{

    public function CrearCursoC(){
        if(isset($_POST["Cid"])){
            $rutaPrograma = "";

            if($_FILES["programa"]["type"] == "application/pdf"){
                $nombre = mt_rand(10,999);
                $rutaPrograma = "Vistas/programas/Prog-".$nombre.".pdf";
                move_uploaded_file($_FILES["programa"]["tmp_name"], $rutaPrograma);
            }

                $tablaBD = "cursos";

                $Cid = $_POST["Cid"];

                $datosC = array("id_carrera"=>$_POST["Cid"], "codigo"=>$_POST["codigo"], "nombre"=>$_POST["nombre"],
                "grado"=>$_POST["grado"], "tipo"=>$_POST["tipo"], "programa"=>$rutaPrograma);

                $resultado = CursosM::CrearCursoM($tablaBD, $datosC);

                if($resultado==true){
                    echo '<script>
                window.location = "http://localhost/universidad/Crear-Materias/'.$Cid.'";
                </script>';
                } 
        }
    }


    //ver cursos
    static public function VerCursosC(){
        $tablaBD = "cursos";

        $resultado = CursosM::VerCursosM($tablaBD);
        return $resultado;
    }

    static public function VerCursos2C($columna, $valor){
        $tablaBD = "cursos";

        $resultado = CursosM::VerCursos2M($tablaBD, $columna, $valor);

        return $resultado;
    }

    //borrar cursos
    public function EliminarCursoC(){
        if(isset($_GET["Mid"])){
            $tablaBD = "cursos";
            $id = $_GET["Mid"];

            $Cid = $_GET["Cid"];

            $resultado = CursosM::EliminarCursoM($tablaBD, $id);

            if($resultado==true){
                echo '<script>
            window.location = "http://localhost/universidad/Crear-Materias/'.$Cid.'";
            </script>';
            }

        }

        
    }

    //crear comisiones
    public function CrearComisionC(){
            
        if(isset($_POST["id_curso"])){
            $tablaBD = "comisiones";

            $datosC = array("id_curso"=>$_POST["id_curso"], "numero"=>$_POST["numero"], "c_maxima"=>$_POST["c_maxima"], "dias"=>$_POST["dias"], "horario"=>$_POST["horario"]);

            $id_curso = $_POST["id_curso"];
            
            $resultado = CursosM::CrearComisionM($tablaBD, $datosC);

            if($resultado==true){
                echo '<script>
            window.location = "http://localhost/universidad/Crear-Comisiones/'.$id_curso.'";
            </script>';
            }

        }
    }

    //ver comisiones
    static public function VerComisionesC($columna, $valor){
        $tablaBD = "comisiones";
        $resultado = CursosM::VerComisionesM($tablaBD, $columna, $valor);
        return $resultado;
    }

    static public function VerComisiones2C($columna, $valor){
        $tablaBD = "comisiones";
        $resultado = CursosM::VerComisiones2M($tablaBD, $columna, $valor);
        return $resultado;
    }

    //borrar comisiones
    public function BorrarComisionC(){
        if(isset($_GET["Mid"])){
            $tablaBD = "comisiones";

            $id = $_GET["Cid"];
            $Mid = $_GET["Mid"];

            $resultado = CursosM::BorrarComisionM($tablaBD, $id);
            
            if($resultado==true){
                echo '<script>
            window.location = "http://localhost/universidad/Crear-Comisiones/'.$Mid.'";
            </script>';
            }

        }
    }

    public function ColocarNotaC(){
        if(isset($_POST["id_alumno"])){
            $carnet = $_POST["carnet"];
            $id_carrera = $_POST["id_carrera"];

            $tablaBD = "notas";

            $datosC = array("id_alumno"=>$_POST["id_alumno"], "carnet"=>$_POST["carnet"], "id_curso"=>$_POST["id_curso"], 
            "fecha"=>$_POST["fecha"], 
            "profesor"=>$_POST["profesor"], "nota_final"=>$_POST["nota_final"], "estado"=>$_POST["estado"]);

            $resultado = CursosM::ColocarNotaM($tablaBD, $datosC);

            if($resultado==true){
                echo '<script>
            window.location = "http://localhost/universidad/Ver-Plan/'.$id_carrera.'/'.$carnet.'";
            </script>';
            }
        }
    }

    static public function VerNotasC($columna, $valor){
        $tablaBD = "notas";

        $resultado = CursosM::VerNotasM($tablaBD, $columna, $valor);

        return $resultado;
    }

    static public function VerNotas2C($columna, $valor){
        $tablaBD = "notas";

        $resultado = CursosM::VerNotas2M($tablaBD, $columna, $valor);

        return $resultado;
    }

    public function CambiarNotaC(){

        if(isset($_POST["id_alumno"])){

            $tablaBD = "notas";
            $carnet = $_POST["carnet"];
            $id_carrera = $_POST["id_carrera"];

            $datosC = array("id"=>$_POST["nota_id"], "fecha"=>$_POST["fecha"], "profesor"=>$_POST["profesor"], "estado"=>$_POST["estado"], "nota_final"=>$_POST["nota_final"]);

            $resultado = CursosM::CambiarNotaM($tablaBD, $datosC);


            if($resultado==true){
                echo '<script>
            window.location = "http://localhost/universidad/Ver-Plan/'.$id_carrera.'/'.$carnet.'";
            </script>';
            }
        }
    }

    public function InscribirCursoC(){

        if(isset($_POST["id_alumno"])){
            $tablaBD = "insc_materias";

            $datosC = array("id_alumno"=>$_POST["id_alumno"], "id_curso"=>$_POST["id_curso"], "id_comision"=>$_POST["id_comision"]);
            
            $resultado = CursosM::InscribirCursoM($tablaBD, $datosC);

            if($resultado==true){
                echo '<script>
            window.location = "http://localhost/universidad/Cursos";
            </script>';
            }


        }
    }

    static public function VerInscMateriasC($columna, $valor){
        $tablaBD = "insc_materias";
        $resultado = CursosM::VerInscMateriasM($tablaBD, $columna, $valor);

        return $resultado;
    }

    static public function VerInscMaterias2C($columna, $valor){
        $tablaBD = "insc_materias";
        $resultado = CursosM::VerInscMaterias2M($tablaBD, $columna, $valor);

        return $resultado;
    }

    public function BorrarInscMC(){
        $exp = explode("/", $_GET["url"]);

        $id = $exp[3];

        if(isset($id)){
            $tablaBD = "insc_materias";
            $resultado = CursosM::BorrarInscM($tablaBD, $id);

            if($resultado==true){
                echo '<script>
            window.location = "http://localhost/universidad/Cursos";
            </script>';
            }
            
        }
    }

    public function VaciarRegistrosMateriasC(){
        if(isset($_POST["E"])){
            $tablaBD = "insc_materias";
            $resultado = CursosM::VaciarRegistrosMateriasM($tablaBD);

            if($resultado==true){
                echo '<script>
            window.location = "http://localhost/universidad/Carreras";
            </script>';
            }


        }
    }
}