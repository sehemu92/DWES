<?php
/**ENUNCIADO
 *
 * • Crear un script de PHP, con el nombre AP1-1.php, que lea la ruta del navegador los datos recibidos.
 *
 * • Los datos deben ser introducidos en un array que estará compuesto por las claves recibidas y el valor de cada uno de esos datos.
 *
 * • Posteriormente debe mostrarte en la pantalla del navegador la siguiente mascará para cada uno de los datos recibidos separados por líneas:
 * “Se ha recibido xxvalorxx para la clave xxclavexx.”
 * Donde xxvalorxx corresponde al valor que este contenido en el array y se ha recibido previamente por la ruta.
 * Y xxclavexx corresponde a la clave asociada en el array a ese valor.
 *
 * • Para probarlo usar como ejemplo la ruta:
 * http://localhost:8000/AP1-1.php?hola=mundo&clave=valor2&clave2=valor3
 */

//Lo primero es que al necesitar recuperar datos de la URL debemos de usar $_GET
//Seguidamente, nos el enunciado nos indica que la URL será la siguiente: http://localhost:8000/BLOQUE_1/AP1-1/AP1-1_SHM.php?hola=mundo&clave=valor2&clave2=valor3
//Esto nos indica lo siguiente: (Clave=valor) => hola=mundo; clave=valor2; clave2=valor3

//Captura de los datos de la URL (captura el valor que tiene la variable mencionada, por ejemplo: hola)
$variable1 =$_GET['hola'];
$variable2 =$_GET['clave'];
$variable3 =$_GET['clave2'];

//Creación de array
$arrayDeDatos =['hola'=>$variable1, 'clave'=>$variable2,'clave2'=>$variable3];
/*DE CONTROL
 *echo $arrayDeDatos['hola'];
 * echo "<br>";
 * echo $arrayDeDatos['clave'];
 * echo "<br>";
 * echo $arrayDeDatos['clave2'];
 * echo "<br>";
 */


/*AÑADIDO TRAS VER LA SOLUCIÓN*/
/*// la función "isset" permite verificar que una variable está definida Y no es NULL.
if(isset($_REQUEST)) {
    //En este caso no es necesario crear
    $datos = $_REQUEST;
}

//Para comprobar los datos recibidos
var_dump($datos);
*/

//Recorremos el array para mostrar los datos separados por lineas.
foreach ($arrayDeDatos as $key => $value) {
  echo "Se ha recibido " .$value ." para la clave " .$key ."<br>";
  echo "<br>";
};

/*COMENTARIO TRAS VER SOLUCIÓN
 * Con el $_GET directamente ya recoge clave y valor, con lo que se podría hacer "$arrayDeDatos=$_GET"
 *
 * $arrayDeDatos2 = array();
 * $arrayDeDatos2 = $_GET;//Sale un error, pero no es una error es una advertencia de que es ineficiente
 * foreach ($arrayDeDatos2 as $key => $value) {
    echo "Se ha recibido " .$value ." para la clave " .$key ."<br>";
    echo "<br>";
    };
 * */


?>