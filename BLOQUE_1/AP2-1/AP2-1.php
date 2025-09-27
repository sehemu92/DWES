<?php


// Clase base VehiculoCarrera
class VehiculoCarrera
{
    // Atributos protegidos
    protected $marca;
    protected $modelo;
    protected $velocidad;
    protected $combustible;

    // Constructor
    public function __construct($marca, $modelo, $velocidad, $combustible)
    {
        $this->marca = $marca;
        $this->modelo = $modelo;
        $this->velocidad = $velocidad;
        $this->combustible = $combustible;
        echo "Vehículo $marca $modelo creado con éxito.<br>";
    }

    // Destructor
    public function __destruct()
    {
        echo "El coche $this->marca $this->modelo se ha retirado de la carrera.<br>";
    }

    // Método para arrancar el coche
    public function arrancar()
    {
        echo "$this->marca $this->modelo está arrancando...<br>";
    }

    // Método para acelerar el coche
    public function acelerar()
    {
        if ($this->combustible > 0) {
            $this->velocidad += 10;
            $this->consumirCombustible();
            echo "$this->marca $this->modelo está acelerando. Velocidad actual: $this->velocidad km/h.<br>";
        } else {
            echo "$this->marca $this->modelo no puede acelerar, no tiene combustible.<br>";
        }
    }

    // Método para detener el coche
    public function detener()
    {
        $this->velocidad = 0;
        echo "$this->marca $this->modelo se ha detenido.<br>";
    }

    // Método para mostrar el estado del coche
    public function mostrarEstado()
    {
        echo "Estado de $this->marca $this->modelo: Velocidad: $this->velocidad km/h, Combustible: $this->combustible litros.<br>";
    }

    // Método protegido para consumir combustible
    protected function consumirCombustible()
    {
        $this->combustible -= 5;
    }
}

// Clase hija CocheF1
class CocheF1 extends VehiculoCarrera
{
    private $alerones;

    // Constructor
    public function __construct($marca, $modelo, $velocidad, $combustible, $alerones)
    {
        parent::__construct($marca, $modelo, $velocidad, $combustible);
        $this->alerones = $alerones;
    }

    // Método para activar el DRS (Drag Reduction System)
    public function activarDRS()
    {
        if ($this->alerones) {
            $this->velocidad += 20;
            echo "$this->marca $this->modelo ha activado el DRS. Velocidad actual: $this->velocidad km/h.<br>";
        } else {
            echo "$this->marca $this->modelo no tiene alerones mejorados para activar el DRS.<br>";
        }
    }
}

// Clase hija CocheElectricoF1
class CocheElectricoF1 extends VehiculoCarrera
{
    private $bateria;

    // Constructor
    public function __construct($marca, $modelo, $velocidad, $combustible, $bateria)
    {
        parent::__construct($marca, $modelo, $velocidad, $combustible);
        $this->bateria = $bateria;
    }

    // Método para recargar la batería
    public function recargar()
    {
        $this->bateria += 10;
        echo "$this->marca $this->modelo está recargando la batería. Nivel de batería actual: $this->bateria%<br>";
    }
}

// --- Ejemplo de uso ---

// Crear un coche de F1
$cocheF1 = new CocheF1("Ferrari", "SF21", 300, 100, true);
$cocheF1->arrancar();
$cocheF1->acelerar();
$cocheF1->activarDRS();
$cocheF1->mostrarEstado();
$cocheF1->detener();

// Crear un coche eléctrico de F1
$cocheElectricoF1 = new CocheElectricoF1("Mercedes", "EQ Silver Arrow 02", 250, 80, 90);
$cocheElectricoF1->arrancar();
$cocheElectricoF1->acelerar();
$cocheElectricoF1->recargar();
$cocheElectricoF1->mostrarEstado();
$cocheElectricoF1->detener();



