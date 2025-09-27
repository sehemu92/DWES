<?php

// Clase base VehiculoCarrera
class VehiculoCarrera
{
    // Atributos protegidos
    public $marca;
    public $color;
    public $velocidad;
    public $velocidadMaxima;
    public $distanciaRecorrida;


    // Constructor
    public function __construct($marca, $color)//Eliminamos todos salvo estos que son los que se utilizan
    {
        $this->marca = $marca;
        $this->color = $color;
        $this->velocidad = 0;//Para que se inicialice a 0
        $this->velocidadMaxima=rand(250, 300);//USO DE RANDOM EN PHP---> Velocidad máxima aleatoria entre 250 y 300 km/h;
        $this->distanciaRecorrida=0; //Para que se inicialice a 0
    }

    // Método para acelerar el coche
    public function acelerar($dado){
        $aceleracion=$this->velocidad+$dado;
        if($aceleracion > $this->velocidadMaxima){
            $this->velocidad=300;
        }else{
            $this->velocidad=$aceleracion;
        }
      echo "$this->marca $this->modelo está acelerando. Velocidad actual: $this->velocidad km/h.<br>";
    }

    //Método para avanzar
    public function avanzar(){
        $distancia=$this->velocidad/60;
        $this->distanciaRecorrida+=$distancia;
        echo $this->nombre ."ha recorrido un total de " .$this->distanciaRecorrida ."metros\n";
    }
}

//Método para el dado de turnos
function tirarDado(){
        $dado=rand(1,10);
        return $dado;
    }


    // Función para configurar los coches y jugadores
function configurarCoches($numJugadores){
        $vehiculos = []; //Creamos un array vacio para guardar los objetos que serán los coches creados

        //Crear vehiculos
        for ($i = 1; $i <= $numJugadores; $i++) {
            echo "Jugador {$i}, ingresa el nombre de tu coche: ";
            $nombre = trim(fgets(STDIN));//Introducir por teclado, "trim" para quitar espacios, "fgets" para capturar entrada y "STDIN" llama al teclado
            echo "Jugador {$i}, ingresa el color de tu coche: ";
            $color = trim(fgets(STDIN));

            // Crear un coche para el jugador
            $vehiculos[] = new VehiculoCarrera($nombre, $color);

            echo "El coche {$nombre} tiene una velocidad máxima de {$vehiculos[$i - 1]->velocidadMaxima} km/h.\n";//Ponemos i-1 porque el for para la creación de jugadores empieza desde el 1
        }

        return $vehiculos;
}


    //FUNCION PARA JUGAR
    function jugarCarrera($vehiculos){
        $ganador=false;

        echo "Va a empezar la carrera de F1!!!!!!!!!!\n";

        //Indicamos un while para que se ejecute mientras se cumpla que no hay ganador (false)
        while (!$ganador) {
            foreach ($vehiculos as $vehiculo) {
                echo "\n{$vehiculo->nombre}, es tu turno. Presiona Enter para tirar el dado.";
                fgets(STDIN);

                // Tirar dado y acelerar el coche
                $dado = tirarDado();
                echo "Has sacado un {$dado} en el dado.\n";
                $vehiculo->acelerar($dado);

                // Calcular la distancia recorrida
                $vehiculo->avanzar();

                // Verificar si el jugador ha ganado
                if ($vehiculo->distanciaRecorrida >= 100) {
                    echo "{$vehiculo->nombre} ha ganado la carrera con un total de {$vehiculo->distanciaRecorrida} metros recorridos.\n";
                    $ganador = true;
                    break;
                }
            }
            echo "\n\n"; // Separación entre turnos
        }
    }



// Solicitar el número de jugadores
do {
    echo "Ingrese el número de jugadores (entre 2 y 6): ";
    $numJugadores = (int)trim(fgets(STDIN));
} while ($numJugadores < 2 || $numJugadores > 6);

// Configurar los jugadores
$jugadores = configurarCoches($numJugadores);

// Comenzar el juego
jugarCarrera($jugadores);



?>
