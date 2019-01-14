<!DOCTYPE html>
<html lang="fr">
<head>
<title>Connexion</title>
    <meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="styles/css/bootstrap.min.css">
	<link rel="stylesheet" href="styles/css/styles.css">
</head>
<body>

 <div class="container header"><!-- Début container -->
 
		<div class="row">
			<div class="col-xs-12" align="center"><h1>Bienvenue sur la page de connexion</h1></div>
		</div>  
		

   	<form action="traitement.php" method="post">
<!-- Le formulaire contient des variables user et psswd. Lorsque le bouton connexion est clické, c'est le fichier
traitement.php qui est appelé. -->
<div class="row espace">

	 <div class="col-xs-6">
	   <div class="cadre">
	   <p>
	   Omitto iuris dictionem in libera civitate contra leges senatusque consulta; caedes relinquo; libidines praetereo, quarum acerbissimum extat indicium et ad insignem memoriam turpi
	   </p>
	   </div>
	</div>
	
	<div class="col-xs-offset-6 col-xs-6 input-group espaceBas">
        <label for="nom">Nom d'utilisateur :</label>
        <input class="form-control" type="text" name="user" autofocus />	<!-- nom d'utilisateur --> 
	</div>
</br>
	<div class="col-xs-offset-6 col-xs-6 input-group espaceBas">
        <label for="nom">Mot de passe :</label>
        <input class="form-control" type="password" name="psswd" /><!-- mot de passe --> 
	</div>
</br>
			 <div class="col-xs-offset-6 col-xs-6 input-group btn-center">
		 <input class="btn btn-primary" type="submit" value="connexion">
		 </div> 
</br>
<a href=inscription.php>Pas encore inscrit ? Voulez-vous vous inscrire ?</a>
	 
</div>

<div class="row espace">

</div>

<div class="row espace">

</div>

  </form>
</div><!-- Fin container -->
<footer class="footer">
<div class="container footer">
<span class="text-muted">Mon pied de page </span><span class="glyphicon glyphicon-asterisk"></span>
</div>
</footer>
</body>
</html>
