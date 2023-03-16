<?php
require_once('connexion_admin.php') ;



function getAllUsers(){
    global $pdo;
    $query = 'SELECT * FROM utilisateurs ';
    try {
    $result = $pdo->query($query)->fetchAll(PDO::FETCH_OBJ);
    return $result;
    }
    catch ( Exception $e ) {
    die ("erreur dans la requete ".$e->getMessage());
    }
   }

   function getUtilisateur($id){
    global $pdo;
    $requete = "SELECT * FROM utilisateurs where id = :id";
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


   function getAllStatut(){
    global $pdo;
    $query = 'SELECT idlog,nom,prenom,Statut FROM utilisateurs,logutili,droitutili WHERE utilisateurs.id = logutili.idUtili AND logutili.idUtili = droitutili.idlog';
    try {
    $result = $pdo->query($query)->fetchAll(PDO::FETCH_OBJ);
    return $result;
    }
    catch ( Exception $e ) {
    die ("erreur dans la requete ".$e->getMessage());
    }
   }

   function getStatut($id){
    global $pdo;
    $requete = "SELECT * FROM droitutili where idlog = :id";
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
    

   function getALLLogin(){
    global $pdo;
    $query = 'SELECT idUtili,nom, prenom,login,mdp FROM utilisateurs,logutili WHERE utilisateurs.id = logutili.idUtili';
    try {
    $result = $pdo->query($query)->fetchAll(PDO::FETCH_OBJ);
    return $result;
    }
    catch ( Exception $e ) {
    die ("erreur dans la requete ".$e->getMessage());
    }
   }

   function getLogin($id){
    global $pdo;
    $requete = "SELECT * FROM logutili WHERE idUtili = :id";
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


       function getAlladmin(){
        global $pdo;
        $query= "SELECT login,mdp,Statut FROM utilisateurs,logutili,droitutili WHERE utilisateurs.id=logutili.idUtili AND logutili.id = droitutili.idlog AND Statut = 'admin' ";
        try {
            $result = $pdo->query($query)->fetchAll(PDO::FETCH_OBJ);
            return $result;
            }
            catch ( Exception $e ) {
            die ("erreur dans la requete ".$e->getMessage());
            }
           }


   ?>

