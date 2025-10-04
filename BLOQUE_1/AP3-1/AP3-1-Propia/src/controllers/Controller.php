<?php

//En el controller instanciamos el modelo
namespace src\controllers;

use src\models\modelo;

require_once __DIR__ . '/../models/Model.php';


class controlador
{
    public function mostrarInformacion()
    {
        // Crear instancia del modelo AP3-1
        $modelo = new modelo();

        //Como hemos puesto en el constructor toda la información, al instanciarlo ya deberia de mostrarla.

        // Incluir la vista y pasar los productos
        include __DIR__ . '/../views/View.php'; //Fijarse que aqui se indica "include" y no "require_once"
    }

}