<?php
if(isset($_FILES['avatar'])) {
	
	print_r($_FILES['avatar']);
	
	$dossier = 'upload/';
	$fichier = basename($_FILES['avatar']['name']);
	$taille_max = 1048576;
	$taille = filesize($_FILES['avatar']['tmp_name']);
	
	$extensions = array('png', 'gif', 'jpg', 'jpeg');
	$extension_fichier = strtolower(substr(strrchr($_FILES['avatar']['name'], '.'),1));
	echo "<br/><strong>";
	echo $extension_fichier;
	echo "</strong><br/>";
	if (!in_array($extension_fichier,$extensions)) {
		$erreur = "Vous devez transférer un fichier de type PNG, GIF, JPG ou JPEG";
	}
	if($taille>$taille_max)
	{
		 $erreur = 'Le fichier est trop gros...';
	}
	if(!isset($erreur)) //S'il n'y a pas d'erreur, on upload
	{
		 //On formate le nom du fichier ici...
		 $fichier = strtr($fichier, 
			  'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ', 
			  'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
		 $fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);
		 
		 if(move_uploaded_file($_FILES['avatar']['tmp_name'], $dossier . $fichier)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
		 {
			  echo 'Upload effectué avec succès !';
		 }
		 else //Sinon (la fonction renvoie FALSE).
		 {
			  echo 'Echec de l\'upload !';
		 }
	}
	else
	{
		 echo $erreur;
	}

}
else {
?>


<form method="POST" action="index.php" enctype="multipart/form-data">
    <input type="hidden" name="MAX_FILE_SIZE" value="1048576">
    Fichier : <input type="file" name="avatar">
    <input type="submit" name="envoyer" value="Envoyer le fichier">
</form>

<?php 
}
?>

