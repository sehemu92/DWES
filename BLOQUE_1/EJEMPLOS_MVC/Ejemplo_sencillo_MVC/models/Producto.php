<?php

class Producto
{
    private const SERVER = "mariadb-server";
    private const USERNAME = "root";
    private const PASSWORD = "root";
    private const DB = "productos_db";
    private $db;

    public function __construct()
    {
        // Conexión a la base de datos (ajusta las credenciales)
        $this->db = new mysqli(self::SERVER, self::USERNAME, self::PASSWORD, self::DB);
        if ($this->db->connect_error) {
            die("Error de conexión: " . $this->db->connect_error);
        }
    }

    public function obtenerTodos()
    {
        $query = "SELECT * FROM productos";
        $result = $this->db->query($query);
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}
