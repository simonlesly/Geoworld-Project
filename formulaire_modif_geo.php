<link rel="stylesheet" href="modele.css" />
<?php
 require("fonctions.php");

 //on récupère et on vérifie que l'id figure dans l'URL
if ( isset($_GET['id']) && !empty($_GET['id'])){
 $id = $_GET['id'] ;
 $info = getInfoCountry($id);
}
?>
<form action="update_geo.php" method="get" >
<fieldset>
<legend> <i>Information</i></legend>
Population :
<input type="text" name="Population" required value="<?php echo $info->Population; ?>" /> <br />
GovernmentForm :
<input type="text" name="GovernmentForm" required value="<?php echo $info->GovernmentForm; ?>" /> <br />
HeadOfState :
<input type="text" name="HeadOfState" required value="<?php echo $info->HeadOfState; ?>" /> <br />
<input type="hidden" name="id" value="<?php echo $info->id ?> ">
<fieldset>
<input type="submit" value="mettre à jour" />

<form action="index.php">
      <button type="submit">retour à la page principale</button>
</form>
