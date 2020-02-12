<html>
<head>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.0/themes/smoothness/jquery-ui.css" />
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.min.js"></script>
</head>
<body>  
  
<style>
	.recherche_pays {border: 1px solid #a8d4b1;background-color: #c6f7d0;margin: 2px 0px;padding:40px;border-radius:4px;}
	#listePays{float:left;list-style:none;margin-top:-3px;padding:0;width:190px;position: absolute;}
	#listePays li{padding: 10px; background: #f0f0f0; border-bottom: #bbb9b9 1px solid;}
	#listePays li:hover{background:#ece3d2;cursor: pointer;}
</style>

<script>
$(document).ready(function() {
	$('#nom_pays').autocomplete({
		source: function( request, response ) {
			$.ajax({
				url : 'ajax.php',
		    	dataType: "json",
				data: {
					nomPays: request.term,
					type: 'pays'
				},
				success: function( data ) {
					response( $.map( data, function( item ) {
						return {
							label: item,
							value: item
						}
					}));
				}
			});
		},
		autoFocus: true,
		minLength: 0      	
	});
			  
	
	$("#recherche").keyup(function(){
		$.ajax({
			type: "POST",
			url: "recherchePays.php",
			data:'nomPays='+$(this).val(),
			success: function(data){
				$("#suggestions").show();
				$("#suggestions").html(data);
				$("#recherche").css("background","#FFF");
			}
		});
	});
	

});

function choixPays(val) {
	$("#recherche").val(val);
	$("#suggestions").hide();
}
	 
</script>

<h2>Version jQuery UI - Autocomplete</h2>
<input id="nom_pays" class="form-control txt-auto" placeholder="Saisissez un pays"/>
<br/><br/>
<h2>Version jQuery - Ajax</h2>
<div class="recherche_pays">
	<input type="text" id="recherche" placeholder="Nom pays" />
	<div id="suggestions"></div>
</div>

</body>
</html>