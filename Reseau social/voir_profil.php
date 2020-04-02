<?php
if(isset($_SESSION["connexion"]) && $_SESSION["connexion"] == "OK") {
	require_once('includes/class-query.php');
	$utilisateur = $query->charger_utilisateur($_SESSION['id']);
	echo "<h2>Votre profil</h2>";

	echo $utilisateur->prenom."<br/>";
	echo $utilisateur->nom."<br/>";
	echo $utilisateur->email."<br/>";
	echo $utilisateur->description."<br/>";


	echo "<br/>";
	
	
	
}
else {
	echo "Vous devez vous connecter au préalable";
}

?>
