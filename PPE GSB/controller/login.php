<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
</head>
<body>
<?php
session_start();
$user = ($_POST['username']);
$pass = ($_POST['password']);



$mysqli = new mysqli('127.0.0.1', 'root', '', 'ppegsb');
$mysqli->set_charset("utf8");
$requete = "SELECT * FROM visiteur WHERE login = '$user' and mdp = '$pass'";
$resultat = $mysqli->query($requete);


if ($ligne = $resultat->fetch_assoc())
{
    $niveau = $ligne['type'];
    $_SESSION['niveau'] = $ligne['type'];
	$_SESSION['id'] = $ligne['id'];
	
    $_SESSION['user']= $user;
    if ($niveau == 1)
    {
            header('Location: routeur.php?action=readAllFicheFrais');
        }
        elseif ($niveau == 2)
        {
            header('Location: routeur.php?action=readAllFicheFraisComptable');
            
        }
        elseif ($niveau == 3)
        {
            
           header('Location: routeur.php?action=readAllVisiteur');
        }
    }
    else
    {
        echo 'Erreur identification : Login ou mot de passe incorrect ';
    }
    $mysqli->close();
?>
<br><br>
Cliquez ici pour revenir à la page de connexion :
<a href=" ../">Retour</a>
</body>
</html>
