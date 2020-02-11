<!DOCTYPE html>
<html>
<head>
	<title>Système de vote en temps réel</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<script src="http://code.jquery.com/jquery-3.2.1.js"></script>
</head>

<body>
	
<script>
$(document).ready(function() {
	$(".sondage").click(function() {
		console.log("On a cliqué sur un sondage");
		var idVote = $(this).attr("id");
		var idSondage = $(this).attr("class").split(" ");
		console.log(idVote);
		console.log(idSondage[0]);
	
	$.ajax({
           method: "POST",
           url: "ajax.php",
           data: { sondage : idSondage[0], vote : idVote }
		})
        .done(function(msg) {
		   $("#sond"+idSondage[0]).html(msg);
		});
  	});
});
</script>
	
<?php 
$base = mysqli_connect('serveur', 'identifiant', 'mot_de_passe', 'base');
mysqli_query($base, "SET NAMES 'utf8'");
$resultat = mysqli_query($base, 'SELECT * FROM vote');
$compteur = mysqli_num_rows($resultat);
echo $compteur . " sondage(s) enregistré(s)<br/><br/>";

while($donnees = mysqli_fetch_assoc($resultat)) {
	$nbr_votes = $donnees['vote1'] + $donnees['vote2'] + $donnees['vote3'];
	$id_sondage = $donnees['id'];
	if($nbr_votes == 0) {
		$pourcent1 = $pourcent2 = $pourcent3 = 0;
	} 
	else {
		$pourcent1 = round(($donnees['vote1']/$nbr_votes) * 100,2);
		$pourcent2 = round(($donnees['vote2']/$nbr_votes) * 100,2);
		$pourcent3 = round(($donnees['vote3']/$nbr_votes) * 100,2);
	}
	
	echo "<div id=sond".$donnees['id']."><b>Question : ". $donnees['question'] . "</b><br/>";
	echo "1. <a href='#' id='vote1' class='".$id_sondage." sondage'>" .$donnees['reponse1']."</a> <meter min=0 max=100 value=".$pourcent1."></meter> ".$pourcent1." %<br/>";
	echo "2. <a href='#' id='vote2' class='".$id_sondage." sondage'>" .$donnees['reponse2']."</a> <meter min=0 max=100 value=".$pourcent2."></meter> ".$pourcent2." %<br/>";
	if($donnees['reponse3'] != "") {
		echo "3. <a href='#' id='vote3' class='".$id_sondage." sondage'>" .$donnees['reponse3']."</a> <meter min=0 max=100 value=".$pourcent3."></meter> ".$pourcent3." %<br/>";
	}
	echo "<em>Sur un total de ".$nbr_votes." votes</em></div><br/><br/>";
}



?>

<div id="debug"></div>
</body>
</html>