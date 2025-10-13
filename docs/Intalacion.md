# Proyecto1

## Instalaciones de los programas requeridos

sudo apt update 

![imagen](../imagenes/add_user.png)

sudo apt install apache2

![imagen](../Install_apache2.png)

Instalacion del php y requeridos

![imagen](../imagenes/install_php.png)

sudo apt install mysql-server

![imagen](../imagenes/install_sql.png)

Configuracion post instalación

sudo systemctl start apache2
sudo systemctl enable apache2

![imagen](../imagenes/iniciar_apache.png)

sudo systemctl start mysql
sudo systemctl enable mysql

![imagen](../imagenes/iniciar_sql.png)

## Instalacion del git

sudo apt install git -y

![imagen](../imagenes/install_git.png)

sudo git clone (repositorio) (/var/www/html)
cd /var/www/html

![imagen](../imagenes/.png)

Se le ha de dar parmisos al 
sudo chown -R www-data:www-data app
sudo chown 755 app
<img>

## Base de datos

Crearemos la base de datos con el mysql

Mysql
![imagen](../imagenes/sql.png)

CREATE DATABASE crud_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

USE crud_db;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL
);

![imagen](../imagenes/base_datos.png)

## Web
Para poder entrar en la web tendremos que usar el 
http://192.168.50.1/app/dbtest.php

![imagen](../imagenes/web1.png)
