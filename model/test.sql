CREATE DATABASE test;

USE test;

CREATE TABLE PERFIL(
id_perfil INT NOT NULL AUTO_INCREMENT UNIQUE PRIMARY KEY,
perfil VARCHAR (50) NOT NULL
);

CREATE TABLE USUARIO(
id_usuario INT NOT NULL AUTO_INCREMENT UNIQUE PRIMARY KEY,
id_perfil INT NOT NULL,
usuario VARCHAR (50) NOT NULL,
clave VARCHAR (50) NOT NULL,
nombres VARCHAR (50) NOT NULL,
ap_paterno VARCHAR (50) NOT NULL,
ap_materno VARCHAR (50) NOT NULL,
email VARCHAR (50) NOT NULL,
estado INT NOT NULL,
FOREIGN KEY (id_perfil) REFERENCES PERFIL (id_perfil)
);

INSERT INTO PERFIL (perfil ) VALUES ('Administrador');
INSERT INTO PERFIL (perfil ) VALUES ('Usuario normal');
INSERT INTO PERFIL (perfil ) VALUES ('Supervisor');


INSERT INTO USUARIO (id_perfil, usuario, clave, nombres, ap_paterno, ap_materno, email, estado) VALUES (1 , 'Mar', '123', 'Marcelo Andres', 'Aranda', 'Tatto', 'cheloz_20@hotmail.com', 1);
INSERT INTO USUARIO (id_perfil, usuario, clave, nombres, ap_paterno, ap_materno, email, estado) VALUES (1 , 'Fel', '456', 'Felipe Andres', 'Aranda', 'Benavides', 'bvds@hotmail.com', 1);
INSERT INTO USUARIO (id_perfil, usuario, clave, nombres, ap_paterno, ap_materno, email, estado) VALUES (1 , 'Jor', '789', 'Jorge Andres', 'Aranda', 'Slade', 'yolo@hotmail.com', 1);

/*
SELECT * FROM PERFIL;

SELECT * FROM USUARIO;
*/