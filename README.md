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

Les boucles

Dans la série des éléments de base de PHP à connaître absolument, voici les boucles ! Répéter des instructions, ça, l'ordinateur sait faire (et en plus, il ne bronche jamais) !

Imaginez que vous êtes en train de créer le forum de votre site. Sur une page, on affiche par exemple une trentaine de messages. Il serait bien trop long et répétitif de dire « Affiche le message 1 et le nom de son auteur », « Affiche le message 2 et le nom de son auteur », « Affiche le message 3 et le nom de son auteur », etc. Pour éviter d'avoir à faire cela, on peut utiliser un système de boucle qui nous permettra de dire une seule fois : « Affiche 30 messages et le nom de leur auteur à chaque fois ».

Bien entendu, nous n'allons pas pouvoir apprendre à créer le forum de votre site dans ce chapitre, il est encore trop tôt. Néanmoins, prenez bien le temps de comprendre le fonctionnement des boucles car nous en aurons besoin tout au long de ce cours. Ce n'est pas bien compliqué, vous allez voir !

Une boucle simple : while
Qu'est-ce qu'une boucle ? C'est une structure qui fonctionne sur le même principe que les conditions (if… else). D'ailleurs, vous allez voir qu'il y a beaucoup de similitudes avec le chapitre sur les conditions.
Concrètement, une boucle permet de répéter des instructions plusieurs fois. En clair, c'est un gain de temps, c'est très pratique, et bien souvent indispensable.

On peut si vous voulez présenter le principe dans le schéma suivant.

Principe de fonctionnement d'une boucle
Principe de fonctionnement d'une boucle
Voilà ce qui se passe dans une boucle :

comme d'habitude, les instructions sont d'abord exécutées dans l'ordre, de haut en bas (flèche rouge) ;

à la fin des instructions, on retourne à la première (flèche verte) ;

on recommence à lire les instructions dans l'ordre (flèche rouge) ;

et on retourne à la première (flèche verte) ;

etc., etc.

Le seul hic dans ce schéma, c'est que ça ne s'arrête jamais ! Les instructions seraient réexécutées à l'infini !
C'est pour cela que, quel que soit le type de boucle (whileoufor), il faut indiquer une condition. Tant que la condition est remplie, les instructions sont réexécutées. Dès que la condition n'est plus remplie, on sort enfin de la boucle (ouf !).

Voici comment faire avec une boucle simple :while.

<?php
while ($continuer_boucle == true)
{
    // instructions à exécuter dans la boucle
}
?>
whilepeut se traduire par « tant que ». Ici, on demande à PHP : TANT QUE$continuer_boucleest vrai, exécuter ces instructions.

Les instructions qui sont répétées en boucle se trouvent entre les accolades{et}. Mais bon là je ne vous apprends rien, vous commencez à avoir l'habitude de voir des accolades de partout. ;-)

Ce n'est pas beaucoup plus compliqué que ça, il n'y a guère plus de choses à savoir. Cependant, je vais quand même vous montrer un ou deux exemples d'utilisation de boucles, pour que vous voyiez à quoi ça peut servir…

Pour notre premier exemple, on va supposer que vous avez été punis et que vous devez recopier 100 fois « Je ne dois pas regarder les mouches voler quand j'apprends le PHP. ».
Avant, il fallait prendre son mal en patience et ça prenait des heuuuures… Maintenant, avec PHP, on va faire ça en un clin d'œil !

Regardez ce code :

<?php
$nombre_de_lignes = 1;

while ($nombre_de_lignes <= 100)
{
    echo 'Je ne dois pas regarder les mouches voler quand j\'apprends le PHP.<br />';
    $nombre_de_lignes++; // $nombre_de_lignes = $nombre_de_lignes + 1
}
?>
Ce qui affiche... un grand nombre de lignes :

Des lignes affichées grâce à une boucle PHP
Des lignes affichées grâce à une boucle PHP
La boucle pose la condition : TANT QUE$nombre_de_lignesest inférieur ou égal à 100.
Dans cette boucle, il y a deux instructions :

leecho, qui permet d'afficher du texte en PHP. À noter qu'il y a une balise HTML<br />à la fin : cela permet d'aller à la ligne. Vu que vous connaissez le HTML, ça n'a rien de surprenant : chaque phrase sera écrite sur une seule ligne ;

ensuite, une instruction bizarre :$nombre_de_lignes++;Quésaco ? Regardez mon commentaire : c'est exactement la même chose. En fait, c'est une façon plus courte d'ajouter 1 à la variable. On appelle cela l'incrémentation (ce nom barbare signifie tout simplement que l'on a ajouté 1 à la variable).

Chaque fois qu'on fait une boucle, la valeur de la variable augmente : 1, 2, 3, 4… 99, 100… Dès que la variable atteint 101, on arrête la boucle. Et voilà, on a écrit 100 lignes en un clin d'œil.
Si la punition avait été plus grosse, pas de problème ! Il aurait suffi de changer la condition (par exemple, mettre « TANT QUE c'est inférieur ou égal à 500 » pour l'écrire 500 fois).

Il faut TOUJOURS s'assurer que la condition sera fausse au moins une fois. Si elle ne l'est jamais, alors la boucle s'exécutera à l'infini !
PHP refuse normalement de travailler plus d'une quinzaine de secondes. Il s'arrêtera tout seul s'il voit que son travail dure trop longtemps et affichera un message d'erreur.

Nous venons donc de voir comment afficher une phrase plusieurs centaines de fois sans effort.

Mais est-ce vraiment utile ? On n'a pas besoin de faire ça sur un site web !

Pas vraiment, mais comme je vous l'ai dit en introduction, nous apprenons ici des techniques de base que l'on va pouvoir réutiliser dans les prochains chapitres de ce cours. Imaginez à la fin que ce système de boucle va vous permettre de demander à PHP d'afficher d'une seule traite tous les messages de votre forum. Bien sûr, il vous faudra d'autres connaissances pour y parvenir, mais sans les boucles vous n'auriez rien pu faire !

Je vous demande pour le moment de pratiquer et de comprendre comment ça marche.

Bon, un autre exemple pour le plaisir ?
On peut écrire de la même manière une centaine de lignes, mais chacune peut être différente (on n'est pas obligés d'écrire la même chose à chaque fois).
Cet exemple devrait vous montrer que la valeur de la variable augmente à chaque passage dans la boucle :

<?php
$nombre_de_lignes = 1;

while ($nombre_de_lignes <= 100)
{
    echo 'Ceci est la ligne n°' . $nombre_de_lignes . '<br />';
    $nombre_de_lignes++;
}
?>
Ce qui affiche :

Une boucle qui compte les lignes
Une boucle qui compte les lignes
Voilà, c'est tout bête, et cet exemple ressemble beaucoup au précédent. La particularité, là, c'est qu'on affiche à chaque fois la valeur de$nombre_de_lignes(ça vous permet de voir que sa valeur augmente petit à petit).

Pour information, l'astuce que je vous avais donnée dans le chapitre sur les conditions marche aussi ici : vous pouvez fermer la balise PHP?>, écrire du texte en HTML, puis rouvrir la balise PHP<?php. Cela vous évite d'utiliser une ou plusieurs instructionsechoau milieu. On aura l'occasion d'utiliser cette astuce de nombreuses fois dans la suite du cours.

Une boucle plus complexe : for
Mais non, n'ayez pas peur voyons.
Il ne vous arrivera rien de mal : ici le mot « complexe » ne veut pas dire « compliqué ».

forest un autre type de boucle, dans une forme un peu plus condensée et plus commode à écrire, ce qui fait queforest assez fréquemment utilisé.

Cependant, sachez queforetwhiledonnent le même résultat et servent à la même chose : répéter des instructions en boucle. L'une peut paraître plus adaptée que l'autre dans certains cas, cela dépend aussi des goûts.

Alors, comment ça marche unfor ? Ça ressemble beaucoup auwhile, mais c'est la première ligne qui est un peu particulière. Pour que vous voyiez bien la différence avec lewhile, je reprends exactement l'exemple précédent, mais cette fois avec unfor :

<?php
for ($nombre_de_lignes = 1; $nombre_de_lignes <= 100; $nombre_de_lignes++)
{
    echo 'Ceci est la ligne n°' . $nombre_de_lignes . '<br />';
}
?>
Que de choses dans une même ligne !

Bon, vous vous en doutez, je ne vais vous expliquer que la ligne dufor, le reste n'ayant pas changé.

Après le motfor, il y a des parenthèses qui contiennent trois éléments, séparés par des points-virgules;.

Décrivons chacun de ces éléments.

Le premier sert à l'initialisation. C'est la valeur que l'on donne au départ à la variable (ici, elle vaut 1).

Le second, c'est la condition. Comme pour lewhile, tant que la condition est remplie, la boucle est réexécutée. Dès que la condition ne l'est plus, on en sort.

Enfin, le troisième c'est l'incrémentation, qui vous permet d'ajouter 1 à la variable à chaque tour de boucle.

Les deux derniers codes donnent donc exactement le même résultat. Leforfait la même chose que lewhile, mais rassemble sur une seule ligne tout ce qu'il faut savoir sur le fonctionnement de la boucle.

Comment savoir lequel prendre quand je dois choisir entre unwhileet unfor ?

La bouclewhileest plus simple et plus flexible : on peut faire tous les types de boucles avec mais on peut oublier de faire certaines étapes comme l'incrémentation de la variable.
En revanche,forest bien adapté quand on doit compter le nombre de fois que l'on répète les instructions et il permet de ne pas oublier de faire l'incrémentation pour augmenter la valeur de la variable !

Si vous hésitez entre les deux, il suffit simplement de vous poser la question suivante : « Est-ce que je sais d'avance combien de fois je veux que mes instructions soient répétées ? ».
Si la réponse est oui, alors la boucleforest tout indiquée. Sinon, alors il vaut mieux utiliser la bouclewhile.

En résumé
Les boucles demandent à PHP de répéter des instructions plusieurs fois.

Les deux principaux types de boucles sont :

while : à utiliser de préférence lorsqu'on ne sait pas par avance combien de fois la boucle doit être répétée ;

for : à utiliser lorsqu'on veut répéter des instructions un nombre précis de fois.

L'incrémentation est une technique qui consiste à ajouter 1 à la valeur d'une variable. La décrémentation retire au contraire 1 à cette variable. On trouve souvent des incrémentations au sein de bouclesfor.