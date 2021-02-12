<?php    
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$dburl="mysql:host=localhost;dbname=connection";
$dbname = "connection";
$dbuser = "boris";
$dbpass = "simplon";
// Démarrage de la session
session_start();
// On vérifie si le champ Login n'est pas vide.
if ($_SESSION['membre']=='')
// Si c'est le cas, le visiteur ne s'est pas loger et subit une redirection
{ Header('Location:login.php');   }
else
{ echo "  <a href src='disconnect.php'> Se déconnecter </a> || membres: ". $_SESSION['pseudo'] ."";  }
// Test De vérification que l'user est bien dans la liste des utilisateurs Mysql
// Connexion à la base de données MySql
$connexion = new PDO($dburl,$dbuser,$dbpass);
$connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// Cette table contient la liste des mebres enregistrés.
$statement = $connexion->prepare('
INSERT INTO membres (pseudo, email, password)
VALUES(":donald", ":mcdonald@hotmail.fr", ":mcdo")');
//On affiche les infos de la table
                $resultat = $statement->fetchAll(PDO::FETCH_ASSOC);
                $keys = array_keys($resultat);

?>
