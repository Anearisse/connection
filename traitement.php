<?php
// Page permettant de tester le login et le mot de passe inscrits dans la page de connexion
try // Connexion à la base de données
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
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="styles/css/bootstrap.min.css">
<link rel="stylesheet" href="styles/css/styles.css">
<title>Fil d'actualité</title>
</head>
<body>
    <div class="container">
	<div class = "row">
	<div class ="col-lg-12"">
	<?php 
	$req = $bdd->prepare('SELECT id, login, psswd FROM user WHERE login = :login');
	$req->execute(array(
    'login' => $_POST['user']));
	$resultat = $req->fetch();
	$isPasswordCorrect = password_verify($_POST['psswd'], $resultat['psswd']); // Vérification de la validité du mot de passe
	if(  $resultat && $isPasswordCorrect) // Si le pseudo et le mot de passe sont corrects, la personne se connecte 
	{
		session_start();
		$_SESSION['ID'] = $resultat['id'];
		$_SESSION['login'] = $resultat['login'];
		include("fil-actu.php"); // Redirection vers le fil d'actualités
	}
	else
	{
		#si la personne n'a pas ete trouvée, le tableau ligne est vide et il faut proposer à la personne de s'enregister
		?>
		<h1>Audio-Barks</h1>
		<?php
		echo "Erreur login ou mot de passe. <br />";
		echo "<a href=connexion.php>Voulez-vous vous réessayer ?</a>" . "<br />";
		echo "<a href=inscription.php>Voulez-vous vous inscrire ?</a>";
	}

	?>
	</div>
	</div>
	</div> 
</body>
</html>