<?php
// Incluir el archivo del modelo
require_once __DIR__ . '/../models/Producto.php'; // Usa __DIR__ para obtener la ruta correcta.

class ProductoController
{
    public function mostrarProductos()
    {
        // Crear instancia del modelo Producto
        $producto = new Producto();

        // Obtener todos los productos
        $productos = $producto->obtenerTodos();

        // Incluir la vista y pasar los productos
        include __DIR__ . '/../views/productosVista.php';
    }
}
