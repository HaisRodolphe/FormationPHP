<?php
	require_once('class-db.php');

	if ( !class_exists('QUERY') ) {
		class QUERY {
			public function charger_utilisateur($utilisateur_id) {
				global $db;
				
				$table = 'utilisateurs';
				
				$query = "
								SELECT * FROM $table
								WHERE ID = $utilisateur_id
							";
				
				$obj = $db->select($query);
				
				if ( !$obj ) {
					return "Utilisateur inexistant";
				}
				
				return $obj[0];
			}
			
			public function recup_contacts($utilisateur_id) {
				global $db;
				$table = 'amis';
				$query = "
					SELECT id, id_ami FROM $table
					WHERE id_utilisateur = '$utilisateur_id'
				";
				$contacts = $db->select($query);
				foreach ( $contacts as $contact ) {
					$contacts_ids[] = $contact->id_ami;
				}
				return $contact_ids;
			}

			public function recup_liste_amis($liste_amis) {
				foreach ( $liste_ami as $id_ami ) {
					$utilisateurs[] = $this->charger_utilisateur($id_ami);
				}
				foreach ( $utilisateurs as $utilisateur ) { 
					echo $utilisateur->prenom." ".$utilisateur->nom."<br/>";
				}
			}
		}
	}
	
	$query = new QUERY;
?>