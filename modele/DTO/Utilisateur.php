<?php
class Utilisateur
{
    //Toute les variables en majusucle car tout est en majuscule dans la base de données
    private $IDUTIL;
    private $LOGIN;
    private $MDP;
    private $MAIL;
    private $CODETYPE;
    private $CODEA;
    private $NOM;
    private $PRENOM;
    private $SEXE;
    private $DATENAISS;
    private $ADRESSE;
    private $SUPLEMENTADDR;
    private $TEL;
    private $VILLE;
    private $CP;

    public function __construct($nom=null,$prenom=null,$mail=null,$sexe=null,$date=null,$adresse=null,$adresseSup=null,$tel=null,$vil=null,$cp=null)
    {
        $this->NOM=$nom;
        $this->PRENOM=$prenom;
        $this->MAIL =$mail;        
        $this->SEXE=$sexe;
        $this->DATENAISS =$date;
        $this->ADRESSE =$adresse;
        $this->SUPLEMENTADDR=$adresseSup;
        $this->TEL =$tel;
        $this->CP=$cp;
        $this->VILLE=$vil;
    }

    public function getMAIL()
    {
        return $this->MAIL;
    }
    public function setMAIL($MAIL)
    {
        $this->MAIL=$MAIL;
    }
    public function getIDUTIL(){
		return $this->IDUTIL;
	}

	public function setIDUTIL($IDUTIL){
		$this->IDUTIL = $IDUTIL;
	}

	public function getLOGIN(){
		return $this->LOGIN;
	}

	public function setLOGIN($LOGIN){
		$this->LOGIN = $LOGIN;
	}

	public function getMDP(){
		return $this->MDP;
	}

	public function setMDP($MDP){
		$this->MDP = $MDP;
	}

	public function getCODETYPE(){
		return $this->CODETYPE;
	}

	public function setCODETYPE($CODETYPE){
		$this->CODETYPE = $CODETYPE;
	}

	public function getCODEA(){
		return $this->CODEA;
	}

	public function setCODEA($CODEA){
		$this->CODEA = $CODEA;
	}

	public function getNOM(){
		return $this->NOM;
	}

	public function setNOM($NOM){
		$this->NOM = $NOM;
	}

	public function getPRENOM(){
		return $this->PRENOM;
	}

	public function setPRENOM($PRENOM){
		$this->PRENOM = $PRENOM;
	}

	public function getSEXE(){
		return $this->SEXE;
	}

	public function setSEXE($SEXE){
		$this->SEXE = $SEXE;
	}

	public function getDATENAISS(){
		return $this->DATENAISS;
	}

	public function setDATENAISS($DATENAISS){
		$this->DATENAISS = $DATENAISS;
	}

	public function getADRESSE(){
		return $this->ADRESSE;
	}

	public function setADRESSE($ADRESSE){
		$this->ADRESSE = $ADRESSE;
	}

	public function getSUPLEMENTADDR(){
		return $this->SUPLEMENTADDR;
	}

	public function setSUPLEMENTADDR($SUPLEMENTADDR){
		$this->SUPLEMENTADDR = $SUPLEMENTADDR;
	}

	public function getTEL(){
		return $this->TEL;
	}

	public function setTEL($TEL){
		$this->TEL = $TEL;
	}

	public function getVILLE(){
		return $this->VILLE;
	}

	public function setVILLE($VILLE){
		$this->VILLE = $VILLE;
	}

	public function getCP(){
		return $this->CP;
	}

	public function setCP($CP){
		$this->CP = $CP;
	}
}
?>