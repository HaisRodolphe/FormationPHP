<?php
if(isset($_SESSION["connexion"]) && $_SESSION["connexion"] == "OK") {

	echo "<h2>Modifier votre profil</h2>";
	
}
else {
	echo "Vous devez vous connecter au préalable";
}

?>
