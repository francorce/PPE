<?php


class FicheFrais {

private $idVisiteur;	
private $idFicheFrais;
private $mois;
private $nbJustificatifs;
private $montantValide;	
private $dateModif;
private $idEtat;



	public function getIdVisiteur(){
		return $this->idVisiteur;
	}

	public function setIdVisiteur($IdVisiteur){
		$this->IdVisiteur = $IdVisiteur;
	}
	
	public function getMois(){
		return $this->mois;
	}

	public function setMois($mois){
		$this->mois = $mois;
	}
	
	public function getidEtat(){
		return $this->idEtat;
	}

	public function setidEtat($idEtat){
		$this->idEtat = $idEtat;
	}
	
	
		public function getidFicheFrais(){
		return $this->idFicheFrais;
	}

	public function setidFicheFrais($idFicheFrais){
		$this->idFicheFrais = $idFicheFrais;
	}
	


public function __construct($idVisiteur = NULL, $idFicheFrais = NULL, $mois = NULL, $idEtat = NULL) {
 if (!is_null($idVisiteur) && !is_null($idFicheFrais) && !is_null($mois) && !is_null($idEtat)) {

$this->idVisiteur = $idVisiteur;
$this->idFicheFrais = $idFicheFrais;
$this->mois = $mois;
$this->idEtat = $idEtat;
		}
}


 public static function getAllFicheFrais() {
	 
	$rep=DataBase::$conn->query("Select * from fichefrais where idVisiteur=".$_SESSION['id']);
	$rep->setFetchMode(PDO::FETCH_CLASS, 'FicheFrais');
	$tab_fichefrais = $rep->fetchAll();
	return $tab_fichefrais;
	
	
	
	
 
 }
 
 
 
  public static function getAllFicheFraisAttente() {
	 
	$rep=DataBase::$conn->query("Select * from fichefrais where idEtat='CL'");
	$rep->setFetchMode(PDO::FETCH_CLASS, 'FicheFrais');
	$tab_fichefrais = $rep->fetchAll();
	return $tab_fichefrais;
 
 }
 
 
 
 
 public static function getAllFicheFraisValide() {
	 
	$rep=DataBase::$conn->query("Select * from fichefrais where idEtat='RB'");
	$rep->setFetchMode(PDO::FETCH_CLASS, 'FicheFrais');
	$tab_fichefrais = $rep->fetchAll();
	return $tab_fichefrais;
 
 }


public static function AddFicheFrais($idVisiteur,$mois,$idEtat){
	
 $sql = "INSERT INTO fichefrais(idVisiteur,mois,idEtat) VALUES (:nom_tag1,:nom_tag2,:nom_tag3)";
 $req_prep = DataBase::$conn->prepare($sql);
 $values = array(
 "nom_tag1" => $idVisiteur,
 "nom_tag2" => $mois,
 "nom_tag3" => $idEtat,
 );
 $req_prep->execute($values);

}


public static function DeleteFicheFrais(){



	$idFicheFrais = $_GET['id'];
	
	$rep=DataBase::$conn->prepare("DELETE from fichefrais where idFicheFrais=:tag");
	$values = array(
 "tag" => $idFicheFrais,
 );
$rep->execute($values);




	// $rep2=DataBase::$conn->prepare("DELETE from lignefraisforfait where mois=:tag");
	// $values2 = array(
 // "tag" => $mois,
 // );
// $rep2->execute($values2);



// $rep3=DataBase::$conn->prepare("DELETE from lignefraishorsforfait where idVisiteur=:tag");
// $values3 = array(
 // "tag" => $idVisiteur,
 // );
// $rep3->execute($values3);





}





}




?>
  