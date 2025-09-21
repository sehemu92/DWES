<?php
/**
 * @author = fdiaz-alonso
 * Enunciado: Crear un script de PHP que lea de la ruta los datos recibidos, los introduzca en un array con sus correspondientes claves recíbidas
 * Posteriormente debe comprobar si el primer valor recíbido es un número o una cadena de caracteres.
 * Si es un número mostrará un mensaje Diciendo que es un número, si no lo fuera mostrará un mensaje dicíendo que es una cadena de caracteres.
 * Si el primer valor estuviera vacío nos mostrará un mensaje diciendo que está vacío.
 * Hará lo mismo para cada uno de los valores recibidos.
 */

/*
 * Primero recogemos los datos desde la ruta
 * Como no tenemos información del tipo de método HTTP recibido y tampoco cuantos datos recibimos cogemos todo lo enviado.
 * Se crea la variable datos.
 */
//Creamos la variable y definimos el tipo de
$datos = array();

//Aúnque parece evidente que debemos recibir datos, deberemos acostumbrarnos a comprobar que recibimos lo esperado
if(isset($_REQUEST)){
    //En este caso no es necesario crear
    $datos = $_REQUEST;
}
//Colocamos un var_dump para que se vea que recibimos un dato de tipo array y por lo tanto datos será un array
var_dump($datos);

/*
 * Para poder mostrar los datos antes de realizar la comprobación vamos a recorrer el array y analizamos en cada
 * iteración que tipo de valor es.
 */
//Usaremos un bucle foreach para poder el array y a su vez poder manejar el contenido en cada iteración
//En este caso no necesitamos el valor de la clave por lo que lo omitimos
//Como el foreach va a recorrer el array si existen datos, si no se han recibido es decir esta vacío debemos hacer la consulta fuera del foreach
if(empty($datos)){
    echo "Se ha recibido un valor vacío<br>";
}
foreach ($datos as $value) {
    //Una vez que estamos en la iteración comprobamos el tipo de dato y para eso vamos a utilizar unas funciones
    //dentro de la estructura de control if.
    if (is_null($value)) {
        //Primero comprobamos que sea nulo
        echo "Se ha recibido un valor nulo<br>";
    } elseif (is_numeric($value)) {
        //comprobamos si es un número
        echo "Se ha recibido un número<br>";
    } else {
        //Como por defecto los datos son cadenas de caracteres, si no es un número, nulo o esta vacío lo catalogamos
        //como un string(cadena de caracteres)
        echo "Se ha recibido una cadena de carácteres<br>";
    }
}

    /**
     * Para probar su funcionamiento lanzar desde el terminal en la carpeta donde este contenido el script:
     * php -S localhost:8000
     * y después en el navegador ponemos la siguiente ruta.
     * http://localhost:8000/AP1-2.php?hola=mundo&clave=2&clave2=valor3&dato=null
     *
     * El var_dump nos dirá que hemos recibido:
     * array (size=4)
     * 'hola' => string 'mundo' (length=5)
     * 'clave' => string '2' (length=1)
     * 'clave2' => string 'valor3' (length=6)
     * 'dato' => string 'null' (length=4)
     *
     * Y luego tendrá que mostrarnos:
     *
     * Se ha recibido una cadena de carácteres
     * Se ha recibido un número
     * Se ha recibido una cadena de carácteres
     * Se ha recibido una cadena de carácteres
     *
     * Si en la ruta del navegador cambiar el valor de la clave2 por un número verás como té dice que ha recibido un número
     * guardés el script y recargues la página del navegador de nuevo.
     *
     * Prueba a poner la siguiente ruta y comprueba que te dice que esta vacío
     * http://localhost:8000/AP1-2.php
     */