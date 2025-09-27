<?php

// Clase Vehiculo
class Vehiculo {
    public $nombre;
    public $color;
    public $velocidadMaxima;
    public $velocidadActual;
    public $distanciaRecorrida;

    // Constructor para inicializar el vehículo
    public function __construct($nombre, $color) {
        $this->nombre = $nombre;
        $this->color = $color;
        $this->velocidadMaxima = rand(250, 300); // Velocidad máxima aleatoria entre 250 y 300 km/h
        $this->velocidadActual = 0;
        $this->distanciaRecorrida = 0;
    }

    // Método para acelerar el coche
    public function acelerar($dado) {
        $incremento = $dado * 10; // Cada valor del dado aumenta la velocidad en 10 km/h
        $this->velocidadActual += $incremento;

        // No permitir que la velocidad actual supere la velocidad máxima
        if ($this->velocidadActual > $this->velocidadMaxima) {
            $this->velocidadActual = $this->velocidadMaxima;
        }

        echo "{$this->nombre} acelera en {$incremento} km/h, velocidad actual: {$this->velocidadActual} km/h\n";
    }

    // Método para calcular la distancia recorrida en cada turno
    public function avanzar() {
        // Convertimos la velocidad actual en distancia recorrida en un turno (asumimos que un turno dura 1 hora)
        $this->distanciaRecorrida += $this->velocidadActual / 60; // Suponemos que cada turno es de 1 minuto (1/60 de hora)
        echo "{$this->nombre} ha recorrido un total de {$this->distanciaRecorrida} metros\n";
    }
}

// Función para tirar un dado
function tirarDado($min, $max) {
    return rand($min, $max);
}

// Función para configurar los coches y jugadores
function configurarJugadores($numJugadores) {
    $jugadores = [];

    for ($i = 1; $i <= $numJugadores; $i++) {
        echo "Jugador {$i}, ingresa el nombre de tu coche: ";
        $nombre = trim(fgets(STDIN));
        echo "Jugador {$i}, ingresa el color de tu coche: ";
        $color = trim(fgets(STDIN));

        // Crear un coche para el jugador
        $jugadores[] = new Vehiculo($nombre, $color);

        echo "El coche {$nombre} tiene una velocidad máxima de {$jugadores[$i - 1]->velocidadMaxima} km/h.\n";
    }

    return $jugadores;
}


// Función para jugar
function jugarCarrera($jugadores) {
    $rojo = "\033[31m";
    $verde = "\033[32m";
    $reset = "\033[0m";
    $negrita = "\033[1m";

    $ganador = false;
    echo $negrita . $rojo . "----------------------------------------------------\n". $reset;
    echo $negrita . $verde . "Va a empezar la carrera de F1!!!!!!!!!!\n". $reset;
    echo $negrita . $rojo . "----------------------------------------------------\n" . $reset;

    // Bucle de juego hasta que un coche recorra 100 metros
    while (!$ganador) {
        foreach ($jugadores as $jugador) {
            echo "\n{$jugador->nombre}, es tu turno. Presiona Enter para tirar el dado.";
            fgets(STDIN);

            // Tirar dado y acelerar el coche
            $dado = tirarDado(1, 10);
            echo "Has sacado un {$dado} en el dado.\n";
            $jugador->acelerar($dado);

            // Calcular la distancia recorrida
            $jugador->avanzar();

            // Verificar si el jugador ha ganado
            if ($jugador->distanciaRecorrida >= 100) {
                echo "{$jugador->nombre} ha ganado la carrera con un total de {$jugador->distanciaRecorrida} metros recorridos.\n";
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
$jugadores = configurarJugadores($numJugadores);

// Comenzar el juego
jugarCarrera($jugadores);

?>