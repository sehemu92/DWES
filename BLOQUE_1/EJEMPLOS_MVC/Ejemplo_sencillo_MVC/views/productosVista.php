<?php
if (!isset($productos)) {
    $productos = [];
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Lista de productos</title>
</head>
<body>
<h1>Lista de productos</h1>
<ul>
    <?php foreach ($productos as $producto): ?>
        <li><?php echo $producto['nombre']; ?> - <?php echo $producto['precio']; ?> €</li>
    <?php endforeach; ?>
</ul>
</body>
</html>
