<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors',1);
/* Connexion à une base ODBC avec l'invocation de pilote */
$dsn = 'mysql:host=localhost;dbname=mini_twitter';
$user = 'root';
$password = '';
try {
    $bdd = new PDO($dsn, $user, $password);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Connexion échouée : ' . $e->getMessage();
}



if (!empty($_POST)) {
    var_dump($_POST);
    $req = $bdd->prepare('SELECT * FROM utilisateurs 
                   WHERE pseudo = :pseudo 
                   AND password = :password');
    $req->execute([
        ':pseudo' => $_POST['pseudo'],
        ':password' => md5(sha1($_POST['password']))
    ]);
    $users = $req->fetchAll();
    echo '<pre>';
    echo '</pre>';
    if(count($users) === 0){
        //header('location:inscription.php');
    }
    if(count($users) > 0){
        $_SESSION['connected'] = true;
        $_SESSION['id'] = $users[0]['id'];
        //header('Location:index.php');
    } else {
        echo 'Unknown';
        //header('location:inscription.php');
    }
}




if (!empty($_POST)){

    $requete = $bdd->prepare('INSERT INTO utilisateurs(nom, prenom, pseudo, email, password) VALUES(:nom, :prenom, :pseudo, :email, :password)');
    $requete->execute([
        ':nom' => $_POST['nom'],
        ':prenom' => $_POST['prenom'],
        ':pseudo' => $_POST['pseudo'],
        ':email' => $_POST['email'],
        ':password' => md5(sha1($_POST['password'])),
    ]);
}
