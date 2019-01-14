<html>
    <head>
        <meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="styles/css/bootstrap.min.css">
		<link rel="stylesheet" href="styles/css/styles.css">
        <title>Bienvenue !</title>
    </head>

    <body>
	<h1>Audio-Barks</h1>
	<h2>Inscription :</h2>
    <form method="post" action="traitement2.php"> <!-- Page de réception des données-->
	
		<fieldset>
			<legend>Vos coordonnées</legend>
		
			<label for="pseudo">Votre pseudo :</label>
			<input type="text" name="login" id="login" placeholder="Ex : Roro" size="30" maxlength="20" required />
			
			<br/>
			<label for="pass">Votre mot de passe :</label>
			<input type="password" name="psswd" id="psswd" size="30" maxlength="20" required />

			<br/>
			<label for="pass1">Confirmez votre mot de passe :</label>
			<input type="password" name="psswd1" id="psswd1" size="30" maxlength="20" required />

			<br/>
			<label for="adresse-mail">Votre adresse mail :</label>
			<input type="text" name="email" id="email" placeholder="Ex : roro13@gmail.com" size="30" maxlength="30" required />			
		
		</fieldset>
		
		<input type="submit" value="Créer un compte" /> <!-- Envoie des données pour la création du compte -->
	</form>
    </body>
</html>