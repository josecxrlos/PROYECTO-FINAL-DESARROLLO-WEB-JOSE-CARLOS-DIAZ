<?php

require_once "Controladores/plantillaC.php";
require_once "Controladores/usuariosC.php";
require_once "Modelos/usuariosM.php";
require_once "Controladores/carrerasC.php";
require_once "Modelos/carrerasM.php";
require_once "Controladores/ajustesC.php";
require_once "Modelos/ajustesM.php";
require_once "Controladores/cursosC.php";
require_once "Modelos/cursosM.php";
require_once "Controladores/ExamenesC.php";
require_once "Modelos/ExamenesM.php";
require_once "Controladores/certificadosC.php";
require_once "Modelos/certificadosM.php";


$plantilla = new Plantilla();
$plantilla -> LlamarPlantilla();

?>