# Proyecto1

COMANDOS (Esto se quitara antes de enviarlo)

Instalaciones

sudo apt updatesudo apt install apache2

sudo apt install php libapache2-mod-php php-mysql php-common php-cli
sudo apt install mysql-server


Configuracion post instalación

sudo systemctl start apache2
sudo systemctl start mysql
sudo systemctl enable apache2
sudo systemctl enable mysql


Creacion de carpeta
sudo mkdir -p /var/www/html/


Instalacion del git

sudo apt install git -y

sudo git clone (repositorio) (/var/www/html)
cd /var/www/html
sudo rmdir Codigo

sudo chown -R www-data:www-data app
sudo chown 755 app


Para meterse en la web 

http://localhost/app/index.php


Mysql

CREATE DATABASE crud_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

USE crud_db;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL
);
