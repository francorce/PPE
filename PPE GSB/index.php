<html>
   <head>
      <meta charset="utf-8">
      <!-- importer le fichier de style -->
      <link rel="stylesheet" href="styles/style.css" media="screen" type="text/css" />
   </head>
   <body>
      <div id="container">
         <!-- zone de connexion -->
         <br><img src="images/gsb.png" width="300" height="200"/><br><br><br>
		 <br>
         <form action="controller/login.php" method="POST">
            <center>
               <h1>Connexion</h1>
               <label><b>Nom d'utilisateur</b></label>
               <input type="text" placeholder="Entrer le nom d'utilisateur" name="username" required>
               <br><br>
               <label><b>Mot de passe</b></label>
               <input type="password" placeholder="Entrer le mot de passe" name="password" required>
               <br><br>
               <input type="submit" id='submit' value='LOGIN' >
            
            </center>
         </form>
      </div>
   </body>
</html>



