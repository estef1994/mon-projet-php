-- Création de la base de données
CREATE DATABASE ProjetAuthentificationBDD;
-- Utilisation de la base de données
USE ProjetAuthentificationBDD;
-- Création de la table "users" pour stocker les informations des utilisateurs
CREATE TABLE users (
  idUser integer AUTO_INCREMENT,
  pseudo varchar(50),
  name varchar(100),
  surname varchar(100),
  email varchar(255) NOT NULL UNIQUE,
  password varchar(255) NOT NULL,
  PRIMARY KEY (idUser)
);

-- Création de l’utilisateur
CREATE USER 'user_php'@'localhost' IDENTIFIED BY '3f7zhhRn4NH69R’;
-- Attribution des droits sur la table "users"
GRANT SELECT, INSERT, UPDATE, DELETE ON ProjetAuthentificationBDD.users TO 'user_php'@'localhost';

-- Insertion des utilisateurs en BDD
--Le mot de passe de tous les utilisateurs est password123
INSERT INTO users (pseudo, name, surname, email, password)
VALUES ('john_doe', 'John', 'Doe', 'john.doe@example.com', '$2y$10$hv2m6oFnpMs6sZmpyNK1r.iWEJO/CU96h7b95VjYCC5Msw.lGdn8G');
INSERT INTO users (pseudo, name, surname, email, password)
VALUES ('jane_smith', 'Jane', 'Smith', 'jane.smith@example.com', '$2y$10$hv2m6oFnpMs6sZmpyNK1r.iWEJO/CU96h7b95VjYCC5Msw.lGdn8G');
INSERT INTO users (pseudo, name, surname, email, password)
VALUES ('test_user', 'Test', 'User', 'test@example.com', '$2y$10$hv2m6oFnpMs6sZmpyNK1r.iWEJO/CU96h7b95VjYCC5Msw.lGdn8G');