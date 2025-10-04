<?php

/**
 * Clase que simula al Modelo de un MVC
 */
class Model
{

    private array $data;

    public function __construct()
    {
        $this->data = array(
            "title" => "MVC Sencillo PHP",
            "keyworks" => "arquitectura de software, poo, mvc, php",
            "description" => "ponemos en práctica el MVC en PHP",
            "content" => "El contenido del presente ejercico corresponde a la creación de
                            un modelo vista controlado, MVC en adelante, mediante el lenguaje
                            de programación PHP de un forma sencilla y haciendo uso de los
                            conocimientos previos que tienen los alumnos."
        );
    }

    /**
     * @return array
     */
    public function getData(): array
    {
        return $this->data;
    }

    /**
     * @param array $data
     */
    public function setData(array $data): void
    {
        $this->data = $data;
    }


}