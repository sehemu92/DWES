<?php
/**ENUNCIADO
 *Crear un script de PHP, con el nombre AP1-3.php, que contenga un array con los siguientes datos:
 * [ 1 => "primero", 3 => "segundo", 5 => "tercero", 7 => "cuarto", 9 => "quinto", 11 => "sexto", ]
 * •Deberemos recorrer el array y para las posiciones primera, tercera y quinta:
 *    o Mostraremos un mensaje: “Estas en una posición impar”.
 *    o Asignaremos a una variable llamada “impar” el valor verdadero y a la variable llamada “par” el valor falso.
 * •Para las posiciones segunda, cuarta y sexta:
 *    o Mostraremos un mensaje: “Estas en una posición par”.
 *    o Asignaremos a una variable llamada “par” el valor verdadero y a la variable llamada “impar” el valor falso.
 * •En cada una de las iteraciones, además de verificar si la posición es par o impar, deberemos mostrar el valor total de la suma de las claves que hemos recorrido.
 *    o Es decir, para la primera iteración sumamos (1) y mostramos 1, para la segunda sumaremos (1) + (3) y mostraremos 4.
 * •Y para finalizar en cada iteración evaluamos el valor resultante de la suma anterior, mostrando alguno de los mensajes siguientes si corresponde:
 *    o El valor de la suma es mayor que 5.
 *    o El valor de la suma es mayor que 10.
 *    o El valor de la suma es mayor que 20.
 */

//Creación de array
$arrayDeDatos = [1=>"primero", 3=>"segundo", 5=>"tercero", 7=>"cuarto", 9=>"quinto", 11=>"sexto"];
(int)$resultado=0;

foreach ($arrayDeDatos as $key => $value) {
  if($key%2!=0){
      echo "Estas en una posición impar" ."<br>";
      echo $value;
      echo "<br>";
      (boolean)$impar=true;
      (boolean)$par=false;
      $resultado+=$key;
      echo $resultado;
      echo "<br>";
      if($resultado>5){
          echo "El valor de la suma es mayor que 5 "."<br>";
          echo "<br>";
      }else if($resultado>10) {
          echo "El valor de la suma es mayor que 10"."<br>";
          echo "<br>";
      }else if($resultado>20) {
          echo "El valor de la suma es mayor que 20"."<br>";
          echo "<br>";
      }
  }else{
      echo "Estas en una posición par";
      (boolean)$impar=false;
      (boolean)$par=true;
      $resultado+=$key;
      echo "<br>";
      echo "<br>";
      if($resultado>5){
          echo "El valor de la suma es mayor que 5 "."<br>";
          echo "<br>";
      }else if($resultado>10) {
          echo "El valor de la suma es mayor que 10"."<br>";
          echo "<br>";
      }else if($resultado>20) {
          echo "El valor de la suma es mayor que 20"."<br>";
          echo "<br>";
      }
  }

};

?>
