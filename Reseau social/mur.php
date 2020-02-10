<?php
if(isset($_SESSION["connexion"]) && $_SESSION["connexion"] == "OK") {

	echo "<h2>Bienvenue ".$_SESSION["prenom"]. " ".$_SESSION["nom"]."</h2>";
	
}
else {
	echo "Vous devez vous connecter au préalable";
}

?>

