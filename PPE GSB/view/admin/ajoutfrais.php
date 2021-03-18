<?php 
if(!isset($_SESSION)){
  session_start();
}
echo empty($_SESSION['user']);
if(!empty($_SESSION['user']) && $_SESSION['niveau']==3)
{
?>
<!DOCTYPE html> 
<html>
    <head>
	   <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">
        <title>Laboratoire Galaxy Swiss Bourdin</title>
        <link rel="stylesheet" href="../../styles/normalize.css">
        <link rel="stylesheet" href="../../styles/foundation.css">
        <link rel="stylesheet" href="../../styles/gsb.css">
        <link rel="stylesheet" href="../../styles/style.css" media="screen" type="text/css" />
    </head>
    <body>
	
	<nav class="header">
            <nav class="row">
                <nav class="large-3 columns"><img src="../../images/gsb.png" /> <br> </nav>
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
					<li> <a href="../../logout.php">Se déconnecter</a></li>
                </ul>
        </nav>
        </nav>
        </nav>
		</nav>
         </nav>
	<header id='header' class='row'>
    <div class='large-12 columns'>
	<h1> Page ADMIN - Ajout de frais au forfait : </h1><br><br><br>
    
    </header>
   
   <center>
   <form id=paiement method="post"  action="../../controller/routeur.php?action=AddOneFrais">
   
   
   
  <fieldset>
    <legend>Ajout du libéllé :</legend>

    <ol>
      <li>
        <input name=libelle type=text placeholder="Entrez la valeur du libéllé">
      </li>
    </ol>
  </fieldset>
  <fieldset>
    <legend>Ajout du montant :</legend>

    <ol>
      <li>
        <input name=montant type=text placeholder="Entrez la valeur du montant">
      </li>
    </ol>
  </fieldset>

  <fieldset>
    <button type=submit value='AJOUTEZ'>VALIDER</button>
  </fieldset>
 

  </center>
</form>
   
  </body>
</html>
<?php
}else{

   header('Location: ../../index.php');
}?>