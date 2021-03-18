<?php

session_start();


require_once ("../model/DataBase.php");
require_once ("../model/Fraisforfait.php");
require_once ("../model/FicheFrais.php");





class ControllerFichefrais {
	
Public static function FormulaireFicheFrais(){

$tab_frais = Fraisforfait::getAllFrais();
require ('../view/visiteur/formulaire_fiche_frais.php');


}


 public static function readAllFicheFrais() {
	 
 $tab_fichefrais = FicheFrais::getAllFicheFrais();
require ('../view/visiteur/accueilvisiteur.php'); 
 
 }
 

 
  public static function readAllFicheFraisComptable() {
	 
 $tab_fichefrais = FicheFrais::getAllFicheFraisAttente();
require ('../view/comptable/accueilcomptable.php'); 
 
 }
 
 
   public static function readAllFicheFraisComptableValide() {
	 
 $tab_fichefrais = FicheFrais::getAllFicheFraisValide();
require ('../view/comptable/fichesvalides.php'); 
 
 }
 

 


Public static function SaveFicheFrais(){

$mois=$_POST['mois'];
$etat="CL";
$idVisiteur=$_SESSION['id'];
$idFraisForfait=$_POST['lignefraisforfait'];
$mois2=$_POST['mois2'];
$libelle=$_POST['libelle'];
$montant=$_POST['montant'];
$quantite=$_POST['quantite'];

FicheFrais::AddFicheFrais($idVisiteur,$mois,$etat);

	
 $sql = "INSERT INTO lignefraisforfait(idVisiteur,mois,idFraisForfait,quantite) VALUES (:nom_tag1,:nom_tag2,:nom_tag3, :nom_tag4)";
 $req_prep = DataBase::$conn->prepare($sql);
 $values = array(
 "nom_tag1" => $idVisiteur,
 "nom_tag2" => $mois,
 "nom_tag3" => $idFraisForfait,
 "nom_tag4" => $quantite,
 );
 $req_prep->execute($values);
 
 
 $sql2 = "INSERT INTO lignefraishorsforfait(idVisiteur,mois,libelle,montant) VALUES (:nom_tag1,:nom_tag2,:nom_tag3,:nom_tag4)";
 $req_prep2 = DataBase::$conn->prepare($sql2);
 $values2 = array(
 "nom_tag1" => $idVisiteur,
 "nom_tag2" => $mois2,
 "nom_tag3" => $libelle,
 "nom_tag4" => $montant,
 );
 $req_prep2->execute($values2);
 
 ControllerFichefrais::readAllFicheFrais();





}

 
public static function DeleteOneFicheFrais() {
	 
FicheFrais::DeleteFicheFrais();
ControllerFichefrais::readAllFicheFrais();
 
}






public static function ValiderFicheFrais(){
	
	
$idFicheFrais=$_GET['id'];
$etat="RB";

 $sql = "UPDATE fichefrais SET idEtat=:tag1 WHERE idFicheFrais=:tag2";
 $req_prep = DataBase::$conn->prepare($sql);
 $values = array(
 "tag1" => $etat,
 "tag2" => $idFicheFrais,
);
 $req_prep->execute($values);
ControllerFichefrais::readAllFicheFraisComptable();

}
			
			
}



?>
  