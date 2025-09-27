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
    protected $marca;
    protected $modelo;
    protected $velocidad;
    protected $combustible;

  //CONSTRUCTOR
    public function __construct($marca, $modelo, $velocidad, $combustible){
        $this->marca =$marca;
        $this->modelo=$modelo;
        $this->velocidad=$velocidad;
        $this->combustible=$combustible;
        echo "Vehículo $marca $modelo creado con éxito.<br>";
    }

    //DESTRUCTOR
    public function __destruct(){
        echo "El coche $this->marca $this->modelo se ha retirado de la carrera.<br>";
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
        echo "El coche " .$this->marca ." " .$this->modelo ." tiene :" .$this->combustible ."litros de combustible y velocidad media de " .$this->velocidad ."km/h"."<br>";

    }
};



/*CLASE HIJA COCHE F1*/
class cocheF1 extends VehiculoCarrera{
    public $alerones;//DRS desactivado de forma predeterminada

    public function __construct($marca, $modelo, $velocidad, $combustible, $alerones){
        parent::__construct($marca, $modelo, $velocidad, $combustible); //Atributos hererados de la clase padre
        $this->alerones=$alerones;
    }

    public function activarDRS(){
        $this->alerones=true; //DRS activado
        $incrementoVelocidad=50; //Declaración de variable local
        $this->velocidad+=$incrementoVelocidad;//Tener cuidado porque si solo pongo "+" no asigna, únicamente hace la operación, más correcto usar "+="
        echo "DRS activado y su velocidad ha aumentado a " .$this->velocidad ."km/h" ."<br>";
    }

    public function detenerF1(){
        $this->alerones=false;
        echo"DRS desactivado"."<br>";
        //Llamada a un metodo del padre
        parent::detener();
    }
}


/*CLASE HIJA COCHE FORMULA E*/
class cocheFormulaE extends VehiculoCarrera{
    public $bateria;

    public function __construct($marca, $modelo, $velocidad, $combustible, $bateria){
        parent::__construct($marca, $modelo, $velocidad, $combustible); //Atributos hererados de la clase padre, tener en cuenta que el FE no usa combustible
        $this->bateria=$bateria;
    }

    public function recargar(){
        $recarga=30;
        $this->bateria+=$recarga;
        echo "Recarga - Bateria al " .$this->bateria ."%" ."<br>";
    }

    //Reescribir algunos metodos porque están enfocados a combustible y no bateria
    public function arrancar(){
        $this->bateria-=10;
        echo "El coche " .$this->marca ." " .$this->modelo ." ha arrancado y ha consumido bateria, actualmente le quedan :" .$this->bateria ."% de bateria" ."<br>";
    }

    public function acelerar(){
        /*DE CONTROL
        echo "Función acelerar" . "<br>";
        */
        echo "El coche " .$this->marca ." " .$this->modelo ." ha acelerado su marcha" ."<br>";
        $this->bateria-=25; //Si acelera consume más fuel
    }


    //Reescribir metodo mostrarEstado() del Padre
    public function mostrarEstado(){
        echo "El coche " .$this->marca ." " .$this->modelo ." tiene :" .$this->bateria ."% de bateria y velocidad media de " .$this->velocidad ."km/h"."<br>";
    }
}


//DE CONTROL CLASE PADRE
$cochePrueba=new VehiculoCarrera('FERRARI', 'F430', '150', '100');
$cochePrueba->arrancar();
$cochePrueba->acelerar();
$cochePrueba->detener();
$cochePrueba->mostrarEstado();

echo "<br>";
echo "<br>";

//DE CONTROL CLASE HIJA COCHEF1
$mclarenF1=new cocheF1('MCLAREN', 'MCL14', '200', '75',false);
$mclarenF1->arrancar();
$mclarenF1->mostrarEstado();
$mclarenF1->acelerar();
$mclarenF1->activarDRS();
$mclarenF1->mostrarEstado();
$mclarenF1->detenerF1();
$mclarenF1->mostrarEstado();

echo "<br>";
echo "<br>";

//DE CONTROL CLASE HIJA COCHE FORMULA E
$jaguarFE=new cocheFormulaE('Jaguar', 'Electric FE', 100, 0, 70);
$jaguarFE->mostrarEstado();
$jaguarFE->arrancar();
$jaguarFE->acelerar();
$jaguarFE->mostrarEstado();
$jaguarFE->detener();
$jaguarFE->recargar();
$jaguarFE->mostrarEstado();







?>
