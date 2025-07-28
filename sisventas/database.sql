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
INSERT INTO categorias (nomcategoria) VALUES 
('Electrónicos'), ('Ropa'), ('Electrónicos'), ('Ropa'), ('Electrónicos');

INSERT INTO proveedores (nomproveedor, ruc, direccion, telefono, email) VALUES 
('Comercial Andina S.A', '20481234567', 'Av. Javier Prado 123, Lima', '(01) 345-6789', 'contacto@andinasac.com'), 
('Proveedora del Norte', '20542345678', 'Jr. Amazonas 456, Trujillo', '(044) 234-567', 'ventas@proveedoranorte.com'),
('Logística Integral SAC', '20486789123', 'Av. Argentina 890, Callao', '(01) 765-4321', 'info@logisticaintegral.pe'),
('Suministros Perú S.R.L.', '20670123456', 'Calle Piura 123, Arequipa', '(054) 123-456', 'contacto@suministrosperu.pe'),
('Repuestos Industriales', '20457891234', 'Av. La Marina 750 ', '(01) 543-2109', 'repuestos@industriales.com'),
('Distribuciones Sur EIRL', '20670098765', 'Calle Tacna 321, Cusco', '(084) 987-654', 'contacto@distsur.com'),
('Electro Tools SAC', '20549871230', 'Av. Grau 456, Chiclayo', '(074) 555-333', 'ventas@electrotools.pe'),
('Ferretería San José', '20761234501', 'Jr. Moquegua 102, Huancayo', '(064) 111-222', 'ferreteria@sanjose.com'),
('BioFarma S.A.', '20480011223', 'Calle Los Olivos 345', '(01) 678-9012', 'contacto@biofarma.com'),
('AgroProveedores SAC', '20890123456', 'Carretera Central Km. 5, Tarma', '(064) 222-333', 'ventas@agroproveedores.pe');
INSERT INTO productos (nomproducto, unidad, stock, preciounidad, costo, idcategoria, idproveedor) VALUES 
('Audífonos Bluetooth', 'caja', 150, 45.00, 25.00, 1, 1), 
('Camiseta Básica Hombre', 'unidad', 200, 13.00, 6.00, 2, 2),
('Pantalón Jeans', 'unidad', 120, 39.00, 20.50, 2, 1), 
('Smartwatch Deportivo', 'caja', 80, 89.00, 55.00, 1, 2),
('Chaqueta Impermeable', 'unidad', 75, 59.00, 30.00, 2, 1), 
('Teclado Mecánico RGB', 'caja', 60, 69.00, 42.00, 1, 2),
('Zapatillas Running', 'par', 90, 74.50, 40.00, 2, 1), 
('Monitor LED 24', 'unidad', 45, 149.00, 90.00, 1, 2),
('Sudadera con Capucha', 'unidad', 100,29.90, 15.50, 2, 1), 
('Mouse Inalámbrico', 'caja', 130, 25.00, 12.00, 1, 1);

INSERT INTO clientes (nomcliente, ruc, direccion, telefono, email) VALUES 
('Luis Fernando Ríos', '20981234567', 'Av. Benavides 1234, Miraflores', '912345678', 'contacto@corp-misky.com'),
('María Alejandra Gómez', '20452345678', 'Jr. Lima 789, Piura', '995648237', 'torres@inversionestorres.pe'),
('Carlos Eduardo Mendoza', '20586789123', 'Calle San Martín 100, Cusco', '985647265', 'ventas@grupotyc.com'),
('Ana Lucía Ramírez', '20470123456', 'Av. La Cultura 345, Arequipa', '954632458', 'llama@supermercados.com'),
('Jorge Andrés Paredes', '20547891234', 'Jr. Tarata 222, Lima', '995463258', 'info@solucionesmedicas.pe'),
('Valeria Sofía Torres', '20670018765', 'Av. Los Héroes 987, Huánuco', '985963254', 'contacto@elsol.com'),
('Diego Armando Salazar', '20549871299', 'Calle Bolívar 456, Cajamarca', '954326945', 'proyectos@andinasac.pe'),
('Gabriela Isabel Quiroz', '20761234001', '	Av. Primavera 123, San Borja', '963254852', 'eco@serviciosecologicos.com'),
('Santiago Nicolás Chávez', '20480012223', 'Fundo El Milagro, Ica', '964582156', 'contacto@valleverdeagro.com'),
('Luciana Beatriz Delgado', '20890123999', 'Jr. Puno 321, Pucallpa', '945896271', 'reservas@lagunaazulhotel.com');

INSERT INTO ventas (fecha, idcliente, total, tipo) VALUES 
('2023-10-01', 1, 30.00, 'contado'), 
('2023-10-02', 2, 40.00, 'credito');

INSERT INTO detalle_ventas (idventa, idproducto, cantidad, precio) VALUES (1, 1, 3, 10.00), (2, 2, 2, 20.00);

INSERT INTO usuarios (nomusuario, apellidos, nombres, email, estado)
VALUES ('jdoe', 'Doe', 'John', 'jdoe@example.com', 'activo');
