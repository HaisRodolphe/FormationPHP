<?php
if(isset($_SESSION["connexion"]) && $_SESSION["connexion"] == "OK") {
	
	?>
	<div id="navigation">
		<ul>
			<li><a href="index.php"><?php echo $_SESSION["prenom"]." ".$_SESSION["nom"]; ?></a></li>
			<li><a href="index.php?rub=voir_profil">Voir profil</a></li>
			<li><a href="index.php?rub=modif_profil">Modifier profil</a></li>
			<li><a href="index.php?rub=contacts">Liste contact</a></li>
			<li><a href="index.php?rub=bal">Boîte de réception</a></li>
			<li><a href="index.php?rub=mp">Envoyer message privé</a></li>
			<li><a href="index.php?rub=deconnexion">Déconnexion</a></li>
		</ul>
	</div>
	
	<div id="principal">
		<?php 
			if(isset($_GET["rub"])) {
				if($_GET["rub"] == "voir_profil") {
					require_once("voir_profil.php");
				}
				if($_GET["rub"] == "modif_profil") {
					require_once("modifier_profil.php");
				}
				if($_GET["rub"] == "contacts") {
					require_once("contacts.php");
				}
				if($_GET["rub"] == "bal") {
					require_once("boite_reception.php");
				}
				if($_GET["rub"] == "mp") {
					require_once("message_prive.php");
				}
				if($_GET["rub"] == "deconnexion") {
					session_destroy();
					header("Location:http://localhost/reseau");
					exit();
				}
			}
			else {
				require_once("mur.php");
			}
		?>	
	</div>
		
	<?php
}
else {
	echo "Vous devez vous connecter au préalable";
}

?>
