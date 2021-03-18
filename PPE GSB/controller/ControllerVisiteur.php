<?php
require_once "../model/DataBase.php";
require_once "../model/Visiteur.php";

class ControllerVisiteur {
	
	
 public static function readAllVisiteur() {
	 
 $tab_visiteur = Visiteur::getAllVisiteur();
require ('../view/admin/ListVisiteur.php'); 
 
 }
 
public static function DeleteOneVisiteur() {
	 
Visiteur::DeleteVisiteur();
ControllerVisiteur::readAllVisiteur();
 
}


public static function AddOneVisiteur() {
	 
	$type=$_POST['type'];
			$nom=$_POST['nom'];
			$prenom=$_POST['prenom'];
			$login=$_POST['login'];
			$mdp=$_POST['mdp'];
			$adresse=$_POST['adresse'];
			$cp=$_POST['cp'];
			$ville=$_POST['ville'];
			
			$v = new Visiteur ($type,$nom,$prenom,$login,$mdp,$adresse,$cp,$ville);
			$v->AddVisiteur($type,$nom,$prenom,$login,$mdp,$adresse,$cp,$ville);
			
			ControllerVisiteur::readAllVisiteur();
			
	
 
}

}

