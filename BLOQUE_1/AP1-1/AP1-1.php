<?php
/**
 * @author = fdiaz-alonso
 * Enunciado: Crear un script de PHP que lea de la ruta los datos recibidos, los introduzca en un array con sus correspondientes claves recíbidas
 * y posteriormente se muestre por pantalla cada con la siguiente máscara: "Se ha recibido xxvalorxx para la clave xxclavexx" cada uno en una línea.
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
 * Para poder mostrar los datos lo que tenemos que hacer es recorrer el array y mostrar en cada iteración los datos
 * según nos solicitan.
 */
//Usaremos un bucle foreach para poder el array y a su vez poder manejar el contenido en cada iteración
foreach ($datos as $key => $value){
    echo "Se ha recibido ".$value." para la clave ".$key."<br>";
}

/**
 * Para probar su funcionamiento lanzar desde el terminal en la carpeta donde este contenido el script:
 * php -S localhost:8000
 * y después en el navegador ponemos la siguiente ruta.
 * http://localhost:8000/AP1-1.php?hola=mundo&clave=valor2&clave2=valor3
 *
 * El var_dump nos dirá que hemos recibido:
 * array (size=3)
 * 'hola' => string 'mundo' (length=5)
 * 'clave' => string 'valor2' (length=6)
 * 'clave2' => string 'valor3' (length=6)
 *
 * Y luego tendrá que mostrarnos:
 *
 * Se ha recibido mundo para la clave hola
 * Se ha recibido valor2 para la clave clave
 * Se ha recibido valor3 para la clave clave2
 * Si en la ruta del navegador cambiar el valor de la clave2 o verás como té dice que ha recibido lo que pongas cuando
 * guardés el script y recargues la página del navegador de nuevo.
 */
?>
