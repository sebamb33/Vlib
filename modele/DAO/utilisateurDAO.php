<?php
    class UtilisateurDao{
        
    //Fonction qui va servir à verfier le mail avant de crée un utilisateur
    public static function VerificationUtilisateurMail($connex,Utilisateur $user)
    {
        $sql="SELECT id FROM utilisateur WHERE EMAIL =:mail";
        
        $resultat=$connex->queryFetchAll($sql);


    }
    }
?>