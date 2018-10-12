<?php
/*require("connexionbdd.php");

if(isset($_POST['formconnexion'])){
  $mail = htmlentities($_POST['mail']);
  $mdp = htmlentities($_POST['mdp']);
  if(isset($_POST['mail']) and isset($_POST['mdp'])){
    $req = $dbh->prepare('SELECT * FROM connexion1 WHERE mail = :mail AND mdp = :mdp');
    $req->execute([
      ':mail' => $_POST['mail'],
      ':mdp' => sha1(md5($_POST['mdp']))
    ]);

    $util = $req->fetch();

    if(isset($util['id_user'])) {
        $_SESSION['userconn'] = $util['id_user'];
        //header("Location: user.php");

        header("Location: user.php?id=".$_SESSION['userconn']);
    }
    else{
        echo "mauvais mot de passe ou mauvais identifiant";
    }
  }
  else{
    echo "Tous les champs doivent être rempli";
  }
}*/
?>



<?php 
require("connexionbdd.php");
if(isset($_POST['mail']) and isset($_POST['mdp'])) {
//$reponse = $bdd->query('SELECT id FROM utilisateurs');
    $req = $dbh->prepare('SELECT id_user FROM connexion1 WHERE mail = ? AND mdp = ?');
    $req->execute([$_POST['mail'], sha1(md5($_POST['mdp']))]);

    $d = $req->fetch();

    var_dump($d);
    if(isset($d['id_user'])) {
        $_SESSION['user-connecté'] = $d['id_user'];

        header('Location: user.php?id='.$_SESSION['user-connecté']);
    }
    else{
        echo "mauvais mot de passe ou mauvais identifiant";
    }
}
?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="script.css">
    <title>Connexion</title>
</head>
<body>
  <form action="connexion.php" method="post" name="formconnexion">
    <fieldset><legend><h3>Connexion</h3></legend>
    Adresse mail: <input type="text" name="mail" value="" placeholder="Entrez votre adresse mail"/><br />
    Mot de passe: <input type="password" name="mdp" value="" placeholder="Entrez votre mot de passe"/><br />    
    <input type="checkbox" name="permaconn" value="oui"/> Restez connecté
    <br />
    <input type="submit" value="Connexion"/>
    </fieldset>
  </form>
</body> 
</html>