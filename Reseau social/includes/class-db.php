<?php
	if ( !class_exists ('DB') ) {
		class DB {
			public function __construct() {
				$mysqli = new mysqli('localhost', 'root', '', 'reseau');
				
				if ($mysqli->connect_errno) {
					printf("Connexion impossible %s\n", $mysqli->connect_error);
					exit();
				}
				
				$this->connexion =  $mysqli;
			}
			
			public function insert($requete) {				
				$resultat = $this->connexion->query($requete);
				
				return $resultat;
			}
			
			public function update($requete) {
				$resultat = $this->connexion->query($requete);
				
				return $resultat;
			}
			
			public function select($requete) {							
				$resultat = $this->connexion->query($requete);
				
				if ( !$resultat ) {
					return false;
				}
				
				while ( $obj = $resultat->fetch_object() ) {
					$resultats[] = $obj;
				}
				
				return $resultats;
			}
		}
	}
	
	$db = new DB;
?>