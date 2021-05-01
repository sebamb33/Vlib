<?php
//Tableaux ou je récupère  toute mes stations
$tab=stationsDAO::chargementTouteStations();
$tabObjStation=[];
foreach($tab as $uneStation)
{
    $stat=new Station();
    $stat->hydrate($uneStation);
    array_push($tabObjStation,$stat);
}
//Création de div  pour chaque station

$affichageStation="";

foreach($tabObjStation as $station)
{
    if($station->getETATS()=="Disponible")
    {
        $affichageStation.=" <div class=\"StatDispo\">
        <table class ='tabDispo'><tr>
            <td>Nom de station : ".$station->getNOMS()."</td>
            <td>etat : ".$station->getETATS()." </td>
            <td>Nombre de bornes : ".$station->getNUMBORNE()."</td>
        </tr></table>
        </div>";
    }else
    {
        $affichageStation.=" <div class=\"StatIndispo\">
        <table class ='tabIndispo'>
            <tr>
                <td class='titreIndispo'>
                   Station indisponible
                </td>
            </tr>
            <tr>
            <td>Nom de station : ".$station->getNOMS()."</td>
            <td>etat : ".$station->getETATS()." </td>
            <td>Nombre de bornes : ".$station->getNUMBORNE()."</td>
        </tr></table>
        </div>";
    }

}
require_once "vues/station.php";
