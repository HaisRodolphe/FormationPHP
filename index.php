<!--Fonction "calculCube"-->
<!--Appeler une fonction-->
<?php
calculCube();
?>

<!--Ainsi,"calculCubes" aura qu'elle doit travailler avec le nombre 4.-->
<?php
calculCube(4);
?>

<!--Souvent, les fonctions acceptent plusieurs paramètres.
Vous devez dans ce cas les séparer par des virgules :-->
<?php
fonctionImaginaire(17, 'Vert', true, 41.7);
?>


<!--Récupérer la valeur de retour de la fonction-->
<?php
$volume = calculCube(4);
?>

<!--Les fonctions prêtes à l'emploi de PHP-->
<!--Traitement des chaînes de caractères-->
<?php
$phrase = 'Bonjour tout le monde ! Je suis une phrase !';
$longueur = strlen($phrase);
 
 
echo 'La phrase ci-dessous comporte ' . $longueur . ' caractères :<br />' . $phrase;
?>

<!--"str_replace": rechercher et remplacer-->
<!--str_replaceremplace une chaîne de caractères par une autre. Exemple :-->
<?php
$ma_variable = str_replace('b', 'p', 'bim bam boum');
 
echo $ma_variable;
?>

<!--"str_shuffle": mélanger les lettres-->
<?php
$chaine = 'Cette chaîne va être mélangée !';
$chaine = str_shuffle($chaine);
 
echo $chaine;
?>

<!--"strtolower": écrire en minuscules-->
<!--"strtolower" met tous les caractères d'une chaîne en minuscules.-->
<?php
$chaine = 'COMMENT CA JE CRIE TROP FORT ???';
$chaine = strtolower($chaine);
 
echo $chaine;
?>

<!--Récupérer la date-->
<!--Si vous voulez afficher l'année, il faut donc envoyer le paramètre Y à la fonction :-->
<?php
$annee = date('Y');
echo $annee;
?>

<!--On peut bien entendu faire mieux, voici la date complète et l'heure :-->
<?php
// Enregistrons les informations de date dans des variables

$jour = date('d');
$mois = date('m');
$annee = date('Y');

$heure = date('H');
$minute = date('i');

// Maintenant on peut afficher ce qu'on a recueilli
echo 'Bonjour ! Nous sommes le ' . $jour . '/' . $mois . '/' . $annee . 'et il est ' . $heure. ' h ' . $minute;
?>

<!--Créer ses propres fonctions-->
<!--Premier exemple : dis bonjour au Monsieur-->

<?php
$nom = 'Sandra';
echo 'Bonjour, ' . $nom . ' !<br />';

$nom = 'Patrick';
echo 'Bonjour, ' . $nom . ' !<br />';

$nom = 'Claude';
echo 'Bonjour, ' . $nom . ' !<br />';
?>

<!--Vous voyez, c'est un peu fatigant à la longue… Alors nous allons créer une 
fonction qui le fait à notre place !-->

<?php
function DireBonjour($nom)
{
    echo 'Bonjour ' . $nom . ' !<br />';
}

DireBonjour('Marie');
DireBonjour('Patrice');
DireBonjour('Edouard');
DireBonjour('Pascale');
DireBonjour('François');
DireBonjour('Benoît');
DireBonjour('Père Noël');
?>

<!--Deuxième exemple : calculer le volume d'un cône-->
<!--calculer le volume d'un cône-->

<?php
// Calcul du volume d'un cône de rayon 5 et de hauteur 2
$volume = 5 * 5 * 3.14 * 2 * (1/3);
echo 'Le volume du cône de rayon 5 et de hauteur 2 est : ' . $volume . ' cm<sup>3</sup><br />';

// Calcul du volume d'un cône de rayon 3 et de hauteur 4
$volume = 3 * 3 * 3.14 * 4 * (1/3);
echo 'Le volume du cône de rayon 3 et de hauteur 4 est : ' . $volume . ' cm<sup>3</sup><br />';
?>

<!--Nous allons donc créer une fonctionVolumeCone, qui va calculer le volume du cône en fonction du rayon et de la hauteur. 
Cette fonction ne va rien afficher, on veut juste qu'elle nous renvoie le volume qu'on cherche.-->

<?php
// Ci-dessous, la fonction qui calcule le volume du cône
function VolumeCone($rayon, $hauteur)
{
   $volume = $rayon * $rayon * 3.14 * $hauteur * (1/3); // calcul du volume
   return $volume; // indique la valeur à renvoyer, ici le volume
}

$volume = VolumeCone(3, 1);
echo 'Le volume d\'un cône de rayon 3 et de hauteur 1 est de ' . $volume;
?>

<!--merci-->



















