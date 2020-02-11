jQuery(document).ready(function() {

	jQuery("#rechercher").click(function(e) {
	e.preventDefault(); // Le bouton n'enverra pas le formulaire
	var mot_cle = jQuery("#recherche_twitter").val();
	
	jQuery.ajax({
		type: "POST",
		url: "rechercher_tweets.php",
		data: { mot_recherche: mot_cle },

		success: function(msg1) {
			
			jQuery("#zone_reponse").html(msg1);
			jQuery("#zone_reponse").fadeIn();
			
		}
	})
});



});
