CREATE DATABASE nooficios_db;

USE nooficios_db;

CREATE TABLE registros (
  id INT AUTO_INCREMENT PRIMARY KEY,
  persona VARCHAR(100),
  area VARCHAR(100),
  asunto VARCHAR(255),
  asunto VARCHAR(255),
  hash VARCHAR(64)
);

CREATE TABLE acuerdo (
  id INT AUTO_INCREMENT PRIMARY KEY,
  considerando VARCHAR(100),
  seSolicita VARCHAR(100),
  notas VARCHAR(255),
  fecha VARCHAR(255),
  hash VARCHAR(64)
);




-- agregar dos registros
CREATE TABLE `usuarios` (
  `numero` int(10) not null,
  `nombre` text COLLATE utf8mb4_spanish2_ci NOT NULL,
  `nombre_usuario` text COLLATE utf8mb4_spanish2_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;
ALTER TABLE `usuarios` 
CHANGE COLUMN `numero` `numero` INT(10) NOT NULL AUTO_INCREMENT ,
ADD PRIMARY KEY (`numero`);