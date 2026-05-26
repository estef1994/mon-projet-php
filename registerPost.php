<?php
$dsn = 'mysql:host=localhost;dbname=ProjetAuthentificationBDD;charset=utf8';
$username = 'root';
$password = '';
try{
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //Récupérer les données du formulaire d’inscription 
    $nameForm = $_POST['name'];
    $surnameForm = $_POST['surname'];
    $pseudoForm = $_POST['pseudo'];
    $emailForm = $_POST['email'];
    $passwordForm = $_POST['password'];
    //Vérifier l’unicité de l’adresse mail
    $query = "SELECT * FROM users WHERE email = :email";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':email', $emailForm);
    $stmt->execute();
    //Est-ce que l’utilisateur (mail) existe ?
    if($stmt->rowCount() > 0){
        die("Cette adresse email est déjà utilisée");
    }
    // Hashage(encryptage)
    $hashedPassword = password_hash($passwordForm, PASSWORD_DEFAULT);
    //Insérer les données dans la base 
    $insertQuery = "INSERT INTO users (pseudo, name, surname, email, password) VALUES (:pseudo, :name, :surname, :email, :password)";
    $stmt = $pdo->prepare($insertQuery);
    $stmt->bindParam(':pseudo', $pseudoForm);
    $stmt->bindParam(':name', $nameForm);
    $stmt->bindParam(':surname', $surnameForm);
    $stmt->bindParam(':email', $emailForm);
    $stmt->bindParam(':password', $hashedPassword);
    $stmt->execute();
    echo "Inscription réussie";
}
catch (PDOException $e){
    echo "Erreur lors de l’inscription : ". $e->getMessage();
}
?>
