<?php
class Visiteur{
	
private $id;
private $type;
private $nom;
private $prenom;
private $login;
private $mdp;
private $adresse;
private $cp;
private $ville;

public function getId(){
		return $this->id;
	}

	public function setId($id){
		$this->id = $id;
	}



	
	public function getTypee(){
		return $this->type;
	}

	public function setTypee($type){
		$this->type = $type;
	}
	
	

	public function getNom(){
		return $this->nom;
	}

	public function setNom($nom){
		$this->nom = $nom;
	}
	
	
	public function getPrenom(){
		return $this->prenom;
	}

	public function setPrenom($prenom){
		$this->prenom = $prenom;
	}

	

	public function getLogin(){
		return $this->login;
	}

	public function setLogin($login){
		$this->login = $login;
	}

	public function getMdp(){
		return $this->mdp;
	}

	public function setMdp($mdp){
		$this->mdp = $mdp;
	}

	public function getAdresse(){
		return $this->adresse;
	}

	public function setAdresse($adresse){
		$this->adresse = $adresse;
	}

	public function getCp(){
		return $this->cp;
	}

	public function setCp($cp){
		$this->cp = $cp;
	}

	public function getVille(){
		return $this->ville;
	}

	public function setVille($ville){
		$this->ville = $ville;
	}





public function __construct($id = NULL,$type = NULL, $nom = NULL, $prenom = NULL, $login = NULL, $mdp = NULL, $adresse = NULL, $cp = NULL, $ville = NULL) {
 if (!is_null($id) && !is_null($type) && !is_null($nom) && !is_null($prenom) && !is_null($login)&& !is_null($mdp) && !is_null($adresse) && !is_null($cp) && !is_null($ville)) {

$this->id = $id;
$this->type = $type;
$this->nom = $nom;
$this->prenom = $prenom;
$this->login = $login;
$this->mdp = $mdp;
$this->adrese = $adresse;
$this->cp = $cp;
$this->ville = $ville;


 }
}


public static function getAllVisiteur(){
	
	$rep=DataBase::$conn->query("Select * from visiteur");
	$rep->setFetchMode(PDO::FETCH_CLASS, 'Visiteur');
	$tab_visiteur = $rep->fetchAll();
	return $tab_visiteur;
}


public static function DeleteVisiteur(){
	$id = $_GET['id'];
	$rep=DataBase::$conn->prepare("DELETE from visiteur where id=:tag");
	$values = array(
 "tag" => $id,
 );
$rep->execute($values);

}

public static function AddVisiteur($type,$nom,$prenom,$login,$mdp,$adresse,$cp,$ville){
	
 $sql = "INSERT INTO visiteur(type,nom,prenom,login,mdp,adresse,cp,ville) VALUES (:nom_tag1,:nom_tag2,:nom_tag3,:nom_tag4,:nom_tag5,:nom_tag6,:nom_tag7,:nom_tag8)";
 $req_prep = DataBase::$conn->prepare($sql);
 $values = array(
 "nom_tag1" => $type,
 "nom_tag2" => $nom,
 "nom_tag3" => $prenom,
 "nom_tag4" => $login,
 "nom_tag5" => $mdp,
 "nom_tag6" => $adresse,
 "nom_tag7" => $cp,
 "nom_tag8" => $ville,
 
 );
$req_prep->execute($values);

}





}
?>
  