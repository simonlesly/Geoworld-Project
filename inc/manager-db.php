<?php
/**
 * Ce script est composé de fonctions d'exploitation des données
 * détenues pas le SGBDR MySQL utilisées par la logique de l'application.
 *
 * C'est le seul endroit dans l'application où a lieu la communication entre
 * la logique métier de l'application et les données en base de données, que
 * ce soit en lecture ou en écriture.
 *
 * PHP version 7
 *
 * @category  Database_Access_Function
 * @package   Application
 * @author    SIO-SLAM <sio@ldv-melun.org>
 * @copyright 2019-2023 SIO-SLAM
 * @license   http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link      https://github.com/sio-melun/geoworld
 */

/**
 *  Les fonctions dépendent d'une connection à la base de données,
 *  cette fonction est déportée dans un autre script.
 */
require_once 'connect-db.php';


// Exemple d'une fonction sans paramètre, avec documentation technique PhpDoc  

/**
 * Obtenir la liste des pays
 *
 * @return liste d'objets de type StdClass représentant un Country 
 */
function getAllCountries()
{
    global $pdo;
    $query = 'SELECT * FROM Country;';
    return $pdo->query($query)->fetchAll();
}



// Exemple d'une fonction paramétrée, avec documentation technique PhpDoc  

/**
 * Obtenir la liste de tous les pays référencés d'un continent donné
 *
 * @param string $continent le nom d'un continent
 * 
 * @return array tableau d'objets (des pays)
 */
function getCountriesByContinent($continent)
{
    // pour utiliser la variable globale dans la fonction
    global $pdo;
    $query = 'SELECT * FROM Country WHERE Continent = :cont;';
    $prep = $pdo->prepare($query);
    // on associe ici (bind) le paramètre (:cont) de la req SQL,
    // avec la valeur reçue en paramètre de la fonction ($continent)
    // on prend soin de spécifier le type de la valeur (String) afin
    // de se prémunir d'injections SQL (des filtres seront appliqués)
    $prep->bindValue(':cont', $continent, PDO::PARAM_STR);
    $prep->execute();
    // var_dump($prep);  pour du debug
    // var_dump($continent);

    // on retourne un tableau d'objets (car spécifié dans connect-db.php)
    return $prep->fetchAll();
}
function getNomContinent()   
{
    global $pdo;
    $query = 'SELECT DISTINCT (Continent) FROM Country ';
    return $pdo->query($query)->fetchAll(); 
}
   

function getNomCapital($name)
{
    global $pdo;
    $query = 'SELECT Name FROM city WHERE id= :Capital;';
    $prep = $pdo->prepare($query);
    $prep->bindValue(':Capital',$name, PDO::PARAM_STR);
    $prep->execute();
    return $prep->fetchAll();
}


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