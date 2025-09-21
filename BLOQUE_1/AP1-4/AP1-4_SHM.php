<!--COPIADO DE SOLUCIÓN PROFESOR, PARA PODER CAPTURAR LA INFORMACION-->
<!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Calculadora de Áreas</title>
    </head>
    <body>
    <h1>Calculadora de Áreas</h1>
    <form method="post" action=""> <!--PARA CAPTURAR INFORMACIÓN DE UN FORMULARIO SIEMPRE INDICAR "method="post"" el "action" indica DONDE enviar los datos, en este caso al estar vacio sería al mismo archivo-->
        <label for="figura">Elige la figura:</label>
        <select id="figura" name="figura"> <!--IMPRESCINDIBLE poner "name" ya que es la clave que usará PHP en el $_POST[name]-->
            <option value="triangulo">Triángulo</option> <!--IMPRESCINDIBLE poner "value" en las listas ya que es la clave que usará PHP en el $_POST[figura]-->
            <option value="rectangulo">Rectángulo</option>
            <option value="circulo">Círculo</option>
        </select>
        <!---->
        <br><br>
        <div id="valores">
            <label for="base">Base:</label>
            <input type="number" id="base" name="base" step="0.01"> <!--IMPRESCINDIBLE poner "name" ya que es la clave que usará PHP en el $_POST[name]-->
            <br><br>
            <label for="altura">Altura:</label>
            <input type="number" id="altura" name="altura" step="0.01"> <!--IMPRESCINDIBLE poner "name" ya que es la clave que usará PHP en el $_POST[name]-->
            <br><br>
            <label for="radio" style="display:none;">Radio:</label>
            <input type="number" id="radio" name="radio" step="0.01" style="display:none;"> <!--IMPRESCINDIBLE poner "name" ya que es la clave que usará PHP en el $_POST[name]-->
        </div>
        <input type="submit" value="Calcular Área"> <!--IMPRESCINDIBLE poner un botón con "type=submit" para enviar los datos al PHP-->
    </form>


<?php

//Creación de funciones
function calcularAreaTriangulo ($base, $altura){
    $resultado=($base*$altura)/2;
    return $resultado;
};

function calcularAreaRectangulo ($base, $altura){
    $resultado=($base*$altura);
    return $resultado;
};

function calcularAreaCirculo ($radio){
    $resultado=pi()*pow($radio,2);
    return $resultado;
};

//SELECCIÓN DE FIGURA
if($_SERVER["REQUEST_METHOD"] == "POST"){
    //Recoger los valores enviados por el formulario
    $figura = $_POST["figura"]; //Accede al value de la figura seleccionada en el select del HTML, $_POST es la forma de acceder al name
    switch($figura){
        case "triangulo":
            $base = $_POST['base']; //Accede al input con "name = base" del HTML, $_POST es la forma de acceder al name
            $altura = $_POST['altura'];//Accede al input con "name = altura" del HTML, $_POST es la forma de acceder al name
            echo "El área del triángulo es: ".calcularAreaTriangulo ($base, $altura);
            break;
        case "circulo":
            $radio = $_POST['radio'];//Accede al input con "name = radio" del HTML, $_POST es la forma de acceder al name
            echo "El área del circulo es: " .calcularAreaCirculo ($radio);
            break;
        case "rectangulo":
            $base = $_POST['base'];
            $altura = $_POST['altura'];
            echo "El área del rectangulo es: " .calcularAreaRectangulo ($base, $altura);
            break;
        default:
            echo "Figura seleccionada no existe";
    }
}

?>

    </body>
    </html>
