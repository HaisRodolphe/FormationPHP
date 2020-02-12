<?php
if (isset($_POST['identifiant']) && ($_POST['identifiant']!="")) {
   $identifiant = $_POST['identifiant'];
   $motdepasse = $_POST['motdepasse'];
   //echo $identifiant . " - " .$motdepasse;
   
   $base = mysqli_connect('localhost', 'root', '', 'test');
   $connexion = mysqli_fetch_assoc(mysqli_query($base, "SELECT * FROM `utilisateurs` WHERE `email` = '". $identifiant."'"));
   print_r($connexion);
   if($connexion) {
	   $motdepasseUtilisateur = $connexion["motdepasse"];
	   if($motdepasse == $motdepasseUtilisateur) {
		  	$prenom = $connexion["prenom"];
	        $nom = $connexion["nom"];
			echo "Bienvenue " . $prenom . " " . $nom;
			session_start();
			$_SESSION['prenom'] = $prenom;
			$_SESSION['nom'] = $nom;
			
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
