<!--Les Tableaux-->
<!--Les deux types de tableaux-->

<?php
$prenom = 'Nicole';
echo 'Bonjour ' . $prenom; // Cela affichera : Bonjour Nicole
?>

<!--Les tableaux numérotés-->

<?php
// La fonction array permet de créer un array
$prenoms = array ('François', 'Michel', 'Nicole', 'Véronique', 'Benoît');
?>

<!--Vous pouvez aussi créer manuellement le tableau case par case :-->
<?php
$prenoms[0] = 'François';
$prenoms[1] = 'Michel';
$prenoms[2] = 'Nicole';
?>

<!--Si vous ne voulez pas avoir à écrire vous-mêmes le numéro de la case que vous créez,
 vous pouvez laisser PHP le sélectionner automatiquement en laissant les crochets vides :-->
<?php
$prenoms[] = 'François'; // Créera $prenoms[0]
$prenoms[] = 'Michel'; // Créera $prenoms[1]
$prenoms[] = 'Nicole'; // Créera $prenoms[2]
?>

<!--Afficher un tableau numéroté-->

<?php
echo $prenoms[1];
?>

<!--Les tableaux associatifs-->

<?php
// On crée notre array $coordonnees
$coordonnees = array (
    'prenom' => 'François',
    'nom' => 'Dupont',
    'adresse' => '3 Rue du Paradis',
    'ville' => 'Marseille');
?>

<!--Il est aussi possible de créer le tableau case par case, comme ceci :-->

<?php
$coordonnees['prenom'] = 'François';
$coordonnees['nom'] = 'Dupont';
$coordonnees['adresse'] = '3 Rue du Paradis';
$coordonnees['ville'] = 'Marseille';
?>

<!--Afficher un tableau associatif-->

<?php
echo $coordonnees['ville'];
?>
