<?php
if (isset($_POST['sondage']) && ($_POST['sondage']!="")) {
    $sondage = $_POST['sondage'];
    $vote = $_POST['vote'];
   
    $base = mysqli_connect('serveur', 'identifiant', 'mot_de_passe', 'base');
    mysqli_query($base,"UPDATE `vote` SET `".$vote."`= `".$vote."` + 1 WHERE `id` = '".intval($sondage)."'");
    mysqli_query($base, "SET NAMES 'utf8'");
	$connexion = mysqli_fetch_assoc(mysqli_query($base, "SELECT * FROM `vote` WHERE `id` = '". $sondage."'"));

	$nbr_votes = $connexion['vote1'] + $connexion['vote2'] + $connexion['vote3'];
	if($nbr_votes == 0) {
		$pourcent1 = $pourcent2 = $pourcent3 = 0;
	} 
	else {
		$pourcent1 = round(($connexion['vote1']/$nbr_votes) * 100,2);
		$pourcent2 = round(($connexion['vote2']/$nbr_votes) * 100,2);
		$pourcent3 = round(($connexion['vote3']/$nbr_votes) * 100,2);
	}
	
	echo "<b>Question : ". $connexion['question'] . "</b><br/>";
	echo "1. <a href='#' id='vote1' class='".$sondage." sondage'>" .$connexion['reponse1']."</a> <meter min=0 max=100 value=".$pourcent1."></meter> ".$pourcent1." %<br/>";
	echo "2. <a href='#' id='vote2' class='".$sondage." sondage'>" .$connexion['reponse2']."</a> <meter min=0 max=100 value=".$pourcent2."></meter> ".$pourcent2." %<br/>";
	if($connexion['reponse3'] != "") {
		echo "3. <a href='#' id='vote3' class='".$sondage." sondage'>" .$connexion['reponse3']."</a> <meter min=0 max=100 value=".$pourcent3."></meter> ".$pourcent3." %<br/>";
	}
	echo "<em>Sur un total de ".$nbr_votes." votes</em>";

} 
?>
