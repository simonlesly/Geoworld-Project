<?php
require_once('connexion_admin.php');
//on récupère et on vérifie les données reçues par le formulaire
if ( isset($_GET['id']) && !empty($_GET['id'])){
$id = $_GET['id'] ;
}
// à faire sur chaque donnée reçue
$Statut = $_GET['Statut'];

// on rédige la requête SQL
$sql = "UPDATE droitutili 
set Statut=:Statut
where idlog=:id";
try {
//on prépare la requête avec les données reçues
$statement = $pdo->prepare($sql);
$statement->bindParam(':Statut', $Statut, PDO::PARAM_STR);
$statement->bindParam(':id', $id, PDO::PARAM_INT);
$statement->execute();
//On renvoie vers la liste des salaries
 header("Location:listeStatut.php");
}
catch(PDOException $e){
 echo 'Erreur : '.$e->getMessage();
}
?>