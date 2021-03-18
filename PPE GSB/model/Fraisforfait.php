<?php

class Fraisforfait {
	
private $id;	
private $libelle;
private $montant;


	public function getId(){
		return $this->id;
	}

	public function setId($id){
		$this->id = $id;
	}




public function getLibelle(){
		return $this->libelle;
	}

	public function setLibelle($libelle){
		$this->libelle = $libelle;
	}
	
	public function getMontant(){
		return $this->montant;
	}

	public function setMontant($montant){
		$this->montant = $montant;
	}
	
	


public function __construct($id = NULL, $libelle = NULL, $montant = NULL) {
 if (!is_null($id) && !is_null($libelle) && !is_null($montant)) {

$this->id = $id;
$this->libelle = $libelle;
$this->montant = $montant;
}
}




public static function getAllFrais(){
	
	$rep=DataBase::$conn->query("Select * from fraisforfait");
	$rep->setFetchMode(PDO::FETCH_CLASS, 'Fraisforfait');
	$tab_frais = $rep->fetchAll();
	return $tab_frais;
}


public function AddFrais($libelle,$montant){
	
 $sql = "INSERT INTO fraisforfait(libelle, montant) VALUES (:nom_tag1,:nom_tag2)";
 $req_prep = DataBase::$conn->prepare($sql);
 $values = array(
 "nom_tag1" => $libelle,
 "nom_tag2" => $montant,
 );
 $req_prep->execute($values);

}



public static function DeleteFrais(){
	$id = $_GET['id'];
	$rep=DataBase::$conn->prepare("DELETE from fraisforfait where id=:tag");
	$values = array(
 "tag" => $id,
 );
$rep->execute($values);

}




}
?>
  