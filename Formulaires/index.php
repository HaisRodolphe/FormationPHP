<style>
form {
	line-height:2em;
}
input[type="submit"] {
	margin-top:10px;
}
</style>


<?php

$erreur = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if(empty($_POST["genre"])) {
		$erreur_genre = "Veuillez cocher une case";
		$erreur = true;
	}
	else {
		$genre = $_POST["genre"];
	}

	if(empty($_POST["prenom"])) {
		$erreur_prenom = "Veuillez indiquer votre prénom";
		$erreur = true;
	}
	else {
		if(!preg_match("#^[a-zA-Z éèêëàôçù\-]+$#", $_POST["prenom"])) {
			$erreur_prenom = "Veuillez n'utiliser que des lettres";
			$erreur = true;
		}
		else {
			$prenom = $_POST["prenom"];
		}
	}
	
	if(empty($_POST["nom"])) {
		$erreur_nom = "Veuillez indiquer votre nom";
		$erreur = true;
	}
	else {
		if(!preg_match("#^[a-zA-Z éèêëàôçù\-]+$#", $_POST["prenom"])) {
			$erreur_nom = "Veuillez n'utiliser que des lettres";
			$erreur = true;
		}
		else {
			$nom = $_POST["nom"];
		}
	}
	
	if(empty($_POST["email"])) {
		$erreur_email = "Veuillez indiquer votre e-mail";
		$erreur = true;
	}
	else {
		if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
			$erreur_email = "Votre e-mail est incorrect";
			$erreur = true;
		}
		else {
			$email = $_POST["email"];
		}
	}
	
	if(empty($_POST["telephone"])) {
		$erreur_telephone = "Veuillez indiquer votre numéro de téléphone";
		$erreur = true;
	}
	else {
		if(!preg_match("#^[0-9]{2}([-. ]?[0-9]{2}){4}$#", $_POST["telephone"])) {
			$erreur_telephone = "Votre numéro n'est pas correct";
			$erreur = true;
		}
		else {
			$telephone = $_POST["telephone"];
		}
	}
	
	if(empty($_POST["mot_de_passe"])) {
		$erreur_mdp = "Veuillez choisir un mot de passe";
		$erreur = true;
	}
	else {
		if(empty($_POST["mot_de_passe2"])) {
			$erreur_mdp2 = "Veuillez confirmer votre mot de passe";
			$erreur = true;
		}
		else {
			if(strlen($_POST["mot_de_passe"]) < 8) {
				$erreur_mdp = "Votre mot de passe doit avoir au moins 8 caractères";
				$erreur = true;
			}
			else {
				if($_POST["mot_de_passe"] != $_POST["mot_de_passe2"]) {
					$erreur_mdp2 = "Les mots de passe ne sont pas identiques";
					$erreur = true;
				}
				else {
					$mot_de_passe = $_POST["mot_de_passe"];
				}
			}
		}
	}
	
	if(empty($_POST["choix"])) {
		$erreur_choix = "Veuillez choisir une option";
		$erreur = true;
	}
	else {
		$choix = $_POST["choix"];
	}
	
	if(!$erreur) {
		echo "Bienvenue ".$genre." ".$prenom." ".$nom;
		exit;
	}
}


?>


<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  <fieldset>
    <legend>Créez votre compte</legend>
	<input type="radio" name="genre" value="monsieur" <?php if(isset($genre) && $genre == "monsieur") echo "checked"; ?>/><label for="monsieur">Monsieur</label>
	<input type="radio" name="genre" value="madame" <?php if(isset($genre) && $genre == "madame") echo "checked"; ?>/><label for="madame">Madame</label><span><?php if(isset($erreur_genre)) echo $erreur_genre; ?></span><br/>

    <label for="prenom">Prénom</label>
	<input type="text" name="prenom" id="prenom" placeholder="Votre prénom" value="<?php if(isset($prenom)) echo $prenom; ?>" /><span><?php if(isset($erreur_prenom)) echo $erreur_prenom; ?></span>
	<br/>
	<label for="nom">Nom</label>
	<input type="text" name="nom" id="nom" placeholder="Votre nom" value="<?php if(isset($nom)) echo $nom; ?>"/><span><?php if(isset($erreur_nom)) echo $erreur_nom; ?></span><br/>
	<label for="email">E-mail</label>
    <input type="email" name="email" id="email" placeholder="exemple@domaine.com" value="<?php if(isset($email)) echo $email; ?>"/><span><?php if(isset($erreur_email)) echo $erreur_email; ?></span><br/>
    <label for="telephone">Téléphone</label>
    <input name="telephone" type="tel" id="telephone" placeholder="par ex.&nbsp;: 0102030405" value="<?php if(isset($telephone)) echo $telephone; ?>"/><span><?php if(isset($erreur_telephone)) echo $erreur_telephone; ?></span><br/>
	<label for="mot_de_passe">Mot de passe</label>
    <input name="mot_de_passe" type="password" id="mot_de_passe" /><span><?php if(isset($erreur_mdp)) echo $erreur_mdp; ?></span><br/>
	<label for="mot_de_passe2">Confirmez votre mot de passe</label>
    <input name="mot_de_passe2" type="password" id="mot_de_passe2" /><span><?php if(isset($erreur_mdp2)) echo $erreur_mdp2; ?></span>
  </fieldset>
  
  <fieldset>
	<legend>Indiquez vos préférences</legend>
	<input type="checkbox" name="choix[]" value="services" id="services" <?php if(isset($choix) && in_array("services", $choix)) echo "checked"; ?> /> <label for="services">Nos services</label><br/>
	<input type="checkbox" name="choix[]" value="actualite" id="actualite" <?php if(isset($choix) && in_array("actualite", $choix)) echo "checked"; ?>/> <label for="actualité">Notre actualité</label><br/>
	<input type="checkbox" name="choix[]" value="autre" id="autre" <?php if(isset($choix) && in_array("autre", $choix)) echo "checked"; ?>/> <label for="autre">Autre</label><br/>
	<span><?php if(isset($erreur_choix)) echo $erreur_choix; ?></span>
  </fieldset>
  
  <input type="submit" value="Valider" />
</form>