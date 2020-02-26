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







