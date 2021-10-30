<?php

require_once "../Controladores/usuariosC.php";
require_once "../Modelos/usuariosM.php";

class UsuariosA{

    public $Uid;

    public function EditarUsuariosA(){

        $columna = "id";
        $valor = $this->Uid;

        $resultado = UsuariosC::VerUsuariosC($columna, $valor);

        echo json_encode($resultado);
    }


    public $verificarCarnet;
    public function VerificarCarnet(){
        $columna = "carnet";
        $valor = $this->verificarCarnet;

        $resultado = UsuariosC::VerUsuariosC($columna, $valor);

        echo json_encode($resultado);

    }

}

if(isset($_POST["Uid"])){
    $editarU = new UsuariosA();
    $editarU -> Uid = $_POST["Uid"];
    $editarU -> EditarUsuariosA();
}


if(isset($_POST["verificarCarnet"])){
    $verificarU = new UsuariosA();
    $verificarU -> verificarCarnet = $_POST["verificarCarnet"];
    $verificarU -> VerificarCarnet();
}