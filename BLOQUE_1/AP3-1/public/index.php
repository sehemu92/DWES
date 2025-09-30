<?php
// Incluir el controlador (que a su vez ya incluye la vista)
require_once __DIR__ . '/controllers/Controller.php';


// Instanciar el controlador y ejecutar la acción de mostrar productos
$controlador = new modelo();
echo $controlador;
