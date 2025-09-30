<?php


class modelo{
    //Generamos la variable para el array tal como pide el enunciado
    private array $datos;

    //Definimos el constructor, y como dice el enunciado le ponemos los datos en el constructor
    public function __construct(){
        $this->datos=array(
            "title" => "MVC Sencillo PHP",
            "keyworks" => "arquitectura de software, poo, mvc, php",
            "description" => "ponemos en práctica el MVC en PHP",
            "content" => "El contenido del presente ejercico corresponde a la creación de
                            un modelo vista controlado, MVC en adelante, mediante el lenguaje
                            de programación PHP de un forma sencilla y haciendo uso de los
                            conocimientos previos que tienen los alumnos."
        );
    }

    //Creación de getter y setter para poder acceder al array
    //En el getter ponemos que se retorne como tipo de dato un array
    public function getDatos():array{
        return $this->datos;
    }

    public function setDatos(array $datos):void{
        $this->datos=$datos;//Indica que en el setter le entrará un array de DatosX y modificará al array de la clase modelo creada, digamos que se lee al revés.
    }

}

