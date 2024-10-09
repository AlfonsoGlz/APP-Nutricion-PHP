CREATE DATABASE proyecto_DB

USE proyecto_DB


-------------------------TABLA DE USUARIOS-----------------------------------------
CREATE TABLE usuarios(
id_usuario INT PRIMARY KEY IDENTITY(1,1),
nombre_completo VARCHAR(50) NOT NULL,
correo VARCHAR(50) NOT NULL UNIQUE,
usuario VARCHAR(30) NOT NULL,
contrasena VARCHAR(50) NOT NULL)

INSERT INTO usuarios(nombre_completo,correo,usuario,contrasena) VALUES('alfonso gonzalez','alfonsocornejo8085@gmail.com','poncho','abcd')

SELECT *FROM usuarios


-------------------------TABLA DE CATEGORIAS-----------------------------------------

CREATE TABLE categorias(
tipo_alimento_id INT PRIMARY KEY IDENTITY(1,1),
nombre VARCHAR(25) NOT NULL)

INSERT INTO categorias(nombre) VALUES('carnes');
INSERT INTO categorias(nombre) VALUES('legumbres');
INSERT INTO categorias(nombre) VALUES('frutos secos');
INSERT INTO categorias(nombre) VALUES('comida del mar');
INSERT INTO categorias(nombre) VALUES('huevos');
INSERT INTO categorias(nombre) VALUES('frutas');
INSERT INTO categorias(nombre) VALUES('verduras');
INSERT INTO categorias(nombre) VALUES('quesos y lacteos');
INSERT INTO categorias(nombre) VALUES('panes y cereales');
INSERT INTO categorias(nombre) VALUES('dulces y postres');
INSERT INTO categorias(nombre) VALUES('bebidas');

SELECT *FROM categorias

-------------------------TABLA DE ALIMENTOS-----------------------------------------

CREATE TABLE alimentos(
alimento_id INT PRIMARY KEY IDENTITY(1000,1),
tipo_alimento_id INT FOREIGN KEY REFERENCES categorias(tipo_alimento_id),
nombre_alimento VARCHAR(80) NOT NULL,
cantidad INT NOT NULL,
unidad VARCHAR(25) NOT NULL)


INSERT INTO alimentos(tipo_alimento_id,nombre_alimento,cantidad,unidad) VALUES(2,'Alubia cocida (chica o grande)',1,'taza')
INSERT INTO alimentos(tipo_alimento_id,nombre_alimento,cantidad,unidad) VALUES(3,'Almendras',100,'gramos')
INSERT INTO alimentos(tipo_alimento_id,nombre_alimento,cantidad,unidad) VALUES(3,'Nuez cruda',100,'gramos')
INSERT INTO alimentos(tipo_alimento_id,nombre_alimento,cantidad,unidad) VALUES(3,'Nuez de la India',100,'gramos')
INSERT INTO alimentos(tipo_alimento_id,nombre_alimento,cantidad,unidad) VALUES(3,'Avellanas',100,'gramos')
INSERT INTO alimentos(tipo_alimento_id,nombre_alimento,cantidad,unidad) VALUES(3,'Pistachos',100,'gramos')
INSERT INTO alimentos(tipo_alimento_id,nombre_alimento,cantidad,unidad) VALUES(3,'Macadamias',100,'gramos')
INSERT INTO alimentos(tipo_alimento_id,nombre_alimento,cantidad,unidad) VALUES(3,'Nuez de Brasil',100,'gramos')

INSERT INTO alimentos(tipo_alimento_id,nombre_alimento,cantidad,unidad) VALUES(4,'Salmon',100,'gramos')
INSERT INTO alimentos(tipo_alimento_id,nombre_alimento,cantidad,unidad) VALUES(4,'Atun rojo',100,'gramos')
INSERT INTO alimentos(tipo_alimento_id,nombre_alimento,cantidad,unidad) VALUES(4,'Atun aleta amarilla',100,'gramos')
INSERT INTO alimentos(tipo_alimento_id,nombre_alimento,cantidad,unidad) VALUES(4,'Atun aleta amarilla',100,'gramos')
INSERT INTO alimentos(tipo_alimento_id,nombre_alimento,cantidad,unidad) VALUES(4,'Bacalao',100,'gramos')
INSERT INTO alimentos(tipo_alimento_id,nombre_alimento,cantidad,unidad) VALUES(4,'Filete de merluza',45,'gramos')
INSERT INTO alimentos(tipo_alimento_id,nombre_alimento,cantidad,unidad) VALUES(4,'Rodaballo',100,'gramos')
INSERT INTO alimentos(tipo_alimento_id,nombre_alimento,cantidad,unidad) VALUES(4,'Arenque',100,'gramos')
INSERT INTO alimentos(tipo_alimento_id,nombre_alimento,cantidad,unidad) VALUES(4,'Anchoas',100,'gramos')
INSERT INTO alimentos(tipo_alimento_id,nombre_alimento,cantidad,unidad) VALUES(4,'Sardina enlatada',100,'gramos')
INSERT INTO alimentos(tipo_alimento_id,nombre_alimento,cantidad,unidad) VALUES(4,'Calamar',100,'gramos')

INSERT INTO alimentos(tipo_alimento_id,nombre_alimento,cantidad,unidad) VALUES(6,'Manzana sin cascara',100,'gramos')
INSERT INTO alimentos(tipo_alimento_id,nombre_alimento,cantidad,unidad) VALUES(6,'Platano',100,'gramos')
INSERT INTO alimentos(tipo_alimento_id,nombre_alimento,cantidad,unidad) VALUES(6,'Naranja cruda',100,'gramos')
INSERT INTO alimentos(tipo_alimento_id,nombre_alimento,cantidad,unidad) VALUES(6,'Limon sin cascara',100,'gramos')
INSERT INTO alimentos(tipo_alimento_id,nombre_alimento,cantidad,unidad) VALUES(6,'Uva americana',100,'gramos')
INSERT INTO alimentos(tipo_alimento_id,nombre_alimento,cantidad,unidad) VALUES(6,'Fresas',100,'gramos')
INSERT INTO alimentos(tipo_alimento_id,nombre_alimento,cantidad,unidad) VALUES(6,'Melon cantalupo',100,'gramos')
INSERT INTO alimentos(tipo_alimento_id,nombre_alimento,cantidad,unidad) VALUES(6,'Melon verde',100,'gramos')
INSERT INTO alimentos(tipo_alimento_id,nombre_alimento,cantidad,unidad) VALUES(6,'Sandia',100,'gramos')
INSERT INTO alimentos(tipo_alimento_id,nombre_alimento,cantidad,unidad) VALUES(6,'Pina',100,'gramos')
INSERT INTO alimentos(tipo_alimento_id,nombre_alimento,cantidad,unidad) VALUES(6,'Aguacate',100,'gramos')

INSERT INTO alimentos(tipo_alimento_id,nombre_alimento,cantidad,unidad) VALUES(7,'Zanahoria',100,'gramos')
INSERT INTO alimentos(tipo_alimento_id,nombre_alimento,cantidad,unidad) VALUES(7,'Tomate verde',100,'gramos')
INSERT INTO alimentos(tipo_alimento_id,nombre_alimento,cantidad,unidad) VALUES(7,'Brocoli',100,'gramos')
INSERT INTO alimentos(tipo_alimento_id,nombre_alimento,cantidad,unidad) VALUES(7,'Espinaca cruda',100,'gramos')
INSERT INTO alimentos(tipo_alimento_id,nombre_alimento,cantidad,unidad) VALUES(7,'Lechuga',100,'gramos')
INSERT INTO alimentos(tipo_alimento_id,nombre_alimento,cantidad,unidad) VALUES(7,'Pepino con cascara',100,'gramos')
INSERT INTO alimentos(tipo_alimento_id,nombre_alimento,cantidad,unidad) VALUES(7,'Pimiento ancho',100,'gramos')
INSERT INTO alimentos(tipo_alimento_id,nombre_alimento,cantidad,unidad) VALUES(7,'Cebolla cruda',100,'gramos')
INSERT INTO alimentos(tipo_alimento_id,nombre_alimento,cantidad,unidad) VALUES(7,'Coliflor',100,'gramos')
INSERT INTO alimentos(tipo_alimento_id,nombre_alimento,cantidad,unidad) VALUES(7,'Apio',100,'gramos')

INSERT INTO alimentos(tipo_alimento_id,nombre_alimento,cantidad,unidad) VALUES(8,'Queso amarillo',2,'reb')
INSERT INTO alimentos(tipo_alimento_id,nombre_alimento,cantidad,unidad) VALUES(8,'Queso canasto',30,'gramos')
INSERT INTO alimentos(tipo_alimento_id,nombre_alimento,cantidad,unidad) VALUES(8,'Queso chihuahua',25,'gramos')
INSERT INTO alimentos(tipo_alimento_id,nombre_alimento,cantidad,unidad) VALUES(8,'Queso cotija',30,'gramos')
INSERT INTO alimentos(tipo_alimento_id,nombre_alimento,cantidad,unidad) VALUES(8,'Queso de cabra suave',35,'gramos')
INSERT INTO alimentos(tipo_alimento_id,nombre_alimento,cantidad,unidad) VALUES(8,'Queso gouda',30,'gramos')
INSERT INTO alimentos(tipo_alimento_id,nombre_alimento,cantidad,unidad) VALUES(8,'Queso manchego',25,'gramos')
INSERT INTO alimentos(tipo_alimento_id,nombre_alimento,cantidad,unidad) VALUES(8,'Queso mozarella',35,'gramos')

INSERT INTO alimentos(tipo_alimento_id,nombre_alimento,cantidad,unidad) VALUES(9,'Arroz',100,'gramos')
INSERT INTO alimentos(tipo_alimento_id,nombre_alimento,cantidad,unidad) VALUES(9,'Trigo germinado',100,'gramos')
INSERT INTO alimentos(tipo_alimento_id,nombre_alimento,cantidad,unidad) VALUES(9,'Avena cocida',1,'taza')



DELETE FROM alimentos WHERE alimento_id = 1173 

Update alimentos Set nombre_alimento='Alverjon o chicharo seco cocido' Where nombre_alimento='Alverjón o chicharo seco cocido'

SELECT *FROM alimentos


-------------------------TABLA DE NUTRIENTES-----------------------------------------
CREATE TABLE nutrientes(
alimento_id INT FOREIGN KEY REFERENCES alimentos(alimento_id),
calorias DECIMAL(7,2) NOT NULL,
proteinas DECIMAL(7,2) NOT NULL,
carbohidratos DECIMAL(7,2) NOT NULL,
grasas DECIMAL(7,2) NOT NULL,
sodio DECIMAL(7,2) NOT NULL,
vitamina_a DECIMAL(7,2) DEFAULT 0, 
vitamina_b9 DECIMAL(7,2) DEFAULT 0,
vitamina_b12 DECIMAL(7,2) DEFAULT 0, 
vitamina_c DECIMAL(7,2) DEFAULT 0, 
vitamina_d DECIMAL(7,2) DEFAULT 0, 
hierro DECIMAL(7,2) DEFAULT 0, 
calcio DECIMAL(7,2) DEFAULT 0,
magnesio DECIMAL(7,2) DEFAULT 0,
zinc DECIMAL(7,2) DEFAULT 0,
potasio DECIMAL(7,2) DEFAULT 0,
fibra DECIMAL(7,2) DEFAULT 0
)

SELECT *FROM nutrientes

SELECT calorias, proteinas, carbohidratos, grasas FROM nutrientes WHERE alimento_id = 1000

--------CONSULTAS-------


SELECT 
    a.nombre_alimento,
    a.cantidad,
    a.unidad,
    n.calorias,
    n.proteinas,
    n.carbohidratos,
    n.grasas,
    n.sodio,
    n.vitamina_a,
    n.vitamina_b9,
    n.vitamina_b12,
    n.vitamina_c,
    n.vitamina_d,
    n.hierro,
    n.calcio,
    n.magnesio,
    n.zinc,
    n.potasio,
    n.fibra
FROM 
    alimentos a
JOIN 
    nutrientes n ON a.alimento_id = n.alimento_id
JOIN
    categorias c ON a.tipo_alimento_id = c.tipo_alimento_id
WHERE
    c.nombre = 'panes y cereales';
















SELECT 
    a.nombre_alimento,
    n.vitamina_a,
    n.vitamina_b9,
    n.vitamina_b12,
    n.vitamina_c,
    n.vitamina_d,
    n.hierro,
    n.calcio,
    n.magnesio,
    n.zinc,
    n.potasio,
    n.fibra
FROM 
    alimentos a
JOIN 
    nutrientes n ON a.alimento_id = n.alimento_id
WHERE
    a.nombre_alimento = 'aguayon'


-------------------------TABLA DE DESAYUNO-----------------------------------------

CREATE TABLE desayuno(
id_usuario INT FOREIGN KEY REFERENCES usuarios(id_usuario),
alimento_id INT FOREIGN KEY REFERENCES alimentos(alimento_id),
alimento_d VARCHAR(80),
cantidad_d INT,
unidad_d VARCHAR(25),
calorias_d DECIMAL(7,2),
proteinas_d DECIMAL(7,2),
carbohidratos_d DECIMAL(7,2),
grasas_d DECIMAL(7,2)
)

INSERT INTO desayuno (id_usuario, alimento_id, cantidad_d, unidad_d, calorias_d, proteinas_d, carbohidratos_d, grasas_d)
VALUES (1,1000,100,'GRAMOS',100,150,120,22)

SELECT calorias_d, proteinas_d, carbohidratos_d, grasas_d FROM desayuno WHERE id_usuario=1

SELECT SUM(calorias_d)
FROM desayuno
WHERE id_usuario=1

SELECT
  SUM(calorias_d) AS TotalCalorias,
  SUM(proteinas_d) AS TotalProteinas,
  SUM(carbohidratos_d) AS TotalCarbohidratos,
  SUM(grasas_d) AS TotalGrasas
FROM desayuno
WHERE id_usuario = 1;


SELECT *FROM desayuno

DELETE FROM desayuno WHERE alimento_id = 1000 AND id_usuario = 1

TRUNCATE TABLE desayuno


DROP TABLE desayuno


-------------------------TABLA DE COMIDA-----------------------------------------

CREATE TABLE comida(
id_usuario INT FOREIGN KEY REFERENCES usuarios(id_usuario),
alimento_id INT FOREIGN KEY REFERENCES alimentos(alimento_id),
alimento_c VARCHAR(80),
cantidad_c INT,
unidad_c VARCHAR(25),
calorias_c DECIMAL(7,2),
proteinas_c DECIMAL(7,2),
carbohidratos_c DECIMAL(7,2),
grasas_c DECIMAL(7,2)
)

INSERT INTO comida(id_usuario, alimento_id, cantidad_c, unidad_c, calorias_c, proteinas_c, carbohidratos_c, grasas_c)
VALUES (1,1000,100,'GRAMOS',100,150,120,22)

SELECT id_usuario, alimento_id, alimento_c, cantidad_c, unidad_c, calorias_c, proteinas_c, carbohidratos_c, grasas_c FROM comida WHERE id_usuario=1

SELECT
  SUM(calorias_c) AS TotalCalorias,
  SUM(proteinas_c) AS TotalProteinas,
  SUM(carbohidratos_c) AS TotalCarbohidratos,
  SUM(grasas_c) AS TotalGrasas
FROM comida
WHERE id_usuario = 1;

TRUNCATE TABLE comida
DROP TABLE comida


-------------------------TABLA DE CENA-----------------------------------------

CREATE TABLE cena(
id_usuario INT FOREIGN KEY REFERENCES usuarios(id_usuario),
alimento_id INT FOREIGN KEY REFERENCES alimentos(alimento_id),
alimento_cna VARCHAR(80),
cantidad_cna INT,
unidad_cna VARCHAR(25),
calorias_cna DECIMAL(7,2),
proteinas_cna DECIMAL(7,2),
carbohidratos_cna DECIMAL(7,2),
grasas_cna DECIMAL(7,2)
)

INSERT INTO cena(id_usuario, alimento_id, cantidad_cna, unidad_cna, calorias_cna, proteinas_cna, carbohidratos_cna, grasas_cna)
VALUES (1,1000,100,'GRAMOS',100,150,120,22)

SELECT id_usuario, alimento_id, alimento_cna, cantidad_cna, unidad_cna, calorias_cna, proteinas_cna, carbohidratos_cna, grasas_cna FROM cena WHERE id_usuario=1

SELECT
  SUM(calorias_cna) AS TotalCalorias,
  SUM(proteinas_cna) AS TotalProteinas,
  SUM(carbohidratos_cna) AS TotalCarbohidratos,
  SUM(grasas_cna) AS TotalGrasas
FROM cena
WHERE id_usuario = 1;

TRUNCATE TABLE cena
DROP TABLE cena 


-------------------------TABLA DE SNACK-----------------------------------------

CREATE TABLE snack(
id_usuario INT FOREIGN KEY REFERENCES usuarios(id_usuario),
alimento_id INT FOREIGN KEY REFERENCES alimentos(alimento_id),
alimento_s VARCHAR(80),
cantidad_s INT,
unidad_s VARCHAR(25),
calorias_s DECIMAL(7,2),
proteinas_s DECIMAL(7,2),
carbohidratos_s DECIMAL(7,2),
grasas_s DECIMAL(7,2)
)

INSERT INTO snack(id_usuario, alimento_id, cantidad_s, unidad_s, calorias_s, proteinas_s, carbohidratos_s, grasas_s)
VALUES (1,1000,100,'GRAMOS',100,150,120,22)

SELECT id_usuario, alimento_id, alimento_s, cantidad_s, unidad_s, calorias_s, proteinas_s, carbohidratos_s, grasas_s FROM snack WHERE id_usuario=1

SELECT
  SUM(calorias_s) AS TotalCalorias,
  SUM(proteinas_s) AS TotalProteinas,
  SUM(carbohidratos_s) AS TotalCarbohidratos,
  SUM(grasas_s) AS TotalGrasas
FROM snack
WHERE id_usuario = 1;

TRUNCATE TABLE snack
DROP TABLE snack






