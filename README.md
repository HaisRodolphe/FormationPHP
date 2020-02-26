# FormationPHP
Les fonctions

En PHP, on n'aime pas avoir à répéter le même code. Pour pallier ce problème, nous avons découvert les boucles, qui permettent d'exécuter des instructions un certain nombre de fois. Ici nous allons découvrir un autre type de structure indispensable pour la suite : les fonctions.

Comme les boucles, les fonctions permettent d'éviter d'avoir à répéter du code PHP que l'on utilise souvent. Mais alors que les boucles sont de bêtes machines tout juste capables de répéter deux cents fois la même chose, les fonctions sont des robots « intelligents » qui s'adaptent en fonction de ce que vous voulez faire et qui automatisent grandement la plupart des tâches courantes.

Qu'est-ce qu'une fonction ?
Une fonction est une série d'instructions qui effectue des actions et qui retourne une valeur. En général, dès que vous avez besoin d'effectuer des opérations un peu longues dont vous aurez à nouveau besoin plus tard, il est conseillé de vérifier s'il n'existe pas déjà une fonction qui fait cela pour vous. Et si la fonction n'existe pas, vous avez la possibilité de la créer.

Imaginez que les fonctions sont des robots comme dans la figure suivante.

Une fonction est comme un robot
Une fonction est comme un robot
Vous ne savez pas ce qui se passe à l'intérieur de ce robot, mais vous pouvez appuyer sur un bouton pour lui demander de faire quelque chose de précis. Avec les fonctions, c'est le même principe !

Dialogue avec une fonction
Voici le genre de dialogue qu'on peut avoir avec une fonction :

Toi, la fonctioncalculCube, donne-moi le volume d'un cube dont l'arête mesure 4 cm.

La fonction effectue les calculs demandés puis répond :

Ce cube a un volume de 64 cm3

On donne en entrée à la fonction un paramètre sur lequel elle va faire des calculs (ici, la longueur de l'arête : 4) et la fonction nous retourne en sortie le résultat : 64. Voyez la figure suivante.

Calcul du cube
Calcul du cube
Grâce à la fonction, vous n'avez pas eu besoin de vous souvenir de la manière dont on calcule le volume d'un cube. Bon ici c'était assez simple (il suffisait de faire $4*4*4$), mais vous serez souvent amenés à faire des opérations de plus en plus complexes et les fonctions vous permettront de ne pas avoir à vous soucier des détails des calculs.

Si vous aviez eu à déterminer le volume du cube une seule fois, vous auriez pu chercher la formule dans un livre (si vous ne vous en souveniez pas) et écrire le calcul à la main. Mais si vous aviez à le faire 5 fois ? 10 fois ? 100 fois ?

En quoi est-ce différent des boucles ? Avec les boucles on peut faire répéter le même code plusieurs fois aussi !

Oui, mais les fonctions sont capables de s'adapter en fonction des informations que vous leur envoyez. Par exemple dans notre cas, il suffit de transmettre la longueur de l'arête du cube à notre fonction pour qu'elle nous retourne le résultat. Ces informations que l'on donne en entrée à la fonction sont appelées paramètres (un mot à connaître !).

Les fonctions ne servent qu'à faire des calculs mathématiques ? Je veux juste créer un site web, pas faire des maths !

J'ai choisi un exemple mathématique ici parce que je le trouve simple et parlant, mais dans la pratique on ne passe pas son temps à calculer des logarithmes et des exponentielles quand on crée un site web, je suis d'accord.

Concrètement, les fonctions peuvent permettre de récupérer des informations comme la date et l'heure actuelles, de crypter des données, d'envoyer des e-mails, de faire des recherches dans du texte, et bien d'autres choses encore !

Les fonctions en PHP
Nous avons jusqu'ici imaginé le dialogue avec une fonction représentée par un robot, ce qui n'est pas très intéressant.
Revenons aux choses sérieuses et concrètes.

Appeler une fonction
En PHP, comment appelle-t-on une fonction ? Par son nom, pardi ! Par exemple :

<?php
calculCube();
?>
La fonctioncalculCubeest une fonction imaginaire : elle n'existe pas (à moins qu'on la crée nous-mêmes). Par conséquent, n'essayez pas d'exécuter ce code PHP chez vous car il ne fonctionnera pas. Lisez simplement pour bien comprendre le fonctionnement, vous aurez ensuite l'occasion de pratiquer plus loin dans ce chapitre.

Comme vous le voyez, j'ai simplement écrit le nom de la fonction, suivi de parenthèses vides, puis de l'inévitable point-virgule. En faisant cela, j'appelle la fonctioncalculCubemais je ne lui envoie aucune information, aucun paramètre.

Certaines fonctions peuvent fonctionner sans paramètres, mais elles sont assez rares. Dans le cas decalculCube, ça n'a pas de sens de l'appeler sans lui donner la longueur de l'arête du cube pour faire le calcul !

Si on veut lui envoyer un paramètre (un nombre, une chaîne de caractères, un booléen...), il faut l'écrire entre les parenthèses :

<?php
calculCube(4);
?>
Ainsi,calculCubesaura qu'elle doit travailler avec le nombre 4.

Souvent, les fonctions acceptent plusieurs paramètres. Vous devez dans ce cas les séparer par des virgules :

<?php
fonctionImaginaire(17, 'Vert', true, 41.7);
?>
Cette fonction recevra quatre paramètres : 17, le texte « Vert », le booléen vrai et le nombre 41,7.

Récupérer la valeur de retour de la fonction
Maintenant que nous savons appeler une fonction et même lui envoyer plusieurs paramètres, il faut récupérer ce qu'elle nous retourne si toutefois elle retourne quelque chose. Il y a en effet deux types de fonctions :

celles qui ne retournent aucune valeur (ça ne les empêche pas d'effectuer des actions) ;

celles qui retournent une valeur.

Si la fonction ne retourne aucune valeur, il n'y a rien de plus à faire que dans les codes précédents. La fonction est appelée, fait son travail, et on ne lui demande rien de plus.

En revanche, si la fonction retourne une valeur (comme ça devrait être le cas pourcalculCube), on la récupère dans une variable, comme ceci :

<?php
$volume = calculCube(4);
?>
Sur une ligne comme celle-ci, il se passe en fait les deux choses suivantes (dans l'ordre, et de droite à gauche) :

la fonctioncalculCubeest appelée avec le paramètre 4 ;

le résultat renvoyé par la fonction (lorsqu'elle a terminé) est stocké dans la variable$volume.

La variable$volumeaura donc pour valeur 64 après l'exécution de cette ligne de code !

Bon à savoir : comme on l'a vu, il est possible d'envoyer en entrée plusieurs paramètres à une fonction ; en revanche cette dernière ne peut retourner qu'une seule valeur. Il existe un moyen de contourner cette limitation en combinant des variables au sein d'un tableau de variables (appelé array) dont nous avons parlé dans le chapitre précédent.

Les fonctions prêtes à l'emploi de PHP
PHP propose des centaines et des centaines de fonctions prêtes à l'emploi. Sur le site officiel, la documentation PHP les répertorie toutes, classées par catégories.

Ces fonctions sont très pratiques et très nombreuses. En fait, c'est en partie là que réside la force de PHP : ses fonctions sont vraiment excellentes car elles couvrent la quasi-totalité de nos besoins. J'ai en fait remarqué que, pratiquement à chaque fois que je m'apprêtais à écrire une fonction, celle-ci existait déjà.

Voici un petit aperçu des fonctions qui existent pour vous mettre l'eau à la bouche :

Une fonction qui permet de rechercher et de remplacer des mots dans une variable.

Une fonction qui envoie un fichier sur un serveur.

Une fonction qui permet de créer des images miniatures (aussi appeléesthumbnails).

Une fonction qui envoie un mail avec PHP (très pratique pour faire une newsletter !).

Une fonction qui permet de modifier des images, y écrire du texte, tracer des lignes, des rectangles, etc.

Une fonction qui crypte des mots de passe.

Une fonction qui renvoie l'heure, la date…

Etc.

Dans la plupart des cas, il faudra indiquer des paramètres à la fonction pour qu'elle sache sur quoi travailler.

Nous allons ici découvrir rapidement quelques fonctions pour vous habituer à les utiliser. Nous ne pourrons jamais toutes les passer en revue (j'ai dit qu'il y en avait des centaines et des centaines !) mais avec l'expérience de ces premières fonctions et la documentation de PHP, vous n'aurez aucun mal à aller plus loin tout seuls.

Nous allons voir quelques fonctions qui effectuent des modifications sur des chaînes de caractères et une qui permet de récupérer la date. Ce sont seulement des exemples destinés à vous habituer à utiliser des fonctions.

Traitement des chaînes de caractères
De nombreuses fonctions permettent de manipuler le texte. En voici quelques-unes qui vont vous montrer leur intérêt.

strlen: longueur d'une chaîne
Cette fonction retourne la longueur d'une chaîne de caractères, c'est-à-dire le nombre de lettres et de chiffres dont elle est constituée (espaces compris). Exemple :

<?php
$phrase = 'Bonjour tout le monde ! Je suis une phrase !';
$longueur = strlen($phrase);
 
 
echo 'La phrase ci-dessous comporte ' . $longueur . ' caractères :<br />' . $phrase;
?>
Résultat :

Un comptage du nombre de caractères
Comptage du nombre de caractères
Méfiez-vous, il se peut que le nombre de caractères soit parfois inexact. Ceci est dû à un bug de PHP dans la gestion des encodages de caractères. Ce sera corrigé dans les prochaines versions du langage.

str_replace: rechercher et remplacer
str_replaceremplace une chaîne de caractères par une autre. Exemple :

<?php
$ma_variable = str_replace('b', 'p', 'bim bam boum');
 
echo $ma_variable;
?>
Résultat :

Remplacement de caractères
Remplacement de caractères
On a besoin d'indiquer trois paramètres :

la chaîne qu'on recherche (ici, les « b » (on aurait pu rechercher un mot aussi)) ;

la chaîne qu'on veut mettre à la place (ici, on met des « p » à la place des « b ») ;

la chaîne dans laquelle on doit faire la recherche.

Ce qui nous donne « pim pam poum ». :D

str_shuffle: mélanger les lettres
Pour vous amuser à mélanger aléatoirement les caractères de votre chaîne !

<?php
$chaine = 'Cette chaîne va être mélangée !';
$chaine = str_shuffle($chaine);
 
echo $chaine;
?>
Résultat :

Lettres mélangées
Lettres mélangées
strtolower: écrire en minuscules
strtolowermet tous les caractères d'une chaîne en minuscules.

<?php
$chaine = 'COMMENT CA JE CRIE TROP FORT ???';
$chaine = strtolower($chaine);
 
echo $chaine;
?>
Résultat :

Lettres en minuscules
Lettres en minuscules
À noter qu'il existestrtoupperqui fait la même chose en sens inverse : minuscules → majuscules.

Récupérer la date
Nous allons découvrir la fonction qui renvoie l'heure et la date. Il s'agit dedate(un nom facile à retenir, avouez !). Cette fonction peut donner beaucoup d'informations. Voici les principaux paramètres à connaître :

Paramètre

Description

H

Heure

i

Minute

d

Jour

m

Mois

Y

Année

Attention ! Respectez les majuscules/minuscules, c'est important !

Si vous voulez afficher l'année, il faut donc envoyer le paramètre Y à la fonction :

<?php
$annee = date('Y');
echo $annee;
?>
On peut bien entendu faire mieux, voici la date complète et l'heure :

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
Résultat :

Affichage de la date
Affichage de la date
Et voilà le travail ! On a pu afficher la date et l'heure en un clin d'œil.
Normalement, quand vous avez testé le code précédent, vous avez dû avoir la date et l'heure exactes (n'hésitez donc pas à essayer d'exécuter ce code source chez vous).

Si l'heure n'était pas bonne, sachez que c'est le serveur qui donne l'heure, et le serveur du Site du Zéro étant situé à Paris, vous comprendrez le décalage horaire si vous habitez dans un autre pays.

Créer ses propres fonctions
Bien que PHP propose des centaines et des centaines de fonctions (j'insiste, mais il faut dire qu'il y en a tellement !), parfois il n'y aura pas ce que vous cherchez et il faudra écrire vous-mêmes la fonction. C'est une façon pratique d'étendre les possibilités offertes par PHP.

Quand écrire une fonction ? En général, si vous effectuez des opérations un peu complexes que vous pensez avoir besoin de refaire régulièrement, il est conseillé de créer une fonction.

Nous allons découvrir la création de fonctions à travers deux exemples :

l'affichage d'un message de bienvenue en fonction du nom ;

le calcul du volume d'un cône.

Premier exemple : dis bonjour au Monsieur
C'est peut-être un peu fatigant de dire bonjour à chacun de ses visiteurs, non ? Ça serait bien de le faire automatiquement… Les fonctions sont justement là pour nous aider !
Regardez le code ci-dessous :

<?php
$nom = 'Sandra';
echo 'Bonjour, ' . $nom . ' !<br />';

$nom = 'Patrick';
echo 'Bonjour, ' . $nom . ' !<br />';

$nom = 'Claude';
echo 'Bonjour, ' . $nom . ' !<br />';
?>
Vous voyez, c'est un peu fatigant à la longue… Alors nous allons créer une fonction qui le fait à notre place !

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
Résultat :

Appels de la fonction DireBonjour
Appels de la fonction DireBonjour
Alors qu'y a-t-il de différent ici ? C'est surtout en haut qu'il y a une nouveauté : c'est la fonction. En fait, les lignes en haut permettent de définir la fonction (son nom, ce qu'elle est capable de faire, etc.). Elles ne font rien de particulier, mais elles disent à PHP : « Une fonctionDireBonjourexiste maintenant ».

Pour créer une fonction, vous devez taperfunction(en français, ça veut dire « fonction »). Ensuite, donnez-lui un nom. Par exemple, celle-ci s'appelleDireBonjour.

Ce qui est plus particulier après, c'est ce qu'on met entre parenthèses : il y a une variable. C'est le paramètre dont a besoin la fonction pour travailler, afin qu'elle sache à qui elle doit dire bonjour dans notre cas. Notre fonction doit forcément être appelée avec un paramètre (le nom) sans quoi elle ne pourra pas travailler.

Vous avez peut-être remarqué que cette ligne est la seule à ne pas se terminer par un point-virgule. C'est normal, il ne s'agit pas d'une instruction mais juste d'une « carte d'identité » de la fonction (son nom, ses paramètres…).

Ensuite, vous repérez des accolades. Elles permettent de marquer les limites de la fonction. Cette dernière commence dès qu'il y a un{et se termine lorsqu'il y a un}. Entre les deux, il y a son contenu.

Ici, la fonction contient une seule instruction (echo). J'ai fait simple pour commencer mais vous verrez qu'en pratique, une fonction contient plus d'instructions que cela.

Voilà, la fonction est créée, vous n'avez plus besoin d'y toucher. Après, pour faire appel à elle, il suffit d'indiquer son nom, et de préciser ses paramètres entre parenthèses. Enfin, il ne faut pas oublier le fameux point-virgule ( ; ) car il s'agit d'une instruction. Par exemple :

<?php
DireBonjour('Marie');
?>
À vous d'essayer ! Créez une page avec cette fonction et dites bonjour à qui vous voulez, vous verrez : ça marche (encore heureux !) !

Un conseil pour que vous vous entraîniez sur les fonctions : basez-vous sur mes exemples et essayez de les retoucher petit à petit pour voir ce que ça donne. Il peut y avoir des fonctions très simples comme des fonctions très compliquées, alors allez-y prudemment.

Deuxième exemple : calculer le volume d'un cône
Allez, on passe à la vitesse supérieure. La fonctionDireBonjourque l'on a créée ne renvoyait aucune valeur, elle se contentait d'effectuer des actions (afficher un texte, dans le cas présent). Maintenant, nous allons créer une fonction qui renvoie une valeur.

Ici notre fonction va servir à faire un calcul : le calcul du volume d'un cône. Le principe est le suivant : vous donnez à la fonction le rayon et la hauteur du cône, elle travaille et vous renvoie le volume que vous cherchiez.

Bon : tout d'abord, il faut connaître la formule pour calculer le volume d'un cône. Vous avez oublié comment on fait ?
Il faut connaître le rayon de la base et la hauteur. La formule à utiliser pour trouver le volume est :

rayon2×π×hauteur×13

. Voyez la figure suivante.

Représentation d'un cône
Représentation d'un cône
Si vous avez bien suivi dans le chapitre précédent, vous êtes normalement capables de comprendre le code ci-dessous. Seul problème si on a à le faire plusieurs fois : c'est vite répétitif. Regardez :

<?php
// Calcul du volume d'un cône de rayon 5 et de hauteur 2
$volume = 5 * 5 * 3.14 * 2 * (1/3);
echo 'Le volume du cône de rayon 5 et de hauteur 2 est : ' . $volume . ' cm<sup>3</sup><br />';

// Calcul du volume d'un cône de rayon 3 et de hauteur 4
$volume = 3 * 3 * 3.14 * 4 * (1/3);
echo 'Le volume du cône de rayon 3 et de hauteur 4 est : ' . $volume . ' cm<sup>3</sup><br />';
?>
Nous allons donc créer une fonctionVolumeCone, qui va calculer le volume du cône en fonction du rayon et de la hauteur. Cette fonction ne va rien afficher, on veut juste qu'elle nous renvoie le volume qu'on cherche.

Regardez attentivement le code ci-dessous, il présente deux nouveautés :

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
Regardez bien la fonction, il y a l'instruction :return $volume;.
Cette instruction indique ce que doit renvoyer la fonction. Ici, elle renvoie le volume. Si vous aviez tapéreturn 15, ça aurait à chaque fois affiché un volume de 15 (c'est un peu idiot j'en conviens, mais faites l'essai !).

La fonction renvoie une valeur, que l'on doit donc récupérer dans une variable :

<?php
$volume = VolumeCone(3, 1);
?>
Ensuite, on peut afficher ce que contient la variable à l'aide d'une instructionecho.

Les possibilités de création de fonctions sont quasi-infinies. Il est clair que normalement, vous n'allez pas avoir à créer de fonction qui calcule le volume d'un cône (qui est assez fou pour faire ça ?). En fait, tout ce que je vous demande ici, c'est de comprendre qu'une fonction peut se révéler très pratique et vous faire gagner du temps.

En résumé
Les fonctions sont des blocs de code qui exécutent des instructions en fonction de certains paramètres.

Les fonctions ont généralement une entrée et une sortie. Par exemple, si on donne la valeur 4 à la fonction de calcul du cube, celle-ci renvoie 64 en sortie.

PHP propose des centaines et des centaines de fonctions prêtes à l'emploi pour tous types de tâches : envoyer un e-mail, récupérer l'heure, crypter des mots de passe, etc.

Si PHP ne propose pas la fonction dont on a besoin, il est possible de la créer avec le mot-cléfunction.