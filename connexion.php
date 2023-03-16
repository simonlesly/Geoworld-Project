<?php
function authentification($login, $mdp) {
    // Connexion à la base de données
    $connexion = mysqli_connect("localhost", "root", " ", "identification");
 
    // Vérification des erreurs de connexion
    if (mysqli_connect_errno()) {
       echo "Échec de la connexion à MySQL : " . mysqli_connect_error();
    }
 
    // Requête pour récupérer les informations d'identification de l'utilisateur
    $requete = "SELECT * FROM utilisateurs WHERE login = '".$login."' AND mdp = '".$mdp."'";
 
    // Exécution de la requête
    $resultat = mysqli_query($connexion, $requete);
 
    // Vérification du résultat de la requête
    if(mysqli_num_rows($resultat) == 1) {
       return true; // L'utilisateur est authentifié
    } else {
       return false; // L'utilisateur n'est pas authentifié
    }
 
    // Fermeture de la connexion
    mysqli_close($connexion);
 }
 ?>
 