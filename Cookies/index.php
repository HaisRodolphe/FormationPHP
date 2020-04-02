<html>
<head>
<title>Système de cookies</title>
<script src="http://code.jquery.com/jquery-3.2.1.js"></script>
</head>
<body>

<script>
$(document).ready(function() {
	
	$("#cookie").click(function() {
		$.ajax({
           method: "POST",
           url: "ajax.php",
           data: { cookie : "ok" }
		})
        .done(function(msg) {
		   $("#bandeau").fadeOut();
        });
	});

});

</script>

<?php
if(isset($_COOKIE["cookie"]) && $_COOKIE["cookie"] == "ok") {
	echo $_COOKIE["cookie"];
	echo "<br/>";
	echo "Vous avez accepté l'enregistrement de cookies sur ce site";
}
else {
	?>
	<div id="bandeau">
	Autorisez-vous ce site à enregistrer des cookies ?
	<button id="cookie">OK</button>
	</div>

<?php
}
?>

</body>
</html>
