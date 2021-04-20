<?php
//Création formulaire connexion 
$formulaireConnexion= new Formulaire("post","index.php","fconnexion","Fconnexion");

//Identifiant
$formulaireConnexion->ajouterComposantLigne($formulaireConnexion->creerLabel('Identifiant :'));
$formulaireConnexion->ajouterComposantLigne($formulaireConnexion->creerInputTexte('login', 'login', '', 1, 'Entrez votre identifiant', ''));
$formulaireConnexion->ajouterComposantTab();
//Mot de passe
$formulaireConnexion->ajouterComposantLigne($formulaireConnexion->creerLabel('Mot de Passe :'));
	$formulaireConnexion->ajouterComposantLigne($formulaireConnexion->creerInputMdp('mdp', 'mdp',  1, 'Entrez votre mot de passe', ''));
	$formulaireConnexion->ajouterComposantTab();

	$formulaireConnexion->ajouterComposantLigne($formulaireConnexion-> creerInputSubmit('submitConnex', 'submitConnex', 'Valider'));
	$formulaireConnexion->ajouterComposantTab();
	$formulaireConnexion->creerFormulaire();
//Création formulaire inscription


include_once 'vues/ConnexionAuth.php';
?>