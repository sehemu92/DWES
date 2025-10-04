# DWES --> AP3-1 - Ejemplo básico de como realizar un MVC en PHP con POO.

## Descripción:
Esta actividad práctica consiste en crear una aplicación sencilla, pero cumpliendo con el modelo MVC.
En este caso buscamos la sencillez, puedes aplicar todo lo que sabes hasta ahora de OOP en PHP

## Recursos generales:
Presentaciones y videos de Temas 3:
• Introducción a MVC
Material de apoyo:
• POO y MVC en PHP
• Y de más links del tema en Florida Oberta.

## Actividades:
Para ello se pide:
Crea un proyecto que se deberá llamar AP3-1-MVC-Sencillo con la estructura típica que se ha visto en el tema.
### 1. Estructura de archivos
```
AP3-1-MVC-Sencillo-con-POO/
├── src/
│   ├── controllers/
│   │   └── Controller.php     # Controlador que gestiona la lógica de la aplicación
│   ├── models/
│   │   └── Model.php          # Modelo que contiene y gestiona los datos
│   └── views/
│       └── View.php           # Vista encargada de renderizar la plantilla HTML
├── public/
│   ├── index.php              # Front controller - punto de entrada de la aplicación
│   └── assets/                # Recursos estáticos (CSS, imágenes, plantillas)
└── README.md
```

### 2. Datos del modelo
Los datos están definidos directamente en el constructor del Model.php:
```php
public function __construct()
{
    $this->data = array(
        "title" => "MVC Sencillo PHP",
        "keyworks" => "arquitectura de software, poo, mvc, php",
        "description" => "ponemos en práctica el MVC en PHP",
        "content" => "El contenido del presente ejercico corresponde a la creación de
                        un modelo vista controlado, MVC en adelante, mediante el lenguaje
                        de programación PHP de una forma sencilla y haciendo uso de los
                        conocimientos previos que tienen los alumnos."
    );
}
```
El index.php ahora es simplemente el punto de entrada que instancia el controlador y llama al método para mostrar la vista.

### 3. Vista
Un archivo que realice la gestión visual de renderizar, o mostrar una plantilla HTML básica con los datos que tenemos en el model.

La plantilla HTML no es necesario que tenga ningún tipo de css, buscamos afianzar los conocimientos de MVC. Simplemente, debe contener una tabla en la que rellenaremos los datos del modelado del MVC.

Importante no se busca conexión alguna con una BB.DD.

## License

This work is licensed under a Creative Commons Attribution-NonCommercial-NoDerivatives 4.0 International License.

<a rel="license" href="http://creativecommons.org/licenses/by-nc-nd/4.0/"><img alt="Creative Commons License" style="border-width:0" src="https://i.creativecommons.org/l/by-nc-nd/4.0/80x15.png" /></a>


## Credits

Authors: Fernando A. Díaz-Alonso ([@fdiaz-alonso](https://github.com/fdiaz-alonso)) and David Soler
