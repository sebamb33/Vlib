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
//Si on viens d'entrer des information dans le formulaire inscription
if(isset($_POST["nomInsc"]))
{
    $user= new Utilisateur($_POST["nomInsc"],$_POST["prenomInsc"],$_POST["email"],$_POST["selectSexe"],$_POST["datenaissance"],$_POST["numerovoie"],$_POST["supplementAddr"],$_POST["tel"],$_POST["ville"],$_POST["cdp"]);
    $retour=UtilisateurDao::VerificationUtilisateurMail($user);
    
    //Si aucun utilisateur trouvé avec le même mail dans la bdd
    if(count($retour)==0)
    {
       //Genere un login et check si il n'est pas déja present dans la bd 
       $user->genererLogin();
       //Generation mot de passe temporaire pour que l'utilisateur puisse faire sa première connexion 
       $user->genererMDP();
       //Insertion de l'utilisateur dans la base de données
      if(UtilisateurDao::InscriptionUtilisateur($user)==1)
      {
        print("<script>alert(\"Votre  Login est : ".$user->getLOGIN()."  Votre mot de passe générer est : ".$user->getMDP()."\");</script>");
      }else
      {
        print("<script>alert(\"Votre inscription à échouer merci de verifier les saisies, exemple de date (05/03/2000)\");</script>");
      }
    }else
    {
        print("<script>alert(\"Le mail saisi est déja utilisé\");</script>");
    }
// print_r($user);
}
//Si on viens du formulaire de connexion 

if(isset($_POST["login"])and isset($_POST["mdp"]))
{
    $retour=UtilisateurDao::connexionUtilisateur($_POST["login"],$_POST["mdp"]);
    if(count($retour)==0)
    {
        print("<script>alert(\"Vos identifiant sont incorect\");</script>");
    }else
    {
        $utilConnecter=new Utilisateur();
        $utilConnecter->hydrate($retour);
        $_SESSION["dataUser"]=serialize($utilConnecter);
    }
}


//Création du menu principale

if(isset($_SESSION["dataUser"]))
{
    $vlibMP = new Menu("menuPrincipal");
    $vlibMP->ajouterComposant($vlibMP->creerItemLien("infoUtilisateur", "Mes infos"));
    $vlibMP->ajouterComposant($vlibMP->creerItemLien("parametre", "Modifier mes options"));
    $vlibMP->ajouterComposant($vlibMP->creerItemLien("rervations", "Réserver  🚲"));
    $vlibMP->ajouterComposant($vlibMP->creerItemLien("deconnexion", "Se déconnecter ❌"));
    $menuPrincipal = $vlibMP->creerMenu($_SESSION['vlibMP'],'vlibMP');
    
}else{
    $vlibMP = new Menu("menuPrincipal");
    $vlibMP->ajouterComposant($vlibMP->creerItemLien("accueil", "Accueil"));
    $vlibMP->ajouterComposant($vlibMP->creerItemLien("stations", "Stations"));
    $vlibMP->ajouterComposant($vlibMP->creerItemLien("abonnements", "Abonnements"));
    $vlibMP->ajouterComposant($vlibMP->creerItemLien("connexionAuth", "Connexion/Inscriptions"));
    $menuPrincipal = $vlibMP->creerMenu($_SESSION['vlibMP'],'vlibMP');
}
include_once dispatcher::dispatch($_SESSION['vlibMP']);


?>