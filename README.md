# FormationPHP
Les tableaux
Nous abordons ici un aspect très important du PHP : les arrays.

Vous allez voir qu'il s'agit de variables « composées », que l'on peut imaginer sous la forme de tableaux.

On peut faire énormément de choses avec les arrays et leur utilisation n'est pas toujours très facile. Cependant, ils vont très rapidement nous devenir indispensables et vous devez bien comprendre leur fonctionnement. Si vous y parvenez, nous aurons fait le tour des bases du PHP et vous serez fin prêts pour la suite, qui s'annonce concrète et passionnante.

Les deux types de tableaux
Un tableau (aussi appelé array) est une variable. Mais une variable un peu spéciale.

Reprenons. Jusqu'ici vous avez travaillé avec des variables toutes simples : elles ont un nom et une valeur. Par exemple :

<?php
$prenom = 'Nicole';
echo 'Bonjour ' . $prenom; // Cela affichera : Bonjour Nicole
?>
Ce qui peut se matérialiser sous la forme :

Nom

Valeur

$prenom

Nicole

Ici, nous allons voir qu'il est possible d'enregistrer de nombreuses informations dans une seule variable grâce aux tableaux. On en distingue deux types :

les tableaux numérotés ;

les tableaux associatifs.

Les tableaux numérotés
Ces tableaux sont très simples à imaginer. Regardez par exemple celui-ci, contenu de la variable$prenoms :

Clé

Valeur

0

François

1

Michel

2

Nicole

3

Véronique

4

Benoît

…

…

$prenomsest un array : c'est ce qu'on appelle une variable « tableau ». Elle n'a pas qu'une valeur, mais plusieurs (vous pouvez en mettre autant que vous voulez).

Dans un array, les valeurs sont rangées dans des « cases » différentes. Ici, nous travaillons sur un array numéroté, c'est-à-dire que chaque case est identifiée par un numéro. Ce numéro est appelé clé.

Attention ! Un array numéroté commence toujours à la case n°0 ! Ne l'oubliez jamais, ou vous risquez de faire des erreurs par la suite…

Construire un tableau numéroté
Pour créer un tableau numéroté en PHP, on utilise généralement la fonctionarray.

Cet exemple vous montre comment créer l'array$prenoms :

<?php
// La fonction array permet de créer un array
$prenoms = array ('François', 'Michel', 'Nicole', 'Véronique', 'Benoît');
?>
L'ordre a beaucoup d'importance. Le premier élément (« François ») aura le n°0, ensuite Michel le n°1, etc.

Vous pouvez aussi créer manuellement le tableau case par case :

<?php
$prenoms[0] = 'François';
$prenoms[1] = 'Michel';
$prenoms[2] = 'Nicole';
?>
Si vous ne voulez pas avoir à écrire vous-mêmes le numéro de la case que vous créez, vous pouvez laisser PHP le sélectionner automatiquement en laissant les crochets vides :

<?php
$prenoms[] = 'François'; // Créera $prenoms[0]
$prenoms[] = 'Michel'; // Créera $prenoms[1]
$prenoms[] = 'Nicole'; // Créera $prenoms[2]
?>
Afficher un tableau numéroté
Pour afficher un élément, il faut donner sa position entre crochets après$prenoms. Cela revient à dire à PHP :

« Affiche-moi le contenu de la case n°1 de$prenoms. »

Pour faire cela en PHP, il faut écrire le nom de la variable, suivi du numéro entre crochets. Pour afficher « Michel », on doit donc écrire :

<?php
echo $prenoms[1];
?>
C'est tout bête du moment que vous n'oubliez pas que Michel est en seconde position et donc qu'il a le numéro 1 (étant donné qu'on commence à compter à partir de 0).

Si vous oubliez de mettre les crochets, ça ne marchera pas (ça affichera juste « Array »…). Dès que vous travaillez sur des arrays, vous êtes obligés d'utiliser les crochets pour indiquer dans quelle « case » on doit aller chercher l'information, sinon PHP ne sait pas quoi récupérer.

Les tableaux associatifs
Les tableaux associatifs fonctionnent sur le même principe, sauf qu'au lieu de numéroter les cases, on va les étiqueter en leur donnant à chacune un nom différent.

Par exemple, supposons que je veuille, dans un seul array, enregistrer les coordonnées de quelqu'un (nom, prénom, adresse, ville, etc.). Si l'array est numéroté, comment savoir que le n°0 est le nom, le n°1 le prénom, le n°2 l'adresse… ? C'est là que les tableaux associatifs deviennent utiles.

Construire un tableau associatif
Pour en créer un, on utilisera la fonctionarraycomme tout à l'heure, mais on va mettre « l'étiquette » devant chaque information :

<?php
// On crée notre array $coordonnees
$coordonnees = array (
    'prenom' => 'François',
    'nom' => 'Dupont',
    'adresse' => '3 Rue du Paradis',
    'ville' => 'Marseille');
?>
Note importante : il n'y a ici qu'une seule instruction (un seul point-virgule). J'aurais pu tout mettre sur la même ligne, mais rien ne m'empêche de séparer ça sur plusieurs lignes pour que ce soit plus facile à lire.

Vous remarquez qu'on écrit une flèche (=>) pour dire « associé à ». Par exemple, on dit « ville » associée à « Marseille ».

Nous avons créé un tableau qui ressemble à la structure suivante :

Clé

Valeur

prenom

François

nom

Dupont

adresse

3 Rue du Paradis

ville

Marseille

Il est aussi possible de créer le tableau case par case, comme ceci :

<?php
$coordonnees['prenom'] = 'François';
$coordonnees['nom'] = 'Dupont';
$coordonnees['adresse'] = '3 Rue du Paradis';
$coordonnees['ville'] = 'Marseille';
?>
Afficher un tableau associatif
Pour afficher un élément, il suffit d'indiquer le nom de cet élément entre crochets, ainsi qu'entre guillemets ou apostrophes puisque l'étiquette du tableau associatif est un texte.

Par exemple, pour extraire la ville, on devra taper :

<?php
echo $coordonnees['ville'];
?>
Ce code affiche : « Marseille ».

Quand utiliser un array numéroté et quand utiliser un array associatif ?

Comme vous l'avez vu dans mes exemples, ils ne servent pas à stocker la même chose…

Les arrays numérotés permettent de stocker une série d'éléments du même type, comme des prénoms. Chaque élément du tableau contiendra alors un prénom.

Les arrays associatifs permettent de découper une donnée en plusieurs sous-éléments. Par exemple, une adresse peut être découpée en nom, prénom, nom de rue, ville…

Parcourir un tableau
Lorsqu'un tableau a été créé, on a souvent besoin de le parcourir pour savoir ce qu'il contient. Nous allons voir trois moyens d'explorer un array :

la bouclefor ;

la boucleforeach ;

la fonctionprint_r(utilisée principalement pour le débogage).

La bouclefor
Il est très simple de parcourir un tableau numéroté avec une bouclefor. En effet, puisqu'il est numéroté à partir de 0, on peut faire une boucleforqui incrémente un compteur à partir de 0 :

<?php
// On crée notre array $prenoms
$prenoms = array ('François', 'Michel', 'Nicole', 'Véronique', 'Benoît');

// Puis on fait une boucle pour tout afficher :
for ($numero = 0; $numero < 5; $numero++)
{
    echo $prenoms[$numero] . '<br />'; // affichera $prenoms[0], $prenoms[1] etc.
}
?>
Affichage des valeurs du tableau
Affichage des valeurs du tableau avec for
Quand on écrit$prenoms[$numero], la variable$numeroest d'abord remplacée par sa valeur. Par exemple, si$numerovaut 2, alors cela signifie qu'on cherche à obtenir ce que contient$prenoms[2], c'est-à-dire… Nicole. Bravo, vous avez compris. :D

La boucleforeach
La bouclefora beau fonctionner, on peut utiliser un autre type de boucle plus adapté aux tableaux qu'on n'a pas encore vu jusqu'ici :foreach. C'est une sorte de boucleforspécialisée dans les tableaux.

foreachva passer en revue chaque ligne du tableau, et lors de chaque passage, elle va mettre la valeur de cette ligne dans une variable temporaire (par exemple$element).

Je parle chinois ? Regardez plutôt :

<?php
$prenoms = array ('François', 'Michel', 'Nicole', 'Véronique', 'Benoît');

foreach($prenoms as $element)
{
    echo $element . '<br />'; // affichera $prenoms[0], $prenoms[1] etc.
}
?>
Affichage des valeurs du tableau avec foreach
Affichage des valeurs du tableau avec foreach
C'est le même code que tout à l'heure mais cette fois basé sur une boucleforeach. À chaque tour de boucle, la valeur de l'élément suivant est mise dans la variable$element. On peut donc utiliser$elementuniquement à l'intérieur de la boucle afin d'afficher l'élément en cours.

L'avantage deforeachest qu'il permet aussi de parcourir les tableaux associatifs.

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
Parcourir les tableaux associatifs
Parcourir les tableaux associatifs
foreachva mettre tour à tour dans la variable$elementle prénom, le nom, l'adresse et la ville contenus dans l'array$coordonnees.

On met donc entre parenthèses :

d'abord le nom de l'array (ici$coordonnees) ;

ensuite le mot-cléas(qui signifie quelque chose comme « en tant que ») ;

enfin, le nom d'une variable que vous choisissez et qui va contenir tour à tour chacun des éléments de l'array (ici$element).

Entre les accolades, on n'utilise donc que la variable$element.
La boucle s'arrête lorsqu'on a parcouru tous les éléments de l'array.

Toutefois, avec cet exemple, on ne récupère que la valeur. Or, on peut aussi récupérer la clé de l'élément. On doit dans ce cas écrireforeachcomme ceci :

<?php foreach($coordonnees as $cle => $element) ?>
À chaque tour de boucle, on disposera non pas d'une, mais de deux variables :

$cle, qui contiendra la clé de l'élément en cours d'analyse (« prenom », « nom », etc.) ;

$element, qui contiendra la valeur de l'élément en cours (« François », « Dupont », etc.).

Testons le fonctionnement avec un exemple :

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
Récupérer la clé de l'élément
Récupérer la clé de l'élément
Avec cette façon de procéder, vous avez maintenant dans la boucle la clé ET la valeur.

Etforeach, croyez-moi, c'est une boucle vraiment pratique ! On s'en sert régulièrement !

Afficher rapidement un array avecprint_r
Parfois, en codant votre site en PHP, vous aurez sous les bras un array et vous voudrez savoir ce qu'il contient, juste pour votre information. Vous pourriez utiliser une boucleforou, mieux, une boucleforeach. Mais si vous n'avez pas besoin d'une mise en forme spéciale et que vous voulez juste savoir ce que contient l'array, vous pouvez faire appel à la fonctionprint_r. C'est une sorte deechospécialisé dans les arrays.

Cette commande a toutefois un défaut : elle ne renvoie pas de code HTML comme<br />pour les retours à la ligne. Pour bien les voir, il faut donc utiliser la balise HTML<pre>qui nous permet d'avoir un affichage plus correct.

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
Avec utilisation de la balise
Avec utilisation de la balise <pre>
Voilà, c'est facile à utiliser du moment qu'on n'oublie pas la balise<pre>pour avoir un affichage correct.

Bien entendu, vous n'afficherez jamais des choses comme ça à vos visiteurs. On peut en revanche s'en servir pour le débogage, pendant la création du site, afin de voir rapidement ce que contient l'array.

Rechercher dans un tableau
Nous allons maintenant faire des recherches dans des arrays. Cela vous sera parfois très utile pour savoir si votre array contient ou non certaines informations.
Nous allons voir trois types de recherches, basées sur des fonctions PHP :

array_key_exists : pour vérifier si une clé existe dans l'array ;

in_array : pour vérifier si une valeur existe dans l'array ;

array_search : pour récupérer la clé d'une valeur dans l'array.

Vérifier si une clé existe dans l'array :array_key_exists
Voici notre problème : on a un array, mais on ne sait pas si la clé qu'on cherche s'y trouve.
Pour vérifier ça, on va utiliser la fonctionarray_key_existsqui va parcourir le tableau pour nous et nous dire s'il contient cette clé.

On doit d'abord lui donner le nom de la clé à rechercher, puis le nom de l'array dans lequel on fait la recherche :

<?php array_key_exists('cle', $array); ?>
La fonction renvoie un booléen, c'est-à-diretrue(vrai) si la clé est dans l'array, etfalse(faux) si la clé ne s'y trouve pas. Ça nous permet de faire un test facilement avec unif :

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
 

Vérifier si la clé est dans l'array $coordonnees
On ne trouvera que « nom », et pas « pays » (logique). Seule la première condition sera donc exécutée.

Vérifier si une valeur existe dans l'array :in_array
Le principe est le même quearray_key_exists… mais cette fois on recherche dans les valeurs.in_arrayrenvoietruesi la valeur se trouve dans l'array,falsesi elle ne s'y trouve pas.

Pour changer un peu de notre array$coordonnees, je vais en créer un nouveau (numéroté) composé de fruits. ;-)

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
Vérifier si la clé se trouve dans l'array $fruits
Vérifier si une valeur existe dans l'array $fruits 
On ne voit que le message pour la cerise, tout simplement parce quein_arraya renvoyétruepour « Cerise » etfalsepour « Myrtille ».

Récupérer la clé d'une valeur dans l'array :array_search
array_searchfonctionne commein_array : il travaille sur les valeurs d'un array. Voici ce que renvoie la fonction :

si elle a trouvé la valeur,array_searchrenvoie la clé correspondante (c'est-à-dire le numéro si c'est un array numéroté, ou le nom de la clé si c'est un array associatif);

si elle n'a pas trouvé la valeur,array_searchrenvoiefalse.

On reprend l'array numéroté avec les fruits :

<?php
$fruits = array ('Banane', 'Pomme', 'Poire', 'Cerise', 'Fraise', 'Framboise');

$position = array_search('Fraise', $fruits);
echo '"Fraise" se trouve en position ' . $position . '<br />';

$position = array_search('Banane', $fruits);
echo '"Banane" se trouve en position ' . $position;
?>
Récupérer la clé d'une valeur
Récupérer la clé d'une valeur
Je sais que je me répète, mais n'oubliez pas qu'un array numéroté commence à 0 ! Cela explique donc pourquoi on nous répond que « Banane » se trouve en position 0.

Voilà donc les fonctions qu'il fallait connaître pour faire une recherche dans un array. Il y en a d'autres mais vous connaissez maintenant les principales.

En résumé
Les tableaux (ou arrays) sont des variables représentées sous forme de tableau. Elles peuvent donc stocker de grandes quantités d'informations.

Chaque ligne d'un tableau possède une clé (qui permet de l'identifier) et une valeur.

Il existe deux types de tableaux :

les tableaux numérotés : chaque ligne est identifiée par une clé numérotée. La numérotation commence à partir de 0 ;

les tableaux associatifs : chaque ligne est identifiée par une courte chaîne de texte.

Pour parcourir un tableau, on peut utiliser la boucleforque l'on connaît déjà, mais aussi la boucleforeachqui est dédiée aux tableaux.

Il existe de nombreuses fonctions permettant de travailler sur des tableaux et notamment d'effectuer des recherches.