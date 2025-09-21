<?php
/**
 * ENUNCIADO
 * •Crear un script de PHP, con el nombre AP1-2.php, que lea la ruta del navegador los datos recibidos.
 * •Los datos deben ser introducidos en un array que estará compuesto por las claves recibidas y el valor de cada uno de esos datos.
 * •Posteriormente se debe comprobar que tipo de dato se ha recibido o si por el contrario es un dato vacío o nulo.
 *    •Si el valor que se ha recibido un número deberemos mostrar un mensaje que diga: “Se ha recibido un número”
 *    •Si por el contrario no se ha recibido un número, consideraremos que se ha recibido una cadena de caracteres y mostraremos el mensaje: “Se ha recibido una cadena de caracteres”
 *    •Si por el contrario no se hubiera recibido datos o fuera nulo mostraremos el siguiente mensaje: “No se ha recibido ningún dato o es un valor nulo”
 *    •Deben evaluarse cada uno de los valores del array, de forma que los mensajes deben mostrarse secuencialmente a cada uno de los valores que contenga el array y en líneas separadas. Existiendo tantos mensajes como valores tenga el array.
 *
 *Para probarlo usar como ejemplo la ruta:
 * http://localhost:8001/BLOQUE_1/AP1-2/AP1-2_SHM.php?hola=mundo&clave=2&clave2=valor3&dato=null
 */

//Creación de ARRAY vacío
$arrayDeDatos = array();

//Introducir claves y valores en el array
$arrayDeDatos = $_GET;

//Mostrar tipo de dato recibido
echo var_dump($arrayDeDatos);
echo "<br>";
echo "<br>";

foreach ($arrayDeDatos as $key => $value) {
    /*NO ME FUNCIONA
     * if(is_string($value)){
        echo "La clave " .$key ." es de tipo string";
        echo "<br>";
        echo "<br>";
    }else if(is_int($value)){
        echo "La clave " .$key ." es de tipo numérico";
        echo "<br>";
        echo "<br>";
    }else{
        echo "La clave " .$key ." es null";
        echo "<br>";
        echo "<br>";
    }*/
    if($value === "null"){
        echo "El valor " . $key . " es null--> " .$value;
        echo "<br>";
        echo "<br>";
    }else if(is_numeric($value)){
        echo "El valor " . $key . " es un NUMERIC--> " .$value;
        echo "<br>";
        echo "<br>";
    }else if(is_string($value)){
        echo "El valor " . $key . " es un STRING--> " .$value;
        echo "<br>";
        echo "<br>";
    }
};

/**CONSIDERACIONES
 * No me terminaba de salir el ejercicio, porque todos los valores introducidos en la URL son considerados como STRING,
 * por tanto, lo que se debe de hacer es especificar mucho, ya que por ejemplo "2" es de dos tipos.
 *
 * También tener en cuenta el orden de las condiciones... ya que si ponemos primero la condición de "is_string" al ser
 * todos strings, directamente no pasa de ahí, por eso está el null el primero.
 *
 */

?>
