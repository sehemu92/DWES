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
                echo $key .": " .$value; //únicamente es necesario ponerlo así, poruqe el array es de tipo asociativo
            ?>
        </li>
    <?php endforeach; ?>
</ul>
</body>
</html>



