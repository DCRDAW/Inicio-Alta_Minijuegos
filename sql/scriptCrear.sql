-- BASE DE DATOS
-- ELIMINAR BASE DE DATOS SI EXISTE
DROP DATABASE IF EXISTS RegistroMinijuego;
-- CREAR BASE DE DATOS
CREATE DATABASE minijuego DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;
-- SELECCIONAR LA BASE DE DATOS
USE minijuego;

CREATE TABLE usuario(
    idUsuario smallint UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nick varchar(100) NOT NULL,
    correo varchar(100) NOT NULL UNIQUE,
    password varchar(20) NOT NULL
);


CREATE TABLE minijuego(
    idMinijuego tinyint UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nombre varchar(20) NOT NULL,
    url varchar(100) NOT NULL
);

CREATE TABLE preferencias(
    idUsuario smallint UNSIGNED NOT NULL,
    idMinijuego tinyint UNSIGNED NOT NULL,
    CONSTRAINT FK_idUsuario FOREIGN KEY (idUsuario) REFERENCES usuario(idUsuario),
    CONSTRAINT FK_idMinijuego FOREIGN KEY (idMinijuego) REFERENCES miniJuego(idMinijuego),
    CONSTRAINT PK_preferencia PRIMARY KEY (idUsuario, idMinijuego)
);