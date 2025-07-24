-- Script para crear la base de datos de sisventas

CREATE DATABASE IF NOT EXISTS sisventas;
USE sisventas;

-- Tabla de categorías
CREATE TABLE categorias (
    idcategoria INT AUTO_INCREMENT PRIMARY KEY,
    nomcategoria VARCHAR(100) NOT NULL
);

-- Tabla de proveedores
CREATE TABLE proveedores (
    idproveedor INT AUTO_INCREMENT PRIMARY KEY,
    nomproveedor VARCHAR(100) NOT NULL,
    ruc VARCHAR(20),
    direccion VARCHAR(255),
    telefono VARCHAR(20),
    email VARCHAR(100)
);

-- Tabla de productos
CREATE TABLE productos (
    idproducto INT AUTO_INCREMENT PRIMARY KEY,
    nomproducto VARCHAR(100) NOT NULL,
    unidad VARCHAR(50),
    stock INT DEFAULT 0,
    preciounidad DECIMAL(10,2),
    costo DECIMAL(10,2),
    idcategoria INT,
    idproveedor INT
);

-- Tabla de clientes
CREATE TABLE clientes (
    idcliente INT AUTO_INCREMENT PRIMARY KEY,
    nomcliente VARCHAR(100) NOT NULL,
    ruc VARCHAR(20),
    direccion VARCHAR(255),
    telefono VARCHAR(20),
    email VARCHAR(100)
);

-- Tabla de ventas
CREATE TABLE ventas (
    idventa INT AUTO_INCREMENT PRIMARY KEY,
    fecha DATE NOT NULL,
    idcliente INT NOT NULL,
    total DECIMAL(10,2) NOT NULL,
    tipo ENUM('contado', 'credito') NOT NULL
);

-- Tabla de detalles de ventas
CREATE TABLE detalle_ventas (
    iddetalle INT AUTO_INCREMENT PRIMARY KEY,
    idventa INT NOT NULL,
    idproducto INT NOT NULL,
    cantidad INT NOT NULL,
    precio DECIMAL(10,2) NOT NULL
);

-- Tabla de usuarios para login
CREATE TABLE usuarios (
    idusuario INT AUTO_INCREMENT PRIMARY KEY,
    nomusuario VARCHAR(15) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    apellidos VARCHAR(64),
    nombres VARCHAR(64),
    email VARCHAR(64),
    estado CHAR(1)
);

-- Datos de muestra
INSERT INTO categorias (nomcategoria) VALUES ('Electrónicos'), ('Ropa');

INSERT INTO proveedores (nomproveedor, ruc, direccion, telefono, email) VALUES ('Proveedor A', '123456789', 'Calle 1', '123456', 'prov@a.com'), ('Proveedor B', '987654321', 'Calle 2', '654321', 'prov@b.com');

INSERT INTO productos (nomproducto, unidad, stock, preciounidad, costo, idcategoria, idproveedor) VALUES ('Producto 1', 'unidad', 100, 10.00, 5.00, 1, 1), ('Producto 2', 'unidad', 50, 20.00, 10.00, 2, 2);

INSERT INTO clientes (nomcliente, ruc, direccion, telefono, email) VALUES ('Cliente 1', '111111', 'Dirección 1', '111111', 'cli1@email.com'), ('Cliente 2', '222222', 'Dirección 2', '222222', 'cli2@email.com');

INSERT INTO ventas (fecha, idcliente, total, tipo) VALUES ('2023-10-01', 1, 30.00, 'contado'), ('2023-10-02', 2, 40.00, 'credito');

INSERT INTO detalle_ventas (idventa, idproducto, cantidad, precio) VALUES (1, 1, 3, 10.00), (2, 2, 2, 20.00);
