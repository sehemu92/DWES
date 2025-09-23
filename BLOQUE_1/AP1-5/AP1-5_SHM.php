<?php
/**ENUNCIADO - CONECTANDO CON UNA BBDD Y GESTIONANDO DATOS
 *
 *Crear un script de PHP, con el nombre AP1-5.php, que nos permita conectarnos a una BB.DD.
 * •Deberemos conectarnos a la BB.DD. que está contenida en el contenedor de docker. Las credenciales de acceso
 * las podremos ver en el archivo docker-compose.yml.
 * •Nos conectaremos a la BB.DD. → AP1.
 * •Debemos extraer todos los datos de la tabla usuario.
 *   o Para los usuarios mostraremos un mensaje por pantalla:
 *       “El usuario xxnombrexx posee la id: xxidxx y su estado es: xxestadoxx”.
 * • Después añadiremos un nuevo registro a la tabla usuarios. Si se ha insertado correctamente mostraremos el mensaje:
 * “Se ha realizado la inserción con la nueva id:xxidxx“
 *
 * • Tras ellos, con esa id que se ha insertado cambiaremos el estado, actualizando el registro.
 * Si se ha realizado correctamente la actualización mostraremos el mensaje: “Se ha realizado correctamente
 * la actualización de la id: xxidxx”
 * • Y por último procedemos a volver a borrar la id que acabamos de insertar y actualizar. Mostrando el siguiente mensaje si se ha realizado correctamente: “Se ha realizado correctamente el borrado de la id: xxidxx”
 * • En todos los casos deberemos implementar métodos de control de errores try/catch parando el script si existe el error y mostrando un mensaje que indique: “Se ha producido el siguiente error: xxmensaje_de_errorxx. En la línea: xxlínea_de_códigoxx
 * • Importante recordar cerrar la conexión.
 */


/*Crear la BD lo primero y asegurarnos en PHPSTORM que está funcionando*/

/*Crear la conexión a la BBDD*/

//Definimos en forma de variables los datos de la conexión como el host* o server*, username, password y database
//host --> Cuando el script se ejecuta en la máquina local | server --> Cuando el script se ejecuta dentro de un contenedor como en este caso el Docker.
//Para nuestro ejemplo, estos datos los encontramos en el dockerfile, en el caso de la database será la base de datos que queramos acceder

$server="mariadb-server";//Se debe de indicar server y el nombre del contenedor al ejecutarse dentro de este la BD
$username="root";
$password="root";
$db="AP1";

//Creamos la conexión
$conexion=new mysqli($server, $username, $password, $db);

//Verificamos la conexión
if($conexion->connect_error){
    die("Error de conexion: ".$conexion->connect_errno." --> ".$conexion->connect_error);//Hace que aquí se detenga la ejecución
    //connect_errno ----> Muestra el error de forma numérica
    //connect_error ----> Muesrta el error en forma escrita al que se asocia ese error numérico
}
echo "conexion exitosa" ."<br>";
echo "<br>";

//CONSULTA DE EXTRAER TODOS LOS DATOS DE UNA TABLA USUARIO
$sql="SELECT * FROM usuarios";//Código para la consulta

$result =$conexion->query($sql);//CONSULTA

while($row = $result->fetch_assoc()){ //fetch_assoc() ----> Se utiliza para recorrer fila por fila toda la tabla
    /*Comprobación
     * echo "ID: " .$row['id'];
    echo "<br>";
    echo "Nombre: " .$row['nombre'];
    echo "<br>";
    echo "Estado: " .$row['estado'];
    echo "<br>";*/
    echo "El usuario " .$row['nombre'] ." posee la id: " .$row['id'] ." y su estado es: " .$row['estado'] ."<br>";
};

//AÑADIR REGISTRO A UNA TABLA
//Datos a insertar
/*OPCION 1
 * Introducir registro mediante variables
 * $nombre="Margarita";
 * $estado =4;
 *
 */

//Creamos la consulta
//$sql="INSERT INTO usuarios (nombre, estado) VALUES ('$nombre', '$estado')";//Inserción mediante variables
$sql="INSERT INTO usuarios (nombre, estado) VALUES ('WINDOWS', false)";

//Ejecutamos la consulta
/**ORIGINARIAMENTE LO TENIA ASÍ, FUNCIONABA AUNQUE AL INCLUIR DOS VALORES IGUALES YA DABA ERROR
* $conexion->query($sql);
 *
* //Comprobamos que se ha realizado
* /*if ($result){
* //Para extraer la ultima ID incluida:
* $nueva_id =$conexion->insert_id; //Esta es la ide del insert con "insert_id"
* echo "Registro insertado con éxito. El nuevo registro tiene la id: " .$nueva_id;
* echo "<br>";
* }else{
* echo "error al insertar: " .$conexion->error;
* }*/

/*Hacer un try/catch de la función "$conexion->query($sql);"*/
try{
    $conexion->query($sql);
    //Para extraer la ultima ID incluida:
    $id=$conexion->insert_id;//"insert_id" te permite acceder al ÚLTIMO ID creado
    echo "Registro insertado con éxito. El nuevo registro tiene la id: " .$id;
    echo "<br>";
}catch (mysqli_sql_exception $e){//Se utiliza este tipo "mysqli_sql_exception" de error porque es el unico error que puede dar
    die("Se ha producido el siguiente error: "."<br>" . $e->getMessage()) ."en la linea: ".$e->getLine();
}


//MODIFICAR ESTADO Y ACTUALIZAR REGISTRO
//Realizamos la actualización
$sql = "UPDATE usuarios SET estado=true WHERE id=".$id;
$sql2 = "UPDATE usuarios SET nombre='APPLE' WHERE id=".$id;
try {
    $conexion->query($sql);
    $conexion->query($sql2);
    echo "Se ha realizado correctamente la actualizacion de la id:" . $id . "<br>";
    echo "<br>";
}catch (mysqli_sql_exception $e){
    die ("Se ha producido el siguiente error:<br>".$e->getMessage().". En la línea:".$e->getLine()."<br>");
    echo "<br>";
}

//Definimos las sentencia en SQL como una cadena de caracteres.
$sql = "SELECT * FROM usuarios";
//Lanzamos la consulta a la BB.DD. y recogemos el resultado.
$result = $conexion->query($sql);
//Ahora procesamos el resultado
if($result->num_rows >0){ //Esta condición le está indicando si hay más de una row, mostrar el resultado sino pasa al else
    //Sabemos que hemos recibido al menos una columna, por lo tanto, recogemos los datos como un array asociativo
    //y lo recorremos con un bucle while
    while ($row = $result->fetch_assoc()){
        echo "El usuario ".$row["nombre"]." posee la id:".$row["id"]." y su estado es:".$row["estado"]."<br>";
    }
}else{
    echo "0 resultados obtenidos";
}


//BORRAR ÚLTIMO INSERTADO Y ACTUALIZAR
//Realizamos el borrado de un dato
$sql = "DELETE FROM usuarios WHERE id=".$id;
try {
    $conexion->query($sql);
    echo "Se ha realizado correctamente el borrado de la id:" . $id . "<br>";
}catch (mysqli_sql_exception $e){
    die ("Se ha producido el siguiente error:<br>".$e->getMessage().". En la línea:".$e->getLine()."<br>");
}


//Importante acordarse de cerrar la conexión para evitar consumir recursos
$conexion->close();

?>
