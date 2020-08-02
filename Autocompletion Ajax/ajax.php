<?php
require_once 'config.php';


if($_GET['type'] == 'pays'){
	$result = mysqli_query($base, "SELECT nom_fr_fr FROM pays where nom_fr_fr LIKE '".strtoupper($_GET['nomPays'])."%'");	
	$data = array();
	while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
		array_push($data, $row['nom_fr_fr']);	
	}	
	echo json_encode($data);
}

?>
