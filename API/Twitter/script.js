jQuery(document).ready(function() {

	jQuery("#envoyer").click(function(e) {
		e.preventDefault(); // Le bouton n'enverra pas le formulaire
		var id_twitter = jQuery("#nom_twitter").val();
		
		jQuery.ajax({
			type: "POST",
			url: "afficher_tweet.php",
			data: { compte_twitter: id_twitter },

			success: function(msg1) {
				
				jQuery("#zone_reponse").html(msg1);
				jQuery("#zone_reponse").fadeIn();
				
			}
		})
	});
});
