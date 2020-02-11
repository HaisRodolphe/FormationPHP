<?php
$base = mysqli_connect('localhost', 'root', '', 'test');
mysqli_query($base, "SET NAMES 'utf8'");
if(!empty($_POST["nomPays"])) {
	$resultat = mysqli_query($base, "SELECT nom_fr_fr FROM pays where nom_fr_fr LIKE '".$_POST["nomPays"]."%' ORDER BY nom_fr_fr LIMIT 0,6");	

	if(!empty($resultat)) {
	?>
		<ul id="listePays">
		<?php
		foreach($resultat as $pays) {
			?>
			<li onClick="choixPays('<?php echo $pays["nom_fr_fr"]; ?>');"><?php echo $pays["nom_fr_fr"]; ?></li>
		<?php } ?>
		</ul>
<?php } 
} ?>