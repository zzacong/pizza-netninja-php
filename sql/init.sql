DROP USER IF EXISTS 'ninjapizza'@'localhost';

DROP DATABASE IF EXISTS `ninja_pizza`;

CREATE DATABASE `ninja_pizza`;

CREATE USER 'ninjapizza'@'localhost' IDENTIFIED BY 'password';
GRANT ALL ON ninja_pizza.* TO 'ninjapizza'@'localhost';

USE `ninja_pizza`;

DROP TABLE IF EXISTS `pizza`;

CREATE TABLE `pizza` (
  id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
  title VARCHAR(255) NOT NULL,
  ingredients VARCHAR(255) NOT NULL,
  email VARCHAR(255) NOT NULL,
  created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO `pizza` (
  title, ingredients, email
)
VALUES (
  'Hawaiian Pizza', 'cheese, pineapple,bacon', 'hawaiian@pizza.com'
)