<?php

namespace src\views;
class View
{

    private array $data;
    private string $template;

    public function __construct(array $datos = null)
    {
        $this->template = "../../public/assets/template.html";
        //Comprobamos si hemos recibido o no datos o un nulo.
        //Si hemos recibido datos procedemos a crear la plantilla
        if (!is_null($datos)) {
            $this->data = $datos;
            $this->mostrarPlantilla();
        }
    }

    /**
     * @param array $data
     */
    public function setData(array $data): void
    {
        $this->data = $data;
    }

    /**
     * Mos permite mostrar la vista
     * @return void
     */
    public function mostrarPlantilla()
    {
        //Cargamos la plantilla HTML
        include_once $this->template;
    }

}

?>