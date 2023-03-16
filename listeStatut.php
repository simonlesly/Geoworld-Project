<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8" />
  <link rel="stylesheet" href="modele.css" />
</head>

<?php
        require_once("connexion_admin.php");
        require_once('fonctionUtilisateurs.php');

        $Statut= getAllStatut();
  
?>
<div style="text-align:center">
<h1>Changez le rôle des utilisateur si vous le souhaitez : </h1>
</div>

  <table>
    <th>id</th> 
    <th>nom</th> 
    <th>prénom</th>
    <th>Statut</th>
    <th>modifier</th>

<?php foreach ($Statut as $LesStatut): ?>    
  <tr>
    <td><?php echo $LesStatut->idlog; ?></td>      
    <td><?php echo $LesStatut->nom; ?></td>
    <td><?php echo $LesStatut->prenom; ?></td> 
    <td><?php echo $LesStatut->Statut; ?></td>
    <td><a href="formulaire_modif_statut.php?id=<?php echo $LesStatut->idlog ?>" >modifier</a></td>
  </tr> 
<?php endforeach; ?>
</table>
</br>

<div style="text-align:center">
<form action="index.php">
      <button type="submit">retour à la page principale</button>
</form>
</div>


<form id = "contactForm" action= " insertStatut.php" method ="gate"
