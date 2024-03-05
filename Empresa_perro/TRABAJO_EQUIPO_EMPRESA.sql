--CREAMOS LA BASE DE DATOS:
CREATE DATABASE PET_HOTEL
GO
USE PET_HOTEL
GO

--CREAMOS LAS TABLAS:

CREATE TABLE RAZA(
ID_RAZA CHAR(4) PRIMARY KEY CHECK(ID_RAZA LIKE 'R[0-9][0-9][0-9]'),
TIPO_RAZA VARCHAR(20) NOT NULL UNIQUE,
DESCRIPCI�N VARCHAR(MAX) NOT NULL
)
GO

CREATE TABLE VACUNA(
ID_VACUNA CHAR(4) PRIMARY KEY CHECK(ID_VACUNA LIKE 'V[0-9][0-9][0-9]'),
TIPO_VACUNA VARCHAR(20) NOT NULL UNIQUE,
DESCRIPCI�N VARCHAR(MAX)
)
GO

CREATE TABLE TARJETA(
ID_TARJETA CHAR(4) PRIMARY KEY CHECK(ID_TARJETA LIKE 'T[0-9][0-9][0-9]'),
ANTIPULGAS BIT NOT NULL CHECK(ANTIPULGAS IN (0, 1)),
DESPARASITACI�N BIT NOT NULL CHECK(DESPARASITACI�N IN (0, 1)),
INDICACI�N VARCHAR(50),
DESCRIPCI�N VARCHAR(MAX)
)
GO

CREATE TABLE CANINO(
ID_PERRO CHAR(5) PRIMARY KEY CHECK(ID_PERRO LIKE 'CA[0-9][0-9][0-9]'),
NOMBRE VARCHAR(20) NOT NULL,
PESO INT NOT NULL,
EDAD INT NOT NULL,
TAMA�O CHAR(10) NOT NULL,
ID_TARJETA CHAR(4) NOT NULL FOREIGN KEY(ID_TARJETA) REFERENCES TARJETA(ID_TARJETA),
ID_VACUNA CHAR(4) NOT NULL FOREIGN KEY(ID_VACUNA) REFERENCES VACUNA(ID_VACUNA),
ID_RAZA CHAR(4) NOT NULL FOREIGN KEY(ID_RAZA) REFERENCES RAZA(ID_RAZA)
)
GO

CREATE TABLE HABITACION_ESTANDAR(
ID_ESTANDAR CHAR(4) PRIMARY KEY CHECK(ID_ESTANDAR LIKE 'E[0-9][0-9][0-9]'),
DESCRIPCI�N VARCHAR(MAX) NOT NULL
)
GO

CREATE TABLE HABITACION_PREMIUM(
ID_PREMIUM CHAR(5) PRIMARY KEY CHECK(ID_PREMIUM LIKE 'PR[0-9][0-9][0-9]'),
DESCRIPCI�N VARCHAR(MAX) NOT NULL
)
GO

CREATE TABLE HABITACION_CANINA(
ID_HABI CHAR(4) PRIMARY KEY CHECK(ID_HABI LIKE 'H[0-9][0-9][0-9]'),
NRO_HABI CHAR(3) NOT NULL UNIQUE,
ID_PERRO CHAR(5) NOT NULL FOREIGN KEY(ID_PERRO) REFERENCES CANINO(ID_PERRO),
ID_PREMIUM CHAR(5) NOT NULL FOREIGN KEY(ID_PREMIUM) REFERENCES HABITACION_PREMIUM(ID_PREMIUM),
ID_ESTANDAR CHAR(4) NOT NULL FOREIGN KEY(ID_ESTANDAR) REFERENCES HABITACION_ESTANDAR(ID_ESTANDAR)
)
GO

CREATE TABLE FACTURA(
ID_FACTURA CHAR(4) PRIMARY KEY CHECK(ID_FACTURA LIKE 'F[0-9][0-9][0-9]'),
SERVICIOS_AD VARCHAR(50) NOT NULL,
COSTO_TOTAL MONEY NOT NULL
)
GO

CREATE TABLE CLIENTE(
ID_CLIENTE CHAR(4) PRIMARY KEY CHECK(ID_CLIENTE LIKE 'C[0-9][0-9][0-9]'),
NOMBRE VARCHAR(20) NOT NULL,
APELLIDO VARCHAR(20) NOT NULL,
DNI CHAR(8) NOT NULL UNIQUE,
TEL�FONO CHAR(9) NOT NULL UNIQUE,
DIRECCI�N VARCHAR(40) NOT NULL UNIQUE,
ID_FACTURA CHAR(4) NOT NULL FOREIGN KEY(ID_FACTURA) REFERENCES FACTURA(ID_FACTURA)
)
GO

CREATE TABLE RESERVA(
ID_RESERVA CHAR(4) PRIMARY KEY CHECK(ID_RESERVA LIKE 'R[0-9][0-9][0-9]'),
FECHA_INI DATETIME NOT NULL DEFAULT(GETDATE()),
FECHA_SAL DATETIME NOT NULL ,
PRECIO MONEY NOT NULL,
ID_CLIENTE CHAR(4) NOT NULL FOREIGN KEY(ID_CLIENTE) REFERENCES CLIENTE(ID_CLIENTE),
ID_CANINO CHAR(5) NOT NULL FOREIGN KEY(ID_CANINO) REFERENCES CANINO(ID_PERRO)
)
GO

CREATE TABLE HISTORIAL(
ID_HISTORIAL CHAR(5) PRIMARY KEY CHECK(ID_HISTORIAL LIKE 'HI[0-9][0-9][0-9]'),
DESCRIPCI�N VARCHAR(MAX),
ID_RESERVA CHAR(4) NOT NULL FOREIGN KEY(ID_RESERVA) REFERENCES RESERVA(ID_RESERVA)
)
GO

CREATE TABLE PET_HOTEL(
ID_PET CHAR(4) PRIMARY KEY CHECK(ID_PET LIKE 'P[0-9][0-9][0-9]'),
DIRECCI�N VARCHAR(40) NOT NULL,
TEL�FONO CHAR(9) NOT NULL,
NOMBRE VARCHAR(20) NOT NULL UNIQUE,
ID_RESERVA CHAR(4) NOT NULL FOREIGN KEY(ID_RESERVA) REFERENCES RESERVA(ID_RESERVA),
ID_HABI CHAR(4) NOT NULL FOREIGN KEY(ID_HABI) REFERENCES HABITACION_CANINA(ID_HABI)
)
GO

--INSERTAMOS 5 REGISTROS EN CADA CAMPO DE CADA TABLA:
INSERT INTO RAZA VALUES 
('R001', 'Labrador Retriever', 'Amigable y extrovertido'),
('R002', 'Pastor Alem�n', 'Inteligente y vers�til'),
('R003', 'Golden Retriever', 'Amigable y tolerante'),
('R004', 'Bulldog', 'D�cil y decidido'),
('R005', 'POODLE', 'Inteligente y activo');
GO

INSERT INTO VACUNA VALUES 
('V001', 'Rabia', 'Vacuna contra la rabia'),
('V002', 'Parvovirus', 'Vacuna contra el parvovirus'),
('V003', 'Moquillo', 'Vacuna contra el moquillo'),
('V004', 'Hepatitis', 'Vacuna contra la hepatitis canina'),
('V005', 'Leptospirosis', 'Vacuna contra la leptospirosis');
GO

INSERT INTO TARJETA VALUES 
('T001', 0, 1, 'Tratamiento antipulgas y desparasitaci�n mensual', 'Producto utilizado: XZY'),
('T002', 0, 1, 'Desparasitaci�n mensual', 'Producto utilizado: ABC'),
('T003', 1, 0, 'Tratamiento antipulgas mensual', 'Producto utilizado: DEF'),
('T004', 0, 0, 'Sin tratamiento', 'No se aplicaron tratamientos este mes'),
('T005', 1, 1, 'Tratamiento antipulgas y desparasitaci�n quincenal', 'Producto utilizado: GHI');
GO

INSERT INTO CANINO VALUES 
('CA001', 'Max', 25, 3, 'Mediano', 'T001', 'V001', 'R001'),
('CA002', 'Bella', 15, 2, 'Peque�o', 'T002', 'V002', 'R002'),
('CA003', 'Rocky', 30, 4, 'Grande', 'T003', 'V003', 'R003'),
('CA004', 'Luna', 18, 1, 'Peque�o', 'T004', 'V004', 'R004'),
('CA005', 'Coco', 22, 5, 'Mediano', 'T005', 'V005', 'R005');
GO

INSERT INTO HABITACION_ESTANDAR VALUES 
('E001', 'Habitaci�n est�ndar con cama y juguetes para perros peque�os'),
('E002', 'Habitaci�n est�ndar con �rea de juegos para perros medianos'),
('E003', 'Habitaci�n est�ndar con acceso a jard�n para perros grandes'),
('E004', 'Habitaci�n est�ndar con cama y ventana para perros peque�os'),
('E005', 'Habitaci�n est�ndar con sala de estar para perros medianos');
GO

INSERT INTO HABITACION_PREMIUM VALUES 
('PR001', 'Habitaci�n premium con cama ortop�dica y �rea de juegos para perros peque�os'),
('PR002', 'Habitaci�n premium con piscina privada para perros medianos'),
('PR003', 'Habitaci�n premium con jard�n exclusivo para perros grandes'),
('PR004', 'Habitaci�n premium con cama de lujo y ventana panor�mica para perros peque�os'),
('PR005', 'Habitaci�n premium con sala de estar y acceso directo al parque para perros medianos');

GO

INSERT INTO HABITACION_CANINA VALUES 
('H001', '101', 'CA001', 'PR001', 'E001'),
('H002', '102', 'CA002', 'PR002', 'E002'),
('H003', '103', 'CA003', 'PR003', 'E003'),
('H004', '104', 'CA004', 'PR004', 'E004'),
('H005', '105', 'CA005', 'PR005', 'E005');

GO

INSERT INTO FACTURA VALUES 
('F001', 'Servicio est�ndar', 50.00),
('F002', 'Servicio premium', 75.00),
('F003', 'Servicio premium con tratamientos adicionales', 100.00),
('F004', 'Servicio est�ndar con descuento', 40.00),
('F005', 'Servicio premium con descuento', 65.00);
GO

INSERT INTO CLIENTE VALUES 
('C001', 'Juan', 'P�rez', '12345678', '987654321', 'Calle 123, Ciudad', 'F001'),
('C002', 'Mar�a', 'G�mez', '87654321', '654321987', 'Avenida XYZ, Pueblo', 'F002'),
('C003', 'Carlos', 'Rodr�guez', '56789012', '321987654', 'Ruta 456, Villa', 'F003'),
('C004', 'Laura', 'Hern�ndez', '34567890', '789012345', 'Calle Principal, Ciudad', 'F004'),
('C005', 'Javier', 'L�pez', '90123456', '234567890', 'Avenida Central, Pueblo', 'F005');
GO

INSERT INTO RESERVA VALUES 
('R001', GETDATE(), GETDATE() + 7, 60.00, 'C001', 'CA001'),
('R002', GETDATE(), GETDATE() + 10, 80.00, 'C002', 'CA002'),
('R003', GETDATE(), GETDATE() + 5, 100.00, 'C003', 'CA003'),
('R004', GETDATE(), GETDATE() + 14, 50.00, 'C004', 'CA004'),
('R005', GETDATE(), GETDATE() + 8, 75.00, 'C005', 'CA005');
GO

INSERT INTO HISTORIAL VALUES 
('HI001', 'Historial m�dico del perro durante la estancia en el hotel.', 'R001'),
('HI002', 'Observaciones y tratamientos realizados al perro.', 'R002'),
('HI003', 'Registro de comportamiento y actividades diarias del perro.', 'R003'),
('HI004', 'Notas sobre la alimentaci�n y preferencias del perro.', 'R004'),
('HI005', 'Seguimiento de la salud y bienestar del perro en el hotel.', 'R005');
GO

INSERT INTO PET_HOTEL VALUES 
('P001', 'Calle Principal 123, Lima', '123456789', 'Hotel Canino Feliz', 'R001', 'H001'),
('P002', 'Avenida Central 456, Arequipa', '987654321', 'Pet Paradise', 'R002', 'H002'),
('P003', 'Calle Secundaria 789, Trujillo', '123987456', 'Doggy Haven', 'R003', 'H003'),
('P004', 'Ruta 101, Chiclayo', '654321987', 'Paws Palace', 'R004', 'H004'),
('P005', 'Calle Perro 567, Cusco', '789012345', 'Barkington Hotel', 'R005', 'H005');
GO

--EJECUTAMOS LAS TABLAS:

SELECT * FROM PET_HOTEL

SELECT * FROM RESERVA

SELECT * FROM HISTORIAL

SELECT * FROM CLIENTE

SELECT * FROM FACTURA

SELECT * FROM CANINO

SELECT * FROM HABITACION_CANINA

SELECT * FROM HABITACION_ESTANDAR

SELECT * FROM HABITACION_PREMIUM

SELECT * FROM TARJETA

SELECT * FROM VACUNA

SELECT * FROM RAZA

ALTER AUTHORIZATION ON DATABASE :: [PET_HOTEL] TO SA