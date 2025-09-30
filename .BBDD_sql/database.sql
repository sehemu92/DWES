CREATE DATABASE productos_db;

USE productos_db;

CREATE TABLE productos (
                           id INT AUTO_INCREMENT PRIMARY KEY,
                           nombre VARCHAR(255) NOT NULL,
                           precio DECIMAL(10, 2) NOT NULL
);

INSERT INTO productos (nombre, precio) VALUES
                                           ('Producto 1', 19.99),
                                           ('Producto 2', 29.99),
                                           ('Producto 3', 9.99);
