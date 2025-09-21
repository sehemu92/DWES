<?php
//Vamos a definir que los typos deben asimilarse
declare(strict_types=1);
/**
 * @author = fdiaz-alonso
 * Enunciado: Crear un script de PHP que posea un array con el siguiente contendio:
 * [
 *   1 => "primero",
 *   3 => "segundo",
 *   5 => "tercero",
 *   7 => "cuarto",
 *   9 => "quinto",
 *   11 => "sexto",
 * ]
 *
 * Después vamos a recorrer el array y mostrar un mensaje para las posiciones primera, tercera y quinta de: "Estás en una posición impar"
 * Y asignaremos a una variable llamada "impar" el valor verdadero y a la variable "par" el valor falso.
 * Para las posiciones segunda, cuarta y sexta mostraremos un mensaje: "Estás en una posición par" y asignaremos e la variable "par" un
 * valor verdadero y para la "impar" un valor falso.
 * En cada una de las iteraciones además de verificar si son pares o impares deberemos mostrar el valor total de la suma de las claves que hemos recorrido.
 * Es decir, en la primera iteración sumanos (1) que es la clave de esa posición, en la segunda sumaremos la primera (1) y la segunda (3) por lo que tenemos 4.
 * Con ese valor deberemos mostrar un nuevo mensaje indicando si la suma de las iteraciones es mayor a 5, 10, 20.
 */

//Lo primero declaramos el array, en este caso lo hacemos como una constante
const datos = array(1 => "primero", 3 => "segundo", 5 => "tercero", 7 => "cuarto", 9 => "quinto", 11 => "sexto");
(bool)$par= false;
(bool)$impar = false;
(int)$suma = 0;
(int)$iteracion = 0;
//recorremos el array para verificar cada una de las posiciones
foreach (datos as $key => $value){
    //Verificamos en que iteración nos encontramos, primero la incrementamos para contar la iteración en la que estamos
    //y luego comprobamos el valor del resto para verificar si es o no par o impar, siendo par si el resto es 0.
    if(((++$iteracion)%2)==0){
        $par = true;
        $impar = false;
        echo "-- Estás en una posición par.\t";
    }else{
        $par = false;
        $impar = true;
        echo "-- Estás en una posición impar.\t";
    }

    //Realizamos la suma de las claves
    $suma += $key;
    echo "La suma de las claves es: ".$suma."\t";
    //Ahora comprobamos el valor la suma de las claves para definir en que posición esta.
    $resultado = match (true){
        $suma > 20 => 'El valor es mayor que 20<br>',
        $suma > 10 => 'El valor es mayor que 10<br>',
        $suma > 5 => 'El valor es mayor a 5<br>',
        $suma <=5 => '<br>'
    };
    echo $resultado;

}