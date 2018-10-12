<?php 
require("connexionbdd.php");

if (!empty($_POST['mail'])) {

    $pwd1 = htmlspecialchars($_POST['mdp']);
    $pwd2 = htmlspecialchars($_POST['confirm']);
    if (($pwd1 == $pwd2)) {
//Etapes de stockage pour l'enrégistrement dans la bdd
        $nom = htmlspecialchars($_POST['nom']);
        $prenom = htmlspecialchars($_POST['prenom']);
        $mail = htmlspecialchars($_POST['mail']);
//crypter le mdp
        $pwd1 = sha1(md5($pwd1));

//insertion dans la bdd, id est en auto-increment, dont on ne doit le remplir d'aucune donnée
        $dbh->query("INSERT INTO connexion1 VALUES('','$nom','$prenom','$mail','$pwd1')");
        header('Location: connexion.php');
    } else {
        echo '<h1 style="color: red">';
        echo 'Les deux mots de passe que vous avez rentrés ne correspondent pas…';
        echo '</h1>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="script.css">
  <title>Inscription</title>
</head>
<body>
    <form action="inscription.php" method="post" name="formulaire">
    <fieldset><legend><h3>Inscription</h3></legend>
    Nom: <input type="text" name="nom" value="" placeholder="Entrez votre nom"/><br />      
    Prénom: <input type="text" name="prenom" value="" placeholder="Entrez votre prénom"/><br />
    Email: <input type="text" name="mail" value="" placeholder="Entrez votre mail"/><br />    
    Mot de passe: <input type="password" name="mdp" value="" placeholder="Entrez votre mot de passe"/><br />
    Confirmer le mot de passe: <input type="password" name="confirm" value="" placeholder="Confirmez le mot de passe"/><br />           
    Sexe: <input type="radio" name="sexe" value="F"/>Femme
    <input type="radio" name="sexe" value="M"/>Homme
    <br />
    Pays:
    <select name="pays">
      <option value="usa">Etats-Unis</option>      
      <option value="cameroun">Cameroun</option>
      <option value="france">France</option>
      <option value="belgique">Belgique</option>
      <option value="suisse">Suisse</option>
      <option value="canada">Canada</option>
      <option value="mali">Mali</option>
      <option value="senegal">Senegal</option>
      <option value="congo">Congo</option>
      <option value="togo">Togo</option>
      <option value="tunisie">Tunisie</option>
      <option value="angleterre">Angleterre</option>
      <option value="allemagne">Allemagne</option>  
      <option value="martinique">Martinique</option> 
      <option value="guadeloupe">Guadeloupe</option>
      <option value="algerie">Algerie</option>       
      <option value="egypte">Egypte</option>
      <option value="japon">Japon</option>
      <option value="chine">Chine</option>
      <option value="autres">Autres</option>   
    </select>
    <br />
    <input type="checkbox" name="newsletter" value="oui"/><a href="">Acceptez les conditions d'utilisations</a>
    <br />
    <input type="submit" value="Inscription"/>
    </fieldset>
    </form>
    Déja inscrit? <a href="connexion1.php">Connexion</a>

</body>
</html>