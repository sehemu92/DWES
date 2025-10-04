<?php

require_once("../src/controllers/Controller.php");

//Lo primero que debe hacer el index es cargar el controller para que se encargue de realizar la gestión adecuada.
$controller = new Controller();
//Para finalizar enviamos los datos a la vista y posteriormente se mostrará de nuevo la vista.
$controller->enviarDatosVista();
?>

