<?php
require_once 'lib/dispatcher.php';
require_once 'modele/DAO/param.php';
require_once 'modele/DAO/accesDonnes.php';

$maConnex=connexion($dsn,$user,$pass); //Ce connecte a la base de données
// Verification  pour voir si il y'a déja un menu principale ou non 
if (isset($_GET['vlibMP'])){
    $_SESSION['vlibMP']= $_GET['vlibMP'];
}
// sinon affecte au menu principal la valeur par defaut
else{
    if(!isset($_SESSION['vlibMP'])){
        $_SESSION['vlibMP']="accueil";
    }
}
//Si on viens d'entrer des information dans le formulaire inscription
if(isset($_POST["nomInsc"]))
{
    $user= new Utilisateur($_POST["nomInsc"],$_POST["prenomInsc"],$_POST["email"],$_POST["selectSexe"],$_POST["datenaissance"],$_POST["numerovoie"],$_POST["supplementAddr"],$_POST["tel"],$_POST["ville"],$_POST["cdp"]
);
print_r($user);
}
//Création du menu principale


$vlibMP = new Menu("menuPrincipal");
$vlibMP->ajouterComposant($vlibMP->creerItemLien("accueil", "Accueil"));
$vlibMP->ajouterComposant($vlibMP->creerItemLien("stations", "Stations"));
$vlibMP->ajouterComposant($vlibMP->creerItemLien("abonnements", "Abonnements"));
$vlibMP->ajouterComposant($vlibMP->creerItemLien("connexionAuth", "Connexion/Inscriptions"));
$menuPrincipal = $vlibMP->creerMenu($_SESSION['vlibMP'],'vlibMP');

include_once dispatcher::dispatch($_SESSION['vlibMP']);


?>