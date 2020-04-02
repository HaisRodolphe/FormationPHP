<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr-FR">
	<head>
		<title>Bienvenue sur notre réseau social</title>
		<meta charset="UTF-8"></meta>
		<script src="http://code.jquery.com/jquery-3.2.1.js"></script>
	</head>
<body>
<script>
$(document).ready(function() {
	$("#valider").click(function() {
		var email = $("#email").val();
		var motdepasse = $("#mot_de_passe").val();
		if(email != "" & motdepasse != "") {
			var regex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,5}$/;
			if(regex.test(email)) {
				$.ajax({
					method: "POST",
					url: "valider_connexion.php",
					data: { email : email, motdepasse : motdepasse }
				})
				.done(function(msg) {
					console.log(msg);
					if(msg=="ok") {
						location.reload();
					}
					else {
						$("#erreur").html("Votre e-mail ou votre mot de passe sont incorrects");
					}
				});
			}
			else {
				$("#email_erreur").html("Votre e-mail est incorrect");
			}
		}
		else {
			$("#erreur").html("Veuillez remplir les champs");
		}
	});
});
</script>


<?php
if(isset($_SESSION['connexion']) && $_SESSION['connexion'] == "OK") {
	require_once("navigation.php");
}
else {
	?>
	<h2>Connectez-vous</h2>
	<span id="erreur"></span>
		<label for="email">Votre e-mail</label> : <input type="email" id="email" name="email" placeholder="Votre e-mail"/><span id="email_erreur"></span><br/>
		<label for="mot_de_passe">Votre mot de passe</label> : <input type="text" id="mot_de_passe" name="mot_de_passe" placeholder="Votre mot de passe"/><br/>
		<button id="valider">Connexion</button>
	<p>Pas encore de compte ? <a href="creation_compte.php">Cliquez ici</a></p>
	<?php
}
?>

</body>
</html>
