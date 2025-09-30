<?php
if (!isset($datos)) {
    $datos = [];
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>AP3-1 - VISTA</title>
</head>
<body>
<h1>AP3-1</h1>
<ul>
    <?php foreach ($datos as $key => $value): ?>
        <li>
            <?php
                echo "title: " .$datos[0];
            ?>
        </li>
        <li>
            <?php
            echo "keyworks: " .$datos[1];
            ?>
        </li>
        <li>
            <?php
            echo "description: " .$datos[2];
            ?>
        </li>
        <li>
            <?php
            echo "content: " .$datos[3];
            ?>
        </li>
    <?php endforeach; ?>
</ul>
</body>
</html>



