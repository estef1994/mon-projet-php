Système d'authentification PHP / MySQL

 Description
Projet de système d’authentification développé en PHP et MySQL.  
Il permet l’inscription, la connexion et la vérification sécurisée des utilisateurs via un système de hash de mot de passe.



Fonctionnalités

- Inscription utilisateur (register)
- Connexion utilisateur (login)
- Vérification des mots de passe avec `password_hash` / `password_verify`
- Gestion des utilisateurs en base de données MySQL
- Requêtes sécurisées avec PDO et requêtes préparées


 Technologies utilisées

- PHP (PDO)
- MySQL
- HTML5
- CSS3 (si utilisé)
- JavaScript (si utilisé)



 Structure du projet

-login.php
-loginPost.php
-register.php
-registerPost.php
-test.php
-database.sql

Sécurité

- Mots de passe hashés avec `password_hash()`
- Vérification avec `password_verify()`
- Requêtes SQL préparées (PDO)


Installation

1 - https://github.com/estef1994/mon-projet-php

2  - Importer la base de données MySQL

3 - Configurer la connexion dans les fichiers PHP :
```php
$dsn = "mysql:host=localhost;dbname=ProjetAuthentificationBDD;charset=utf8";
$username = "root";
$password = "";

php -S localhost:8000


Auteur

Projet réalisé dans le cadre d’une formation Développeur Web.