<?php
/***ENUNCIADO
 *
 *Vas a crear una pequeña simulación de una carrera de Fórmula 1 utilizando Programación Orientada a Objetos (POO). En este ejercicio, debéis crear clases que representen distintos tipos de vehículos de carrera (CocheF1 y CocheElectricoF1), con sus atributos y métodos correspondientes.
 * Los conceptos que se van a aplicar son:
 * •Clases para representar los vehículos.
 * •Herencia para crear diferentes tipos de vehículos que hereden de una clase base.
 * •Métodos protegidos para los cálculos internos de los coches.
 * •Métodos públicos para interactuar con los coches desde el exterior.
 * •Constructor para inicializar los coches con ciertos atributos.
 * •Destructor para indicar cuando un coche se ha "retirado" de la carrera.
 *
 * Instrucciones:
 * 1. * Clase base VehiculoCarrera:
 * oAtributos protegidos:
 * ▪marca: La marca del coche.
 * ▪modelo: El modelo del coche.
 * ▪velocidad: La velocidad máxima del coche.
 * ▪combustible: Nivel de combustible.
 * oMétodos protegidos:
 * ▪consumirCombustible(): Método que reduce el combustible al moverse el coche.
 * oMétodos públicos:
 * ▪arrancar(): Arranca el coche.
 * ▪acelerar(): Incrementa la velocidad del coche.
 * ▪detener(): Detiene el coche.
 * ▪mostrarEstado(): Muestra el estado actual del coche (marca, modelo, velocidad y combustible).
 * oConstructor:
 * ▪Inicializa los atributos marca, modelo, velocidad, y combustible.
 * oDestructor:
 * ▪Muestra un mensaje indicando que el coche se ha retirado de la carrera.
 * 2.Clase hija CocheF1:
 * oHereda de VehiculoCarrera.
 * oAtributo extra:
 * ▪alerones: Indica si tiene alerones mejorados.
 * oMétodos específicos:
 * ▪activarDRS(): Método que simula la activación del DRS para aumentar la velocidad temporalmente.
 * 3Clase hija CocheElectricoF1:
 * oHereda de VehiculoCarrera.
 * Atributo extra:
 * ▪ bateria: Nivel de batería del coche.
 * oMétodos específicos:
 * ▪recargar(): Método que simula la recarga de la batería.
 *
 */

//Clase PADRE
class VehiculoCarrera{
    //ATRIBUTOS
    public $marca;
    public $modelo;
    public $velocidad;
    public $combustible;

  //CONSTRUCTOR
    public function __construct($marca, $modelo, $velocidad, $combustible){
        $this->marca =$marca;
        $this->modelo=$modelo;
        $this->velocidad=$velocidad;
        $this->combustible=$combustible;
    }

  //Métodos
    protected function consumirCombustible(){
        /*DE CONTROL
        echo "Función consumirCombustible" . "<br>";
        */
        $this->combustible-=5; //Resta 1 ud al combustible inicializado con el constructor
    }
    public function arrancar(){
        /*DE CONTROL
        echo "Función arrancar" . "<br>";
        */
        $this->consumirCombustible();
        echo "El coche " .$this->marca ." " .$this->modelo ." ha arrancado y ha consumido gasolina, actualmente le quedan :" .$this->combustible ."litros" ."<br>";
    }
    public function acelerar(){
        /*DE CONTROL
        echo "Función acelerar" . "<br>";
        */
        echo "El coche " .$this->marca ." " .$this->modelo ." ha acelerado su marcha" ."<br>";
        $this->combustible-=25; //Si acelera consume más fuel
    }
    public function detener (){
        /*DE CONTROL
        echo "Función detener" . "<br>";
        */
        echo "El coche " .$this->marca ." " .$this->modelo ." ha detenido su marcha para una parada en boxes" ."<br>";
        $this->combustible-=0; //Si acelera consume más fuel
    }
    public function mostrarEstado(){
        /*DE CONTROL
        echo "Función mostrarEstado" . "<br>";
        */
        echo "El coche " .$this->marca ." " .$this->modelo ." tiene :" .$this->combustible ."litros de combustible y velocidad media de " .$this->velocidad ."<br>";

    }
};

//DE CONTROL
$cochePrueba=new VehiculoCarrera('FERRARI', 'F430', '250KM/H', '100');
$cochePrueba->arrancar();
$cochePrueba->acelerar();
$cochePrueba->detener();
$cochePrueba->mostrarEstado();





?>
