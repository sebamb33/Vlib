<?php
require_once 'modele/DAO/param.php';
require_once 'modele/DAO/accesDonnes.php';


    class UtilisateurDao{
        
    //Fonction qui va servir à verfier le mail avant de crée un utilisateur
    public static function VerificationUtilisateurMail(Utilisateur $user)
    {
        $mailSaisi=$user->getMAIL();
        $sql="SELECT IDUTIL FROM utilisateur WHERE MAIL =:mail";
        $req=DBCONNEX::getInstance()->prepare($sql);
        $req->bindParam(":mail",$mailSaisi);
        $req->execute();
        return $req->fetchAll();

    }
    //Va verifier à chaque inscription si le login est bien unique 
    public static function VerificationLoginDisponible($log)
    {
        $sql="SELECT IDUTIL FROM utilisateur WHERE LOGIN =:logi";
        $req=DBConnex::getInstance()->prepare($sql);
        $req->bindParam(":logi",$log);
        $req->execute();
        $req=$req->fetchAll();

        if(count($req)==0)
        {
            return TRUE;
        }
        return FALSE;
    }

    //Inscription de l'utilisateur à utilisé une fois  le mdp et le login générer
    public static function  InscriptionUtilisateur(Utilisateur $user)
    {
        //Code type de 1 car abonné  CODEA car pas d'abonnement encore et initialisation à 0 du crédit temps et du montant à débiter 
        $sql="INSERT INTO utilisateur  (`LOGIN`, `MDP`, `CODETYPE`,`CODEA`, `NOM`, `PRENOM`, `SEXE`, `DATENAISS`, `ADRESSE`, `SUPLEMENTADDR`, `TEL`, `VILLE`, `CP`, `CREDITTEMPS`, `MONTANTADEBITER`, `MAIL`)VALUES (:logi,:mdp,'1','0',:nom,:pren,:sexe,:dateNaiss,:addr,:supaddr,:tel,:vil,:cp,'0.0','0.0',:mail)";
        $req=DBConnex::getInstance()->prepare($sql);
        //Créer variable dans les version récentes de php sinon warning
        $log=$user->getLOGIN();
        $mdp=md5($user->getMDP());
        $nom=$user->getNom();
        $pren=$user->getPRENOM();
        $sexe=$user->getSexe();
        $dateNaiss=strval($user->getDATENAISS());
        $dateNaiss=preg_split("[/]",$dateNaiss);//Changement de l'ordre de la date pour éviter souci dans la bdd
        //Eviter les erreur de traitement sur le tableaux
        if(count($dateNaiss)!=3)
        {
            
            return 0;
        }
        $dateNaissanceAjust=$dateNaiss[2]."-".$dateNaiss[1]."-".$dateNaiss[0];
        $addr=$user->getADRESSE();
        $suppAddr=$user->getSUPLEMENTADDR();
        $tel=$user->getTEL();
        $vil=$user->getVILLE();
        $cp=$user->getCP();
        $mail=$user->getMAIL();

        $req->bindParam(":logi",$log);
        $req->bindParam(":mdp",$mdp);
        $req->bindParam(":nom",$nom);
        $req->bindParam(":pren",$pren);
        $req->bindParam(":sexe",$sexe);
        $req->bindParam(":dateNaiss",$dateNaissanceAjust);
        $req->bindParam(":addr",$addr);
        $req->bindParam(":supaddr",$suppAddr);
        $req->bindParam(":tel",$tel);
        $req->bindParam(":vil",$vil);
        $req->bindParam(":cp",$cp);
        $req->bindParam(":mail",$mail);
        return $req->execute();
        

    }

    public static function connexionUtilisateur($log,$mdp)
    {
        //Creation des variables pour éviter warning
        $l=$log;
        $m=md5($mdp);
        $sql="SELECT * FROM utilisateur WHERE LOGIN=:logi and MDP=:mdp";
        $req=DBConnex::getInstance()->prepare($sql);
        $req->bindParam(":logi",$l);
        $req->bindParam(":mdp",$m);
        $req->execute();
        return $req->fetch(PDO::FETCH_ASSOC);
    }
}
?>