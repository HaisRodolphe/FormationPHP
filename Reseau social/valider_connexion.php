<?php
if (isset($_POST['email']) && ($_POST['email']!="")) {
   $email = $_POST['email'];
   $motdepasse = $_POST['motdepasse'];
   
   $base = mysqli_connect('localhost', 'root', '', 'reseau');
   $connexion = mysqli_fetch_assoc(mysqli_query($base, "SELECT * FROM `utilisateurs` WHERE `email` = '". $email."'"));
   if($connexion) {
	   $motdepasseUtilisateur = $connexion["motdepasse"];
	   if($motdepasse == $motdepasseUtilisateur) {
		    $id = $connexion["id"];
		  	$prenom = $connexion["prenom"];
	        $nom = $connexion["nom"];
			session_start();
			$_SESSION['prenom'] = $prenom;
			$_SESSION['nom'] = $nom;
			$_SESSION['id'] = $id;
			$_SESSION['connexion'] = "OK";
			echo "ok";
	   }
	   else {
		   echo "Mot de passe incorrect";
	   }
   }
   else {
	   echo "Connexion échouée";
   }
} else {
   echo "Il y a une erreur";
}
?>
