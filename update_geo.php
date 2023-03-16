<!DOCTYPE html>
<html>
<head>	
		<cente>
			<h1>Mise à jour de la basse de donnée Geoworld</h1>
		</cente>  
</head> 

<?php
require_once('connect-db.php');
//on récupère et on vérifie les données reçues par le formulaire
if ( isset($_GET['id']) && !empty($_GET['id'])){
$id = $_GET['id'] ;
}
// à faire sur chaque donnée reçue
$Population = $_GET['Population'];
$GovernmentForm = $_GET['GovernmentForm '];
$HeadOfState = $_GET['HeadOfState'];

// on rédige la requête SQL
$sql = "UPDATE country
set Population=:Population, GovernmentForm=:GovernmentForm, HeadOfState=:HeadOfState
where id=:id";
try {
//on prépare la requête avec les données reçues
$statement = $pdo->prepare($sql);
$statement->bindParam(':Population ', $Population , PDO::PARAM_INT);
$statement->bindParam(':GovernmentForm', $GovernmentForm, PDO::PARAM_STR);
$statement->bindParam(':HeadOfState', $HeadOfState, PDO::PARAM_STR);
$statement->bindParam(':id', $id, PDO::PARAM_INT);
$statement->execute();
//On renvoie vers la liste des salaries
 header("Location:index.php");
}
catch(PDOException $e){
 echo 'Erreur : '.$e->getMessage();
}
?>

   