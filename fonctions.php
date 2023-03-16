<?php
 require_once('connection.php');
 
function getAuthentification($login,$pass){
 global $pdo;
 $query = "SELECT login,mdp FROM utilisateurs, logutili WHERE utilisateurs.id = logutili.idUtili and login=:login AND mdp=:pass";
 $prep = $pdo->prepare($query);
 $prep->bindValue(':login', $login);
 $prep->bindValue(':pass', $pass);
 $prep->execute();
 // on vérifie que la requête ne retourne qu'une seule ligne
 if($prep->rowCount() == 1){
 $result = $prep->fetch(); 
 return $result;
 }
 else
 return false;
}

function getInfoCountry($id){
    global $pdo;
    $requete = "SELECT * FROM country where id = :id";
    try{
    $prep = $pdo->prepare($requete);
    $prep->bindParam(':id', $id, PDO::PARAM_INT);
    $prep->execute();
    $result = $prep->fetch();
    return $result;
    }
    catch ( Exception $e ) {
    die ("erreur dans la requete ".$e->getMessage());
    }
   }
?>