
<link rel="stylesheet" href="modele.css" />
<?php
 require("fonctionUtilisateurs.php");



 //on récupère et on vérifie que l'id figure dans l'URL
if ( isset($_GET['id']) && !empty($_GET['id'])){
 $id = $_GET['id'] ;
 $Statut = getStatut($id);
}
?>
<form action="updateStatut.php" method="get" >
<fieldset>
<legend> <i>utilisateurs</i></legend>
Statut:
<input type="text" name="Statut" required value="<?php echo $Statut->Statut ?>" /> <br />
<input type="hidden" name="id" value="<?php echo $Statut->id ?> ">
<fieldset>
<input type="submit" value="mettre à jour" />

<form action="index.php">
      <button type="submit">retour à la page principale</button>
</form>
