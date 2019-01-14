<?php
try // Connexion avec la base de donnée "audio"
{
	$bdd = new PDO('mysql:host=localhost;dbname=audio;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}
?>
<html lang="fr">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="styles/css/bootstrap.min.css"> 
<link rel="stylesheet" href="styles/css/styles.css">
<title>traitement de l'inscription</title>
</head>
<body>
    <div class="container">
	<div class = "row">
	<div class ="col-lg-12"">

	<?php 
	$req = $bdd->prepare('SELECT login FROM user WHERE login = ? '); // On vérifie que le login n'est pas déjà utilisé
	$req->execute(array($_POST['login']));
	$ligne = $req->fetch();
	if(  $ligne["login"] !='' ) // Vérification si le login n'existe pas
	{
		include("inscription.php");
		echo 'Bonjour, ce login est déjà utilisé.';
	}
	elseif( $_POST['psswd'] != $_POST['psswd1'] ) // Vérification si les deux mots de passe entrés sont identiques
	{
		include("inscription.php");
		echo 'Bonjour, votre mot de passe est incorrect.';
	}
	elseif( filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) == FALSE) // Vérification si l'email entré est valable (ex: nom@azr.fr)
	{
		include("inscription.php");
		echo 'Bonjour, votre adresse mail est invalide.';
	}
	else // Si il y a aucun problème, les données sont ajoutées à la base de données et cette personne est inscrite
	{
		echo 'Votre inscription est prise en compte.';
		$pass_hache = password_hash($_POST['psswd'], PASSWORD_DEFAULT); // On hashe le mot de passe pour plus de sécurité
		$login = $_POST['login'];
		$email = $_POST['email'];
		$req = $bdd->prepare('INSERT INTO user(login, psswd, email, date_inscription) VALUES(:login, :psswd, :email, NOW())');
		$req->execute(array(
		'login' => $login,
		'psswd' => $pass_hache,
		'email' => $email
		));
		$dernier = $bdd->query('SELECT ID FROM user ORDER BY ID DESC LIMIT 1'); // On récupère l'ID du nouvel inscrit
		$donnees = $dernier->fetch();
		// On ajoute à la base de données "photo" une photo de profil par défaut pour ce nouvel inscrit
		$requser = $bdd->prepare('INSERT INTO photo(ID, nom, extension) VALUES(:ID, :nom, :extension)');
		$requser->execute(array(
		'ID' => $donnees['ID'],
		'nom' => 'chien',
		'extension' => 'jpg'
		));
		echo "<a href=connexion.php>Se connecter</a>" // On invite le nouvel inscrit à se connecter
	}
	?>

	</div>

	</div>

	</div>

</body>

</html>