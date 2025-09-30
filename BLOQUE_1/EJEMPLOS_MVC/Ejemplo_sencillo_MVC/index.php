<?php
// Incluir el controlador
require_once __DIR__ . '/controllers/ProductoController.php';

// Instanciar el controlador y ejecutar la acción de mostrar productos
$controlador = new ProductoController();
$controlador->mostrarProductos();