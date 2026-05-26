<?php

$dsn = 'mysql:host=localhost;dbname=ProjetAuthentificationBDD;charset=utf8';
$username = 'root';
$password = '';

try {
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $emailForm = $_POST['email'] ?? '';
    $passwordForm = $_POST['password'] ?? '';

    $query = "SELECT * FROM users WHERE email = :email";
    $stmt = $pdo->prepare($query);
    $stmt->execute(['email' => $emailForm]);

    $monUser = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($monUser) {

        if (password_verify($passwordForm, $monUser['password'])) {
            echo "Connexion réussie ! Bienvenue " . $monUser['name'] . " " . $monUser['surname'];
        } else {
            echo "Mot de passe incorrect";
        }

    } else {
        echo "Utilisateur introuvable, êtes-vous sûr de votre mail ?";
    }

} catch (PDOException $e) {
    echo "Erreur de connexion à la base de données : " . $e->getMessage();
}

?>