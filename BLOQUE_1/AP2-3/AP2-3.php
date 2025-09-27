<?php

/**ENUNCIADO
 *
 *Cómo implementar un patrón Singleton en un contexto de conexión a una base de datos.
 * •
 * Cómo gestionar correctamente una conexión a la base de datos usando mysqli en PHP.
 * •
 * Cómo evitar múltiples conexiones a la base de datos en una aplicación para mejorar el rendimiento y el uso eficiente de recursos.
 * •
 * Las buenas prácticas de diseño para centralizar el acceso a un recurso compartido (como la conexión a la base de datos).
 * •
 * Ver un uso práctico del patrón Singleton en un escenario común (gestión de conexiones a la base de datos) y comprender cómo controlar el acceso a recursos críticos en una aplicación real.
 * Enunciado:
 * Crea la clase DatabaseConnection siguiendo el patrón Singleton.
 * •
 * Sigue la plantilla de patrón Singleton vista en clase.
 * •
 * La conexión a la base de datos se debe hacer dentro del constructor usando la extensión mysqli.
 * •
 * La clase debe recibir los parámetros de conexión como host, usuario, contraseña y nombre de la base de datos.
 * •
 * Puedes usar cualquiera de las BBDD creadas en actividades anteriores.
 * También debes crear una parte del código donde instancies la clase, establezcas la conexión a la BBDD y hagas alguna operación con ella.
 *
 *
 * **/


class DatabaseConnection
{
    private static $instancia = null;  // Almacena la única instancia
    private $conexion;  // Almacena el objeto mysqli
    private $host = 'localhost';
    private $usuario = 'root';
    private $password = '';
    private $baseDeDatos = 'mi_base_de_datos';

    // Constructor privado para evitar la creación directa de nuevas instancias
    private function __construct()
    {
        $this->conexion = new mysqli($this->host, $this->usuario, $this->password, $this->baseDeDatos);

        // Verificar si la conexión fue exitosa
        if ($this->conexion->connect_error) {
            die("Error de conexión: " . $this->conexion->connect_error);
        }
    }

    // Método estático para obtener la única instancia de DatabaseConnection
    public static function getInstance()
    {
        if (self::$instancia === null) {//se refiere a la clase "DatabaseConnection y se usa para acceder a elementos estáticos y  self = DatabaseConnection
            self::$instancia = new DatabaseConnection();
        }
        return self::$instancia;
    }

    // Método para evitar la clonación del objeto
    private function __clone()
    {
    }

    // Método para evitar la deserialización
    private function __wakeup()
    {
    }

    // Método para obtener la conexión mysqli
    public function getConnection()
    {
        return $this->conexion;
    }
}

// Ejemplo de uso
$db1 = DatabaseConnection::getInstance();//Para acceder a los métodos estáticos "::"
$conexion1 = $db1->getConnection();

// Ejecutar una consulta para verificar la conexión
$resultado = $conexion1->query("SELECT * FROM usuarios");

if ($resultado->num_rows > 0) {
    while ($fila = $resultado->fetch_assoc()) {
        echo "ID: " . $fila['id'] . " - Nombre: " . $fila['nombre'] . "\n";
    }
} else {
    echo "No se encontraron usuarios.\n";
}

// Verificar que siempre se usa la misma instancia de conexión
$db2 = DatabaseConnection::getInstance();
$conexion2 = $db2->getConnection();

var_dump($conexion1 === $conexion2);  // true


