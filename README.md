# FormationPHP
 Openclassroom; Concevez votre site web avec PHP et MySQL
https://fr.wikibooks.org/wiki/Programmation_PHP
Définition:
En PHP, les variables sont représentées par un signe dollar "$" suivi du nom de la variable, ou d'un underscore "_" pour les constantes (un warning apparait quand ces dernières sont redéfinies).

Le nom est sensible à la casse (par exemple $MaVariable est différent de $mavariable). Dans tous les cas, les variables doivent commencer par une lettre (a-z, A-Z) :

     $1MaVariable // incorrect
     $MaVariable  // correct
     $_MaVariable // correct
     $àéè         // correct
     _MaVariable  // correct


Exemple:

<?php
// Initialisation des variables
$Prenom = 'Romuald';
$Age    = '23 ans';
$Profession = 'informaticien';

// Affichage
echo 'Bonjour ' . $Prenom . ', tu as ' . $Age . ' et ta profession est ' . $Profession . '.';
// Ce qui affichera sur votre navigateur : Bonjour Romuald, tu as 23 ans et ta profession est informaticien.

// Une autre manière de faire
echo "Bonjour $Prenom, tu as $Age et ta profession est $Profession";
// Ce qui affichera sur votre navigateur : Bonjour Romuald, tu as 23 ans et ta profession est informaticien.

// Subtilité des " et des '
echo 'Bonjour $Prenom, tu as $Age et ta profession est $Profession';
// Ce qui affichera sur votre navigateur : Bonjour $Prenom, tu as $Age et ta profession est $Profession
// Le contenu d'une chaîne construite avec des " sera interprété par PHP et les variables
// éventuellement utilisées seront remplacées par leurs valeurs.
?>     