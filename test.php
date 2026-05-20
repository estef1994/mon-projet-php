<?php 
$dsn = 'mysql:host=localhost;dbname=ProjetAuthentificationBDD';
$username =  'user_php';
$password =  '3f7zhhRn4NH69R'; 
$pdo = new PDO ($dsn, $username , $password);

// preparer la rêquete et attrapper les erreurs de connexion
try {
$pdo -> setAttribute (PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// executer la rêquete 
$query =  'SELECT* FROM users';
$statement = $pdo -> query ($query);
$users = $statement -> fetchAll (PDO::FETCH_ASSOC);

// recuperer les utilisateurs
foreach ($users as $user){
    echo "ID : " . $user['idUser'] . "<br>";
        echo "Nom : " . $user['name'] . "<br>";
        echo "Prenom : " . $user['surname'] . "<br>";
        echo "email : " . $user['email'] . "<br>";
        echo "<br>";
}

}
catch (PDOException $e){
    echo "Erreur de connexion à la base de données : ". $e->getMessage();
}

?>