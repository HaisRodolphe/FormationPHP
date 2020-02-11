<?php
session_start();
?>
<html>
<head>
<title>Authentification</title>
<script src="http://code.jquery.com/jquery-3.2.1.js"></script>
</head>
<body>

<script>
$(document).ready(function() {
	
	$("#valider").click(function() {
		console.log("On a cliqué sur le bouton");
		var identifiant = $("#identifiant").val();
		var motdepasse = $("#mot_de_passe").val();
		console.log("Identifiant : " + identifiant + " Mot de passe : " + motdepasse);
		$.ajax({
           method: "POST",
           url: "ajax.php",
           data: { identifiant : identifiant, motdepasse : motdepasse }
		})
        .done(function(msg) {
           location.reload();
        });
	});
	
	$("#deconnexion").click(function() {
		console.log("On se déconnecte");
		$.ajax({
           method: "POST",
           url: "deconnexion.php"
		})
		.done(function() {
			location.reload();
		});
	});

});

</script>


<?php

$base = mysqli_connect('localhost', 'root', '', 'test');
$resultat = mysqli_query($base, 'SELECT * FROM utilisateurs LIMIT 0, 10');
$compteur = mysqli_num_rows($resultat);
echo $compteur . " utilisateurs(s) existant(s)<br/><br/>";

if(isset($_SESSION['nom'] ) && $_SESSION['nom'] !='') {
	echo "Bienvenue " . $_SESSION['prenom'] . " " . $_SESSION['nom'];
	echo "<br/><a href='#' id='deconnexion'>Se déconnecter</a>";
}
else {
	?>


<br/><br/>
<label for="identifiant">Identifiant</label> : <input type="text" id="identifiant" name="identifiant" placeholder="Votre identifiant"/><br/>
<label for="mot_de_passe">Mot de passe</label> : <input type="text" id="mot_de_passe" name="mot_de_passe" placeholder="Votre mot de passe"/><br/>
<button id="valider">Connexion</button>

<span id="resultat"></span>
<?php } ?>

</body>
</html>
