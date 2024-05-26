CREATE DATABASE WEB_PET;

GO
USE WEB_PET;

GO

CREATE TABLE Cuentas (
    IdCuenta CHAR(4) PRIMARY KEY CHECK (IdCuenta LIKE 'C[0-9][0-9][0-9]'),
    Usuario VARCHAR(40) NOT NULL,
    Contraseña VARCHAR(40) NOT NULL
)
GO
CREATE TABLE DatosCuenta (
    IdDatos CHAR(4) PRIMARY KEY CHECK (IdDatos LIKE 'D[0-9][0-9][0-9]'),
    Nombre NVARCHAR(30) NOT NULL,
    dni CHAR(8) NOT NULL,
    direccion VARCHAR(50) NOT NULL,
    celular CHAR(9) NOT NULL
);
GO
CREATE TABLE Habitaciones (
    IdHabitacion CHAR(4) PRIMARY KEY CHECK (IdHabitacion LIKE 'H[0-9][0-9][0-9]'),
    TipoHabitacion VARCHAR(50) NOT NULL,
    Precio DECIMAL(10, 2) NOT NULL,
    tipo VARCHAR(10) NOT NULL
);
GO

CREATE TABLE DatosH (
	IdDatos CHAR(4) NOT NULL FOREIGN KEY(IdDatos) REFERENCES DatosCuenta(IdDatos),
	IdHabitacion CHAR(4) NOT NULL FOREIGN KEY(IdHabitacion) REFERENCES Habitaciones(IdHabitacion)
	)
GO

ALTER AUTHORIZATION ON DATABASE::WEB_PET TO SA;
SELECT * FROM Cuentas

