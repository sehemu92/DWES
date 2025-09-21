<?php





//SELECCIÓN DE FIGURA
function seleccionFigura ($figura){
    switch($figura){
        case "triangulo":
            calcularAreaTriangulo ($base, $altura);
            break;
        case "circulo":
            calcularAreaCirculo ($radio)
            break;
        case "rectangulo":
            calcularAreaRectangulo ($base, $altura)
            break;
        default:
            echo "Figura seleccionada no existe";
    }
}



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

?>