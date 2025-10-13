# Proyecto1

## Instalaciones de los programas requeridos

sudo apt update
<img>
sudo apt install apache2
<img>
sudo apt install php libapache2-mod-php php-mysql php-common php-cli
<img>
sudo apt install mysql-server
<img>

Configuracion post instalación

sudo systemctl start apache2
sudo systemctl enable apache2
<img>

sudo systemctl start mysql
sudo systemctl enable mysql
<img>

## Instalacion del git

sudo apt install git -y
<img>

sudo git clone (repositorio) (/var/www/html)
cd /var/www/html
<img>

Se le ha de dar parmisos al 
sudo chown -R www-data:www-data app
sudo chown 755 app
<img>

## Base de datos

Crearemos la base de datos con el mysql

Mysql
<img> (por plantear de añadir)

CREATE DATABASE crud_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

USE crud_db;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL
);

<img>

## Web
Para poder entrar en la web tendremos que usar el 
http://192.168.50.1/app/index.php
<img>
