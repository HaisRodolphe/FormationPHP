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

<!--Parcourir un tableau-->

<!--La boucle "for"-->
<?php
// On crée notre array $prenoms
$prenoms = array ('François', 'Michel', 'Nicole', 'Véronique', 'Benoît');

// Puis on fait une boucle pour tout afficher :
for ($numero = 0; $numero < 5; $numero++)
{
    echo $prenoms[$numero] . '<br />'; // affichera $prenoms[0], $prenoms[1] etc.
}
?>

<!--La boucle "foreach"-->
<?php
$prenoms = array ('François', 'Michel', 'Nicole', 'Véronique', 'Benoît');

foreach($prenoms as $element)
{
    echo $element . '<br />'; // affichera $prenoms[0], $prenoms[1] etc.
}
?>

<!--L'avantage deforeachest qu'il permet aussi de parcourir les tableaux associatifs.-->

<?php
$coordonnees = array (
    'prenom' => 'François',
    'nom' => 'Dupont',
    'adresse' => '3 Rue du Paradis',
    'ville' => 'Marseille');

foreach($coordonnees as $element)
{
    echo $element . '<br />';
}
?>

<!--Toutefois, avec cet exemple, on ne récupère que la valeur. Or, 
on peut aussi récupérer la clé de l'élément. On doit dans ce cas écrireforeachcomme ceci :-->

<?php foreach($coordonnees as $cle => $element) ?>

<!--exemple :-->
<?php
$coordonnees = array (
    'prenom' => 'François',
    'nom' => 'Dupont',
    'adresse' => '3 Rue du Paradis',
    'ville' => 'Marseille');

foreach($coordonnees as $cle => $element)
{
    echo '[' . $cle . '] vaut ' . $element . '<br />';
}
?>
<!--$cle, qui contiendra la clé de l'élément en cours d'analyse (« prenom », « nom », etc.) ;-->
<!--$element, qui contiendra la valeur de l'élément en cours (« François », « Dupont », etc.).-->

<!--Afficher rapidement un array avecprint_r-->
<!--Cette commande a toutefois un défaut : elle ne renvoie pas de code HTML comme<br />
pour les retours à la ligne. Pour bien les voir, il faut donc utiliser la balise HTML<pre>
qui nous permet d'avoir un affichage plus correct.-->
<?php
$coordonnees = array (
    'prenom' => 'François',
    'nom' => 'Dupont',
    'adresse' => '3 Rue du Paradis',
    'ville' => 'Marseille');

echo '<pre>';
print_r($coordonnees);
echo '</pre>';
?>

<!--Rechercher dans un tableau-->

<!--On doit d'abord lui donner le nom de la clé à rechercher,
 puis le nom de l'array dans lequel on fait la recherche :-->
 <?php array_key_exists('cle', $array); ?>

<!--Exemple-->
<!--On ne trouvera que « nom », et pas « pays » (logique). 
Seule la première condition sera donc exécutée.-->
<?php
$coordonnees = array (
    'prenom' => 'François',
    'nom' => 'Dupont',
    'adresse' => '3 Rue du Paradis',
    'ville' => 'Marseille');

if (array_key_exists('nom', $coordonnees))
{
    echo 'La clé "nom" se trouve dans les coordonnées !';
}

if (array_key_exists('pays', $coordonnees))
{
    echo 'La clé "pays" se trouve dans les coordonnées !';
}

?>

<!--Vérifier si une valeur existe dans l'array : in_array-->
<!--On ne voit que le message pour la cerise, tout simplement parce 
quein_arraya renvoyétruepour « Cerise » etfalsepour « Myrtille ».-->
<?php
$fruits = array ('Banane', 'Pomme', 'Poire', 'Cerise', 'Fraise', 'Framboise');

if (in_array('Myrtille', $fruits))
{
    echo 'La valeur "Myrtille" se trouve dans les fruits !';
}

if (in_array('Cerise', $fruits))
{
    echo 'La valeur "Cerise" se trouve dans les fruits !';
}
?>

<!--Récupérer la clé d'une valeur dans l'array :array_search-->
<?php
$fruits = array ('Banane', 'Pomme', 'Poire', 'Cerise', 'Fraise', 'Framboise');

$position = array_search('Fraise', $fruits);
echo '"Fraise" se trouve en position ' . $position . '<br />';

$position = array_search('Banane', $fruits);
echo '"Banane" se trouve en position ' . $position;
?>

