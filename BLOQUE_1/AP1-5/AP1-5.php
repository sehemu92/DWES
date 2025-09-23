<?php
//Vamos a definir que los typos deben asimilarse
declare(strict_types=1);
/**
 * @author = fdiaz-alonso
 * Enunciado:
 *
 * Crear una conexión a una BB.DD. de MySQL o MariaDB y extraer los datos de las tablas usuarios y operaciones.
 * Además, añadir en cada una de las tablas un nuevo registro, modificar uno existente y eliminar otro.
 *
 */
//Estos datos podemos extraerlos de la conexión predefinida con DOCKER
//$server = "localhost";
//$server= "0.0.0.0";
$server = "mariadb-server";
$username = "root";
$password = "root";
$db = "AP1";


//Creamos la conexión
$conn = new mysqli($server, $username, $password, $db);

//Verificamos que realmente la conexión ha sido realizada
if($conn->connect_error){
    die("Conexión fallida: ".$conn->connect_errno." --> ".$conn->connect_error);
}else{
    echo "conexión establecida<br>";
}
//Definimos las sentencia en SQL como una cadena de caracteres.
$sql = "SELECT * FROM usuarios";
//Lanzamos la consulta a la BB.DD. y recogemos el resultado.
$result = $conn->query($sql);
//Ahora procesamos el resultado
if($result->num_rows >0){
    //Sabemos que hemos recibido al menos una columna, por lo tanto, recogemos los datos como un array asociativo
    //y lo recorremos con un bucle while
    while ($row = $result->fetch_assoc()){
        echo "El usuario ".$row["nombre"]." posee la id:".$row["id"]." y su estado es:".$row["estado"]."<br>";
    }
}else{
    echo "0 resultados obtenidos";
}
//Realizamos una inserción
$sql = "INSERT INTO usuarios (nombre, estado) VALUES('ZEUS',false)";
try {
    $conn->query($sql);
    $id = $conn->insert_id;
    echo "Se ha realizado correctamente la inserción con la nueva id:" . $id . "<br>";
}catch (mysqli_sql_exception $e){
    die ("Se ha producido el siguiente error:<br>".$e->getMessage().". En la línea:".$e->getLine()."<br>");
}
//Realizamos la actualización
$sql = "UPDATE usuarios SET estado=true WHERE id=".$id;
try {
    $conn->query($sql);
    echo "Se ha realizado correctamente la actualziación de la id:" . $id . "<br>";
}catch (mysqli_sql_exception $e){
    die ("Se ha producido el siguiente error:<br>".$e->getMessage().". En la línea:".$e->getLine()."<br>");
}
//Definimos las sentencia en SQL como una cadena de caracteres.
$sql = "SELECT * FROM usuarios";
//Lanzamos la consulta a la BB.DD. y recogemos el resultado.
$result = $conn->query($sql);
//Ahora procesamos el resultado
if($result->num_rows >0){
    //Sabemos que hemos recibido al menos una columna, por lo tanto, recogemos los datos como un array asociativo
    //y lo recorremos con un bucle while
    while ($row = $result->fetch_assoc()){
        echo "El usuario ".$row["nombre"]." posee la id:".$row["id"]." y su estado es:".$row["estado"]."<br>";
    }
}else{
    echo "0 resultados obtenidos";
}
//Realizamos el borrado de un dato
$sql = "DELETE FROM usuarios WHERE id=".$id;
try {
    $conn->query($sql);
    echo "Se ha realizado correctamente el borrado de la id:" . $id . "<br>";
}catch (mysqli_sql_exception $e){
    die ("Se ha producido el siguiente error:<br>".$e->getMessage().". En la línea:".$e->getLine()."<br>");
}
//Importante acordarse de cerrar la conexión para evitar consumir recursos
$conn->close();