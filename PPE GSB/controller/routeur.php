<?php
require_once 'ControllerVisiteur.php';
require_once 'ControllerFraisforfait.php';
require_once 'ControllerFichefrais.php';
require_once '../model/DataBase.php';


if (isset($_GET['action'])) {
	
    if ($_GET['action'] == 'FormulaireFicheFrais') {
        ControllerFichefrais::FormulaireFicheFrais();
    }
	else if ($_GET['action'] == 'readAllVisiteur') {
		
		ControllerVisiteur::readAllVisiteur();
	}
	
	
	else if ($_GET['action'] == 'readAllFrais') {
		
		ControllerFraisforfait::readAllFrais();
	}
	
	else if ($_GET['action'] == 'AddOneVisiteur') {
		
		ControllerVisiteur::AddOneVisiteur();
	}
	
	else if ($_GET['action'] == 'AddOneVisiteur') {
		
		ControllerVisiteur::AddOneVisiteur();
	}
	
	else if ($_GET['action'] == 'DeleteOneVisiteur') {
		
		ControllerVisiteur::DeleteOneVisiteur();
	}
	
	else if ($_GET['action'] == 'AddOneFrais') {
		
		ControllerFraisforfait::AddOneFrais();
	}
	
	else if ($_GET['action'] == 'DeleteOneFrais') {
		
		ControllerFraisforfait::DeleteOneFrais();
	}
	
	
	else if ($_GET['action'] == 'SaveFicheFrais') {
		
		ControllerFichefrais::SaveFicheFrais();
	}
	
	
		else if ($_GET['action'] == 'readAllFicheFrais') {
		
		ControllerFichefrais::readAllFicheFrais();
	}
	
	else if ($_GET['action'] == 'DeleteOneFicheFrais') {
		
		ControllerFichefrais::DeleteOneFicheFrais();
	}
	
	else if ($_GET['action'] == 'readAllFicheFraisComptable') {
		
		ControllerFichefrais::readAllFicheFraisComptable();
	}
	
	else if ($_GET['action'] == 'ValiderFicheFrais') {
		
		ControllerFichefrais::ValiderFicheFrais();
	}
	
	
	else if ($_GET['action'] == 'readAllFicheFraisComptableValide') {
		
		ControllerFichefrais::readAllFicheFraisComptableValide();
	
	
	
	
	
	
}

}








