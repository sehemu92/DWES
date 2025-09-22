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
    die("Error de conexion: ".$conexion->connect_errno." --> ".$conexion->connect_error);
}
echo "conexion exitosa";






?>
