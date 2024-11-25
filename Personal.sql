CREATE DATABASE personal;
USE personal;

CREATE TABLE roles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL
);

CREATE TABLE modulos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL
);

CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    contraseña VARCHAR(100) NOT NULL
);

CREATE TABLE Usuarios_Roles (
    usuario_id INT,
    rol_id INT,
    PRIMARY KEY (usuario_id, rol_id),
    FOREIGN KEY (usuario_id) REFERENCES Usuarios(id) ON DELETE CASCADE,
    FOREIGN KEY (rol_id) REFERENCES Roles(id) ON DELETE CASCADE
);

CREATE TABLE Roles_Modulos (
    rol_id INT,
    modulo_id INT,
    PRIMARY KEY (rol_id, modulo_id),
    FOREIGN KEY (rol_id) REFERENCES Roles(id) ON DELETE CASCADE,
    FOREIGN KEY (modulo_id) REFERENCES Modulos(id) ON DELETE CASCADE
);
