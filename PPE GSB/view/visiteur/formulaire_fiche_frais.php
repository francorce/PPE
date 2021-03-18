<?php 
if(!isset($_SESSION)){
    session_start();
}
echo empty($_SESSION['user']);
if(!empty($_SESSION['user']) && $_SESSION['niveau']==1)
{
?>
<html>
   <head>
      <meta charset="utf-8">
      <!-- importer le fichier de style -->
      <link rel="stylesheet" href="../styles/style3.css" media="screen" type="text/css" />
   </head>
   <body>
      <div id="container">
         <!-- zone de connexion -->
         <img src="../images/gsb.png" width="300" height="200"/><br>
         
		 		<p>
       </p>
	  
		 
		 <form action="http://127.0.0.1/PPE%20GSB/controller/routeur.php?action=SaveFicheFrais" method="POST"> 
            <center>
               <h1><br><br><u>Ajout d'une fiche de frais</u><br><br></h1>
               <div class="tg-wrap">
                  <table class="tg">
                     <thead border="0">
                        <label for="start">Période d'engagement : </label>
						<input type="date" id="mois" name="mois" value="yy-mm-dd" required>
						<p id="demo"></p>
                     </thead><br><br><br>
					 
				


					 

	   					 					 <h1><u>Frais au forfait</u></h1>
           
<SELECT id="lignefraisforfait" name="lignefraisforfait" size="1" required>
											  
	<?php
		
		foreach ($tab_frais as $key){
	?>
	
		<OPTION value="<?=$key->getId()?>" ><?=$key->getLibelle()?></OPTION>
		

	<?php
	}
	?> 
	</SELECT>
	
	Quantité :
	
	<input type="text" name="quantite" required>
	
	 <h1><u>Hors Forfait</u></h1>
                   <p>
<label for="Qu1"></label>
<b>Libellé: </b><input id="libelle" name="libelle" required>

<label for="Qu2"></label>
<b>Montant : </b><input id="montant" name="montant" required>
</p>

<label for="start">Date : </label>
						<input type="date" id="mois2" name="mois2" value="yy-mm-dd" required>


<input type="button" onclick="javascript:addRow('matable');" value="Ajouter" /><br>

<table  id="matable" class="table" style="width:100%" style="background-color: white;" border="8"  cellpadding="0"  cellspacing="1">
<tr style="background-color: #53AF57;">
<td><font color=white>Date</td>
<td><font color=white>Libellé</td>
<td><font color=white>Montant</td>

<tr>


</tr> 
</table>

<script type="text/javascript">
function myFunctionDate() {
    var Ladate = document.getElementById("mois2").value;
    document.getElementById("demo").innerHTML = Ladate;
}

function addRow(tableau){
    tableau = document.getElementById(tableau);
    var tds = 5;     
    var tr = document.createElement('tr');
	
	var td = document.createElement('td');
        tr.appendChild(td);
		td.innerHTML = document.getElementById("mois2").value;
		
		var td = document.createElement('td');
        tr.appendChild(td);
		td.innerHTML = document.getElementById("libelle").value;
		
		var td = document.createElement('td');
        tr.appendChild(td);
		td.innerHTML = document.getElementById("montant").value;
	
    for(var i=1; i<=tds; i++){
        var td = document.createElement('td');
        tableau.appendChild(tr);
		td.innerHTML = document.getElementById("Q"+i).value;
		tr.appendChild(td);
    
    }
	tableau.appendChild(tr);
}
</script>

<script>
function refreshPage(){
    window.location.reload();
} 
</script>


                  </table>
               </div>
               <br><br>
			   <input type="reset" value="Réinitialiser">
               <input type="submit" id='submit' value='Valider' >
			   
               
            </center>
          
         </form>
      </div>
   </body>
</html>
<?php
}else{
   
   header('Location: ../index.php');
}?>