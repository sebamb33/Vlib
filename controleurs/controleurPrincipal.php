<?php
require_once 'lib/dispatcher.php';
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

//Création du menu principale


$vlibMP = new Menu("menuPrincipal");
$vlibMP->ajouterComposant($vlibMP->creerItemLien("accueil", "Accueil"));
$vlibMP->ajouterComposant($vlibMP->creerItemLien("stations", "Stations"));
$vlibMP->ajouterComposant($vlibMP->creerItemLien("abonnements", "Abonnements"));
$vlibMP->ajouterComposant($vlibMP->creerItemLien("connexionAuth", "Connexion/Inscriptions"));
$menuPrincipal = $vlibMP->creerMenu($_SESSION['vlibMP'],'vlibMP');

include_once dispatcher::dispatch($_SESSION['vlibMP']);


?>