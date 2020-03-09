-- Sql inicial Sistema AgroIniap 2020 SQL INICIAL SISTEMA 
-- Modulo #1 Usuarios del Sistema 
-- CREAMOS LA TABLA DE USUARIOS Agr_Usuario CON SUS RESPECTIVAS COLUMNAS
CREATE TABLE Agr_Usuario (
-- CREAMOS LA COLUMNA CON EL IDENTIFICADOR Id_Usuario  LA CUAL SERA LA CLAVE PRIMARIA DE LA TABLA 
Id_Usuario int PRIMARY KEY,
-- CREAMOS LA COLUMNA-CLAVE SECUNDARIA DE LA TABLA INPTUSER 
Nombres varchar(100),
Apellidos varchar(100),
CI varchar(100),
Correo varchar(10),
Clave varchar(200),
Id_Parroquia int,
Id_Tipo_Usuario int
);
-- CREAMOS UNA SECUENCIA PARA AGREGAR UN AUTOINCREMENTABLE
CREATE SEQUENCE usuario_autoincrement OWNED BY Agr_Usuario.Id_Usuario;

-- ALTERAMOS LA COLUMNA Id_Usuario DE LA TABLA Agr_Usuario AGREGANDOLE LA SECUENCIA DE AUTOINCREMENT 
ALTER TABLE Agr_Usuario ALTER COLUMN Id_Usuario SET DEFAULT nextval('usuario_autoincrement');

--ACTUALIZAMOS LA COLUMNA INPUID DE LA TABLA INPUSERS AGREGANDOLE LA SECUENCIA DE AUTOINCREMENT/
UPDATE
Agr_Usuario
SET
Id_Usuario = nextval('usuario_autoincrement');
------------------------------------------------------------------------------------------------------
-- CREAMOS LA TABLA TIPO DE USUARIO Agr_Tipo_Usuario CON SUS RESPECTIVAS COLUMNAS
CREATE TABLE Agr_Tipo_Usuario (
-- CREAMOS LA COLUMNA CON EL IDENTIFICADOR INPTUID LA CUAL SERA LA CLAVE PRIMARIA DE LA TABLA
Id_Tipo_Usuario int PRIMARY KEY,
Nombre varchar(100)
);
-- CREAMOS UNA SECUENCIA PARA AGREGAR UN AUTOINCREMENTABLE 
CREATE SEQUENCE tipo_usuario_autoincrement OWNED BY Agr_Tipo_Usuario.Id_Tipo_Usuario;
-- ALTERAMOS LA COLUMNA INPTUID DE LA TABLA INPTUSER AGREGANDOLE LA SECUENCIA DE AUTOINCREMENT
ALTER TABLE Agr_Tipo_Usuario ALTER COLUMN Id_Tipo_Usuario SET DEFAULT nextval('tipo_usuario_autoincrement');
-- ACTUALIZAMOS LA COLUMNA INPTUID DE LA TABLA INPTUSER AGREGANDOLE LA SECUENCIA DE AUTOINCREMENT/
UPDATE
Agr_Tipo_Usuario
SET
Id_Tipo_Usuario = nextval('tipo_usuario_autoincrement');
-------------------------------------------------------------------------------------------------------
-- CREAMOS LA TABLA DE LOS PAÍSES Agr_Pais CON SUS RESPECTIVAS COLUMNAS
CREATE TABLE Agr_Pais (
--CREAMOS LA COLUMNA CON EL IDENTIFICADOR Id_Pais LA CUAL SERA LA CLAVE PRIMARIA DE LA TABLA
Id_Pais int PRIMARY KEY,
-- CREAMOS LA COLUMNA Nombre DE LA TABLA Agr_Pais 
Nombre varchar (30)
);
--------------------------------------------------------------------------------------------------------
-- CREAMOS LA TABLA DE LOS PROVINCIAS Agr_Provincia CON SUS RESPECTIVAS COLUMNAS
CREATE TABLE Agr_Provincia (
--CREAMOS LA COLUMNA CON EL IDENTIFICADOR Id_Provincia LA CUAL SERA LA CLAVE PRIMARIA DE LA TABLA
Id_Provincia int PRIMARY KEY,
-- CREAMOS LA COLUMNA Nombre DE LA TABLA Agr_Provincia 
Nombre varchar (30),
-- CREAMOS LA COLUMNA Id_Pais COMO CLAVE SECUNDARIA
Id_Pais int
);
---------------------------------------------------------------------------------------------------------
-- CREAMOS LA TABLA DE LOS CANTONES Agr_Canton CON SUS RESPECTIVAS COLUMNAS
CREATE TABLE Agr_Canton (
--CREAMOS LA COLUMNA CON EL IDENTIFICADOR Id_Canton LA CUAL SERA LA CLAVE PRIMARIA DE LA TABLA
Id_Canton int PRIMARY KEY,
-- CREAMOS LA COLUMNA Nombre DE LA TABLA Agr_Pais 
Nombre varchar (30),
-- CREAMOS LA COLUMNA Id_Provincia COMO CLAVE SECUNDARIA
Id_Provincia int
);
----------------------------------------------------------------------------------------------------------
-- CREAMOS LA TABLA DE LOS CANTONES Agr_Parroquia CON SUS RESPECTIVAS COLUMNAS
CREATE TABLE Agr_Parroquia (
--CREAMOS LA COLUMNA CON EL IDENTIFICADOR Id_Parroquia LA CUAL SERA LA CLAVE PRIMARIA DE LA TABLA
Id_Parroquia int PRIMARY KEY,
-- CREAMOS LA COLUMNA Nombre DE LA TABLA Agr_Pais 
Nombre varchar (30),
-- CREAMOS LA COLUMNA Id_Canton COMO CLAVE SECUNDARIA
Id_Canton int
);
-----------------------------------------------------------------------------------------------------------
-- A CONTINUACIÓN SE AGREGARÁ LAS LLAVES SECUNDARIAS A CADA UNA DE LAS TABLAS
-- A CONTINUACIÓN SE ALTERARÁ LA TABLA Agr_Usuario
ALTER TABLE Agr_Usuario
ADD CONSTRAINT fk_user_type FOREIGN KEY (Id_Tipo_Usuario) REFERENCES Agr_Tipo_Usuario (Id_Tipo_Usuario);

 -- ALTERAMOS LA TABLA Agr_Usuario PARA AGREGAR LA CLAVE SECUNDARIA EN LA COLUMNA Id_Parroquia DE LA TABLA Agr_Parroquia
ALTER TABLE Agr_Usuario
ADD CONSTRAINT fk_parroquia FOREIGN KEY (Id_Parroquia) REFERENCES Agr_Parroquia (Id_Parroquia);

 -- ALTERAMOS LA TABLA Agr_Provincia PARA AGREGAR LA CLAVE SECUNDARIA EN LA COLUMNA Id_Pais DE LA TABLA Agr_Pais
ALTER TABLE Agr_Provincia
ADD CONSTRAINT fk_provincia FOREIGN KEY (Id_Pais) REFERENCES Agr_Pais (Id_Pais);

 -- ALTERAMOS LA TABLA Agr_Canton PARA AGREGAR LA CLAVE SECUNDARIA EN LA COLUMNA Id_Provincia DE LA TABLA Agr_Provincia
ALTER TABLE Agr_Canton
ADD CONSTRAINT fk_canton FOREIGN KEY (Id_Provincia) REFERENCES Agr_Provincia (Id_Provincia);

 -- ALTERAMOS LA TABLA Arg_Parroquia PARA AGREGAR LA CLAVE SECUNDARIA EN LA COLUMNA Id_Canton DE LA TABLA Agr_Canton
ALTER TABLE Agr_Parroquia
ADD CONSTRAINT fk_parroquia FOREIGN KEY (Id_Canton) REFERENCES Agr_Canton (Id_Canton);