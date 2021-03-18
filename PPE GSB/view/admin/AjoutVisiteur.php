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
      <!-- importer le fichier de style -->
      <link rel="stylesheet" href="../../styles/normalize.css">
        <link rel="stylesheet" href="../../styles/foundation.css">
        <link rel="stylesheet" href="../../styles/gsb.css">
      <link rel="stylesheet" href="../../styles/style5.css" media="screen" type="text/css" />
	      
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
         <li class="active"><a href="http://127.0.0.1/PPE%20GSB/controller/routeur.php?action=readAllVisiteur">Liste des visiteurs</a></li>
			<li ><a href="http://127.0.0.1/PPE%20GSB/controller/routeur.php?action=readAllFrais">Liste de frais au forfait</a></li>
         <li> <a>                                                                                                                                           </a></li>
					<li> <a href="../../logout.php">Se déconnecter</a></li>
      </ul>
      </nav>
      </nav>
      </nav>
      </nav>
      
      <header id='header' class='row'>
    <div class='large-12 columns'>
	<h1> Page ADMIN - Ajout de personnes: </h1><br><br><br>
    
    </header>

        <center>
         <form id=paiement action="http://127.0.0.1/PPE%20GSB/controller/routeur.php?action=AddOneVisiteur"  method="POST">
          
              
               <div class="tg-wrap">
                  <table class="tg">
                     <thead border="1">
                        <tr>
                           <th class="tg-0pky"><label><b>Type</b></label><br>Visiteur<br>Comptable<br>Admin<br></th>
                           <th class="tg-0pky"><label><b>Nom</b></label></th>
                           <th class="tg-0pky"><label><b>Prenom</b></label></th>
                           <th class="tg-0pky"><label><b>Identifiant</b><br></label>Permet de vous connecter</th>
                        </tr>
                     </thead>
                     <tbody>
                        <tr>
                           <td class="tg-0pky"> 
                     
                              <select name="type" >
                              
                                <option value="1">Visiteur</option>
                                <option value="2">Comptable</option>
                                <option value="3">Administrateur</option>
                                </select>

                              <br><br>
                           </td>
                           <td class="tg-0pky">
                              <input type="text" placeholder="Entrer le nom de famille" name="nom" required>
                              <br><br>
                           </td>
                           <td class="tg-0pky">
                              <input type="text"placeholder="Entrer le prénom" name="prenom" required>
                              <br><br>
                           </td>
                           <td class="tg-0pky"> 
                              <input type="text" placeholder="Entrer le login de connexion" name="login" required>
                              <br><br>
                           </td>
                        </tr>
                        <tr>
                           <th class="tg-0pky"><label><b>MDP</b></label></th>
                           <th class="tg-0pky"><label><b>Adresse</b></label></th>
                           <th class="tg-0pky"><label><b>CP</b></label></th>
                           <th class="tg-0pky"><label><b>Ville</b></label></th>
                        </tr>
                        <tr>
                           <td class="tg-0lax"><input type="password" placeholder="Entrer le mot de passe" name="mdp" required>
                              <br<br>
                           </td>
                           <td class="tg-0lax"><input type="text" placeholder="Entrer l'adresse" name="adresse" required>
                              <br<br>
                           </td>
                           <td class="tg-0lax"><input type="number" maxlength="5" placeholder="Entrer le code postal" name="cp" required>
                              <br<br>
                           </td>
                           <td class="tg-0lax"><input type="text" placeholder="Entrer la ville" name="ville" required>
                              <br<br>
                           </td>
                        </tr>
                     </tbody>
                  </table>
               </div>
               <br><br>
               <input type="submit" id='submit' value='AJOUTER' >
               <br><br><br><br>
               <input type="reset" value="Réinitialiser">
         </form>
         
   </center>
   </body>
</html>
<?php
}else{
   
   header('Location: ../../index.php');
}?>