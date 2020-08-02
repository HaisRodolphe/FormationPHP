<?php 

if(isset($_GET['nom']) && isset($_GET['prenom']) && $_GET['prenom']!="" && $_GET['nom']!="") {
	echo "Bonjour ".$_GET['prenom']." ".$_GET['nom'];
}
else {
	echo "Veuillez indiquer votre prénom et votre nom";
}

?>

<?php 
if(isset($_POST['nom']) && isset($_POST['prenom']) && $_POST['prenom']!="" && $_POST['nom']!="") {
	echo "Bonjour ".$_POST['prenom']." ".$_POST['nom'];
}
else {
	?>
	<form method="post" action="index.php">
		<label for="prenom">Votre prénom</label> : <input type="text" name="prenom" placeholder="Votre prénom" /><br/>
		<label for="nom">Votre nom</label> : <input type="text" name="nom" placeholder="Votre nom" /><br/>
		<input type="submit" value="Envoyer" />
	</form> 
	<?php
}
?>

<h2>Version avec la requête GET</h2>

<form method="get" action="index.php">
	<label for="prenom">Votre prénom</label> : <input type="text" name="prenom" placeholder="Votre prénom" /><br/>
	<label for="nom">Votre nom</label> : <input type="text" name="nom" placeholder="Votre nom" /><br/>
	<input type="submit" value="Envoyer" />
</form> 

<h2>Version avec la requête POST</h2>

<form method="post" action="index.php">
	<label for="prenom">Votre prénom</label> : <input type="text" name="prenom" placeholder="Votre prénom" /><br/>
	<label for="nom">Votre nom</label> : <input type="text" name="nom" placeholder="Votre nom" /><br/>
	<input type="submit" value="Envoyer" />
</form> 
