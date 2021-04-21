<?php
require_once 'modele/DAO/param.php';
require_once 'modele/DAO/accesDonnes.php';


    class abonnementDAO{

        public static function libelleAbonnement(Utilisateur $user)
        {
            $codeA=$user->getCODEA();
            $sql="SELECT LIBELLETYPEABO FROM type_abonement WHERE CODETYPEABO = :codeabo";
            $req=DBConnex::getInstance()->prepare($sql);
            $req->bindParam(":codeabo",$codeA);
            $req->execute();
            return $req->fetch()[0];
        }
    }?>