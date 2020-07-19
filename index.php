<?php 
require_once "./core/ConfigGeneral.php"; 
require_once "./Controllers/vistasController.php";
require "./Controllers/libroController.php";


$obj = new libroController;
echo $obj->guardar_libro_controller();

if(isset($_POST['id-eliminar'])){
    echo $obj->eliminar_libro_controller();
}

if(isset($_POST['titulo-up']) && isset($_POST['autor-up'])){
    echo $obj->actualizar_libro_controller();
}

$plantilla= new vistasController(); //instanciando
$plantilla->obtener_plantilla_controller();
