<?php
 require_once('connection.php');
 require_once('fonctions.php');
 // on teste si nos variables sont définies et remplies
 if (isset($_POST['login']) && isset($_POST['pwd']) && !empty($_POST['login'])&& !
empty($_POST['pwd'])) {
 // on appele la fonction getAuthentification en lui passant en paramètre le login et password
 //la fonction retourne les caractéristiques du salaries si il est connu sinon elle retourne false
 $result = getAuthentification($_POST['login'],$_POST['pwd']);
 
 // si le résulat n'est pas false
 if($result){

// on redirige notre visiteur vers une page de notre section membre
header ('location: bouton.php');

 }
 //si le résultat est false on redirige vers la page d'authentification
 else{
 header ('location: bouton.php');
 }
 }

 //si nos variables ne sont pas renseignées on redirige vers la page d'authentification
 else {
 header ('location: bouton.php');
 }
 ?> 