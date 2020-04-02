<?php
if(isset($_SESSION["connexion"]) && $_SESSION["connexion"] == "OK") {

	echo "<h2>Votre boîte de réception</h2>";
	
}
else {
	echo "Vous devez vous connecter au préalable";
}

?>

