<?php 
if(isset($_POST['email']) && $_POST['email']!="") {
	$destinataire = $_POST['email'];
	
	if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $destinataire)) {
		$sautLigne = "\r\n";
	}
	else {
		$sautLigne = "\n";
	}

	$separateur = md5(uniqid(microtime(), TRUE));
		
	$header = "From: \"Mon site web\"<monsite@adresse.fr>".$sautLigne;
	$header .= "Mime-Version: 1.0".$sautLigne;
	$header .= "Content-Type: multipart/mixed;boundary=".$separateur.$sautLigne;
	$header .= $sautLigne;

	$objet = "Inscription à la newsletter";

	$msg = "--".$separateur.$sautLigne;
	$msg .= "Content-type:text/plain;charset=utf-8".$sautLigne;
	$msg .= "Content-transfer-encoding:8bit".$sautLigne;
	$msg .= "Voici un message avec une pièce jointe.".$sautLigne;
 
	// Pièce jointe
	$fichier = "image.jpg";
	if (file_exists($fichier)) {
		$typeFichier = filetype($fichier);
		$tailleFichier = filesize($fichier);
	 
		$handle = fopen($fichier, "r") or die("Impossible d'ouvrir le fichier ".$fichier);
		$contenu = fread($handle, $tailleFichier);
		$contenu = chunk_split(base64_encode($contenu));
		$f = fclose($handle);
	 
		$msg .= "--".$separateur.$sautLigne;
		$msg .= "Content-type:".$typeFichier.";name=".$fichier.$sautLigne;
		$msg .= "Content-transfer-encoding:base64".$sautLigne;
		$msg .= $contenu.$sautLigne;
	}
	
	// 2ème pièce jointe
	$fichier = "catalogue.pdf";
	if (file_exists($fichier)) {
		$typeFichier = filetype($fichier);
		$tailleFichier = filesize($fichier);
	 
		$handle = fopen($fichier, "r") or die("Impossible d'ouvrir le fichier ".$fichier);
		$contenu = fread($handle, $tailleFichier);
		$contenu = chunk_split(base64_encode($contenu));
		$f = fclose($handle);
	 
		$msg .= "--".$separateur.$sautLigne;
		$msg .= "Content-type:".$typeFichier.";name=".$fichier.$sautLigne;
		$msg .= "Content-transfer-encoding:base64".$sautLigne;
		$msg .= $contenu.$sautLigne;
	}
 
	$msg .= "--".$separateur.$sautLigne;
	
	if(filter_var($destinataire, FILTER_VALIDATE_EMAIL)) {
		echo "Le mail est correct";
		mail($destinataire, $objet, $msg, $header);
		echo "<br/>Newsletter envoyée à ".$_POST['email'];
	}
	else {
		echo "Le mail est incorrect";
	}
	
}
else {
	?>
	<h1>Inscrivez-vous à notre newsletter</h1>
	<form method="post" action="index.php">
		<label for="email">Votre e-mail</label> : <input type="text" name="email" placeholder="Votre e-mail" />
		<input type="submit" value="Valider" />
	</form> 
	<?php
}
?>



