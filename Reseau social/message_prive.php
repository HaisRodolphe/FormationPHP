<?php
if(isset($_SESSION["connexion"]) && $_SESSION["connexion"] == "OK") {

	echo "<h2>Envoyer un message privé</h2>";
	
}
else {
	echo "Vous devez vous connecter au préalable";
}

?>



