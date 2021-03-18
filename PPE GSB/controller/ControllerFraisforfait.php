<?php
require_once ("../model/Fraisforfait.php");
require_once ("../model/DataBase.php");



class ControllerFraisforfait {
	
Public static function AddOneFrais(){
	
	$libelle=$_POST['libelle'];
			$montant=$_POST['montant'];
			$f = new Fraisforfait ($libelle,$montant);
			$f->AddFrais($libelle,$montant);
			ControllerFraisforfait::readAllFrais();
			

}


 public static function readAllFrais() {
	 
$tab_frais = Fraisforfait::getAllFrais();
require ('../view/admin/ListFrais.php'); 
 
 }
 
Public static function DeleteOneFrais(){
	
Fraisforfait::DeleteFrais();
ControllerFraisforfait::readAllFrais();
			

}


 



}
?>
  