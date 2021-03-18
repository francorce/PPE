<?php 
if(!isset($_SESSION)){
    session_start();
}
echo empty($_SESSION['user']);
if(!empty($_SESSION['user']) && $_SESSION['niveau']==3)
{
?>
<html>
    <head>
	   <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">
        <title>Laboratoire Galaxy Swiss Bourdin</title>
        <link rel="stylesheet" href="../styles/normalize.css">
        <link rel="stylesheet" href="../styles/foundation.css">
        <link rel="stylesheet" href="../styles/gsb.css">
        <link rel="stylesheet" href="../styles/style.css" media="screen" type="text/css" />
    </head>
    <body>
	
	<nav class="header">
            <nav class="row">
                <nav class="large-3 columns"><img src="../images/gsb.png" /> <br> </nav>
                <nav class="large-9 columns"><h2 class="right">Laboratoire Galaxy Swiss Bourdin</h2></nav>
            </nav>
        </nav>
        <nav id="fondNav">
        <nav class="row">
		<nav class="large-12 columns">
        <nav class="top-bar-section">
               <ul class="title-area">
                <li ><a href="http://127.0.0.1/PPE%20GSB/controller/routeur.php?action=readAllVisiteur">Liste des visiteurs</a></li>
					<li class="active"><a href="http://127.0.0.1/PPE%20GSB/controller/routeur.php?action=readAllFrais">Liste de frais au forfait</a></li>
                    <li> <a>                                                                                                                                           </a></li>
					<li> <a href="../logout.php">Se déconnecter</a></li>
                </ul>
        </nav>
        </nav>
		</nav>
         </nav>
	<header id='header' class='row'>
    <div class='large-12 columns'>
	<h1> Page ADMIN - Liste des frais au forfait : </h1>
    
    </header>
    <div id='contenu'>
    <div class='row'>
    <div class='large-4 columns'>
    <div class='row'>
    <div class='large-12 columns'>
	<div class='panel'>
	<table border='1' cellpadding='10' cellspacing='1' width='100%'>
	<tr>
		<th>Identifiant Frais Forfait</th>
       <th>Libelle</th>
       <th>Montant</th>
	</tr>
	<?php

	foreach ($tab_frais as $key){
		?>
	<tr>
	<td><?=$key->getId()?></td>
	<td><?=$key->getLibelle()?></td>
	<td><?=$key->getMontant()?></td>
	<td><a href="http://127.0.0.1/PPE%20GSB/controller/routeur.php?action=DeleteOneFrais&id=<?= $key->getId()  ?>">Supprimer</a></td>
	</tr>
	<?php
	}
	?>
	</table>
	
	 <a href="../view/admin/ajoutfrais.php"> <input type="button" value="Ajouter"> </a>
	</div>
  </body>
</html>
<?php
}else{
 
   header('Location: ../../index.php');
}?>