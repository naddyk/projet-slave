<?php

function getpseudo($id)
{
    global $bdd;
    $req = $bdd -> query('SELECT nom FROM connexion WHERE id= ' . (int) $id);
    $ses =  $req -> fetch();
    $pseudo = $ses ['prenom'];
    return $pseudo;
}

$query = $bdd -> query('SELECT * FROM connexion');
$users = $query->FetchAll();
foreach ($users as $user)
{
    echo 'div

               	'.getpseudo($user['id_user']) .'
               ' . $user['message'] . ' ';
                	
};


function valider($id){
    global $bdd;
    $bdd -> execute ('UPDATE connexion Set verif = 1 WHERE id_user=' .(int) $id);
}

function suprimer($id){
    global $bdd;
    $bdd -> execute ('DELETE FROM connexion WHERE id_user =' .(int) $id);
}