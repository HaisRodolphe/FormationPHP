Ce chapitre est d'une importance capitale. En effet, vous serez très souvent amenés à employer des conditions dans vos pages web PHP.

À quoi servent les conditions ? On a parfois besoin d'afficher des choses différentes en fonction de certaines données. Par exemple, si c'est le matin, vous voudrez dire « Bonjour » à votre visiteur ; si c'est le soir, il vaudra mieux dire « Bonsoir ».

C'est là qu'interviennent les conditions. Elles permettent de donner des ordres différents à PHP selon le cas. Pour notre exemple, on lui dirait : Si c'est le matin, affiche « Bonjour ». Sinon, si c'est le soir, affiche « Bonsoir ». Vous allez voir que les conditions constituent vraiment la base pour rendre votre site dynamique, c'est-à-dire pour afficher des choses différentes en fonction du visiteur, de la date, de l'heure de la journée, etc.

Voilà pourquoi ce chapitre est si important !

Allez, on y va !

La structure de base : if… else
Une condition peut être écrite en PHP sous différentes formes. On parle de structures conditionnelles.
Celle que je vais vous apprendre à utiliser maintenant est la principale à connaître. Nous en verrons d'autres un peu plus loin.

Pour étudier la structureif… else, nous allons suivre le plan qui suit.

Les symboles à connaître : il va d'abord falloir retenir quelques symboles qui permettent de faire des comparaisons. Soyez attentifs car ils vous seront utiles pour les conditions.

La structure if… else : c'est le gros morceau. Là vous allez voir comment fonctionne une condition avecif… else. Inutile de vous dire qu'il est indispensable de bien comprendre cela.

Des conditions multiples : on compliquera un peu nos conditions. Vous allez voir en effet qu'on peut utiliser plusieurs conditions à la fois.

Le cas des booléens : nous verrons ensuite qu'il existe une façon particulière d'utiliser les conditions quand on travaille sur des booléens. Si vous ne savez pas ce que sont les booléens, revoyez le chapitre sur les variables.

L'astuce bonus : parce qu'il y a toujours un bonus pour récompenser ceux qui ont bien suivi jusqu'au bout !

Les symboles à connaître
Juste avant de commencer, je dois vous montrer les symboles que nous serons amenés à utiliser. Je vais vous faire un petit tableau avec ces symboles et leur signification. Essayez de bien les retenir, ils vous seront utiles !

Symbole

Signification

==

Est égal à

>

Est supérieur à

<

Est inférieur à

>=

Est supérieur ou égal à

<=

Est inférieur ou égal à

!=

Est différent de

Il y a deux symboles « égal » (==) sur la première ligne, et il ne faut pas confondre ça avec le simple=que je vous ai appris dans le chapitre sur les variables. Ici, le double égal sert à tester l'égalité, à dire « Si c'est égal à… ».
Dans les conditions, on utilisera toujours le double égal (==).

Les symboles « supérieur » (>) et « inférieur » (<) sont situés en bas à gauche de votre clavier.

La structure if… else
Voici ce qu'on doit écrire, dans l'ordre, pour utiliser une condition.

Pour introduire une condition, on utilise le motif, qui en anglais signifie « si ».

On ajoute à la suite entre parenthèses la condition en elle-même (vous allez voir que vous pouvez inventer une infinité de conditions).

Enfin, on ouvre des accolades à l'intérieur desquelles on placera les instructions à exécuter si la condition est remplie.

Puisqu'un exemple vaut toujours mieux qu'un long discours :

<?php
$age = 8;

if ($age <= 12)
{
    echo "Salut gamin !";
}
?>
Ici, on demande à PHP : si la variable$ageest inférieure ou égale à 12, affiche « Salut gamin ! ».

Vous remarquerez que dans la quasi-totalité des cas, c'est sur une variable qu'on fait la condition.
Dans notre exemple, on travaille sur la variable$age. Ce qui compte ici, c'est qu'il y a deux possibilités : soit la condition est remplie (l'âge est inférieur ou égal à 12 ans) et alors on affiche quelque chose  ; sinon, eh bien on saute les instructions entre accolades, on ne fait rien.

Bon, on peut quand même améliorer notre exemple. On va afficher un autre message si l'âge est supérieur à 12 ans :

<?php
$age = 8;
 
if ($age <= 12) // SI l'âge est inférieur ou égal à 12
{
    echo "Salut gamin ! Bienvenue sur mon site !<br />";
    $autorisation_entrer = "Oui";
}
else // SINON
{
    echo "Ceci est un site pour enfants, vous êtes trop vieux pour pouvoir  entrer. Au revoir !<br />";
    $autorisation_entrer = "Non";
}
 
echo "Avez-vous l'autorisation d'entrer ? La réponse est : $autorisation_entrer";
?>
Bon : comment marche ce code ? Tout d'abord, j'ai mis plusieurs instructions entre accolades.
Ensuite, vous avez remarqué que j'ai ajouté le motelse(« sinon »). En clair, on demande : Si l'âge est inférieur ou égal à 12 ans, fais ceci, sinon fais cela.

Essayez ce bout de code chez vous, en vous amusant à modifier la valeur de$age(sur la première ligne). Vous allez voir que le message qui s'affiche change en fonction de l'âge que vous indiquez !

Bien entendu, vous mettez les instructions que vous voulez entre accolades. Ici par exemple, j'ai donné une valeur différente à la variable$autorisation_entreraprès avoir affiché un message, valeur qui pourrait nous servir par la suite :

<?php
$autorisation_entrer = "Oui";

if ($autorisation_entrer == "Oui") // SI on a l'autorisation d'entrer
{
    // instructions à exécuter quand on est autorisé à entrer
}
elseif ($autorisation_entrer == "Non") // SINON SI on n'a pas l'autorisation d'entrer
{
    // instructions à exécuter quand on n'est pas autorisé à entrer
}
else // SINON (la variable ne contient ni Oui ni Non, on ne peut pas agir)
{
    echo "Euh, je ne connais pas ton âge, tu peux me le rappeler s'il te plaît ?";
}
?>
Ouh là, ça commence à se compliquer un tantinet, n'est-ce pas ?

La principale nouveauté ici, c'est le mot-cléelseifqui signifie « sinon si ». Dans l'ordre, PHP rencontre les conditions suivantes :

si$autorisation_entrerest égale à « Oui », tu exécutes ces instructions…

sinon si$autorisation_entrerest égale à « Non », tu exécutes ces autres instructions…

sinon, tu redemandes l'âge pour savoir si on a ou non l'autorisation d'entrer.

Au fait, au départ, une variable ne contient rien. Sa valeur est vide, on dit qu'elle vautNULL, c'est-à-dire rien du tout.
Pour vérifier si la variable est vide, vous pouvez taper :if ($variable == NULL)…

Le cas des booléens
Si vous regardez bien le dernier code source (avec$autorisation_entrer), vous ne trouvez pas qu'il serait plus adapté d'utiliser des booléens ?

On a parlé des booléens dans le chapitre sur les variables. Vous vous souvenez ?
Ce sont ces variables qui valent soittrue(vrai) soitfalse(faux). Eh bien, les booléens sont particulièrement utiles avec les conditions ! Voici comment on teste une variable booléenne :

<?php
$autorisation_entrer = true;

if ($autorisation_entrer == true)
{
    echo "Bienvenue petit nouveau. :o)";
}
elseif ($autorisation_entrer == false)
{
    echo "T'as pas le droit d'entrer !";
}
?>
Voilà, jusque-là rien d'extraordinaire. Vous avez vu que je n'ai pas mis de guillemets pourtrueetfalse, comme je vous l'ai dit dans le chapitre sur les variables.

Mais un des avantages des booléens, c'est qu'ils sont particulièrement adaptés aux conditions.
Pourquoi ? Parce qu'en fait vous n'êtes pas obligés d'ajouter le== true. Quand vous travaillez sur une variable booléenne, PHP comprend très bien ce que vous avez voulu dire :

<?php
$autorisation_entrer = true;

if ($autorisation_entrer)
{
    echo "Bienvenue petit nouveau. :o)";
}
else
{
    echo "T'as pas le droit d'entrer !";
}
?>
PHP comprend qu'il faut qu'il vérifie si$autorisation_entrervauttrue. Avantages :

c'est plus rapide à écrire pour vous ;

ça se comprend bien mieux.

En effet, si vous « lisez » la première ligne, ça donne : « SI on a l'autorisation d'entrer… ».
C'est donc un raccourci à connaître quand on travaille sur des booléens.

Oui mais ta méthode « courte » ne marche pas si on veut vérifier si le booléen vaut faux. Comment on fait avec la méthode courte, hein ?

Il y a un symbole qui permet de vérifier si la variable vautfalse : le point d'exclamation (!). On écrit :

<?php
$autorisation_entrer = true;

if (! $autorisation_entrer)
{

}
?>
C'est une autre façon de faire. Si vous préférez mettreif ($autorisation_entrer == false)c'est tout aussi bien, mais la méthode « courte » est plus lisible.

Des conditions multiples
Ce qu'on va essayer de faire, c'est de poser plusieurs conditions à la fois. Pour cela, on aura besoin de nouveaux mots-clés. Voici les principaux à connaître :

Mot-clé

Signification

Symbole équivalent

AND

Et

&&

OR

Ou

||

Le symbole équivalent pourORest constitué de deux barres verticales. Pour taper une barre verticale, appuyez sur les touches « Alt Gr » et « 6 » en même temps (sur un clavier AZERTY français) ou « Alt Gr » et « & » (sur un clavier AZERTY belge).

La première colonne contient le mot-clé en anglais, la troisième son équivalent en symbole. Les deux fonctionnent aussi bien, mais je vous recommande d'utiliser le mot-clé de préférence, c'est plus « facile » à lire (j'espère que vous connaissez un peu l'anglais, quand même). Servez-vous de ces mots-clés pour mettre plusieurs conditions entre les parenthèses. Voici un premier exemple :

<?php
$age = 8;
$langue = "anglais";


if ($age <= 12 AND $langue == "français")
{
    echo "Bienvenue sur mon site !";
}
elseif ($age <= 12 AND $langue == "anglais")
{
    echo "Welcome to my website!";
}
?>
C'est tout simple en fait et ça se comprend très bien : si l'âge est inférieur ou égal à 12 ans et que le visiteur parle français, on lui affiche un message de bienvenue en français. Sinon, si le visiteur parle anglais, on affiche un message en anglais.

Bon allez, un dernier exemple avecORpour que vous l'ayez vu au moins une fois, et on arrête là.

<?php
$pays = "France";

if ($pays == "France" OR $pays == "Belgique")
{
    echo "Bienvenue sur notre site !";
}
else
{
    echo "Désolés, notre service n'est pas encore disponible dans votre pays !";
}
?>
L'astuce bonus
Avec les conditions, il y a une astuce à connaître.
Sachez que les deux codes ci-dessous donnent exactement le même résultat :

<?php
$variable = 23;

if ($variable == 23)
{
    echo '<strong>Bravo !</strong> Vous avez trouvé le nombre mystère !';
}
?>
<?php
$variable = 23;

if ($variable == 23)
{
?>
<strong>Bravo !</strong> Vous avez trouvé le nombre mystère !
<?php
}
?>
Comme vous le voyez, dans le second colonne on n'a pas utilisé deecho. En effet, il vous suffit d'ouvrir l'accolade ({), puis de fermer la balise PHP (?>), et vous pouvez mettre tout le texte à afficher que vous voulez en HTML !
Rudement pratique quand il y a de grosses quantités de texte à afficher, et aussi pour éviter d'avoir à se prendre la tête avec les antislashs devant les guillemets ("ou').
Il vous faudra toutefois penser à refermer l'accolade après (à l'intérieur d'une balise PHP, bien entendu).

Et après ça, ma foi, il n'y a rien de particulier à savoir. Vous allez rencontrer des conditions dans la quasi-totalité des exemples que je vous donnerai par la suite.
Vous ne devriez pas avoir de problèmes normalement pour utiliser des conditions, il n'y a rien de bien difficile. Contentez-vous de reprendre le schéma que je vous ai donné pour la structureif… elseet de l'appliquer à votre cas. Nous aurons d'ailleurs bientôt l'occasion de pratiquer un peu, et vous verrez que les conditions sont souvent indispensables.

Un autre type de condition bien pratique : switch
En théorie, les structures à base de if… elseif… elseque je viens de vous montrer suffisent pour traiter n'importe quelle condition.

Mais alors, pourquoi se compliquer la vie avec une autre structure ?

Pour vous faire comprendre l'intérêt deswitch, je vais vous donner un exemple un peu lourd avec lesifetelseifque vous venez d'apprendre :

<?php
$note = 16;

if ($note == 0)
{
    echo "Tu es vraiment un gros nul !!!";
}

elseif ($note == 5)
{
    echo "Tu es très mauvais";
}

elseif ($note == 7)
{
    echo "Tu es mauvais";
}

elseif ($note == 10)
{
    echo "Tu as pile poil la moyenne, c'est un peu juste…";
}

elseif ($note == 12)
{
    echo "Tu es assez bon";
}

elseif ($note == 16)
{
    echo "Tu te débrouilles très bien !";
}

elseif ($note == 20)
{
    echo "Excellent travail, c'est parfait !";
}

else
{
    echo "Désolé, je n'ai pas de message à afficher pour cette note";
}
?>
Comme vous le voyez, c'est lourd, long, et répétitif. Dans ce cas, on peut utiliser une autre structure plus souple : c'est switch.

Voici le même exemple avec switch(le résultat est le même, mais le code est plus adapté) :

<?php
$note = 10;

switch ($note) // on indique sur quelle variable on travaille
{ 
    case 0: // dans le cas où $note vaut 0
        echo "Tu es vraiment un gros nul !!!";
    break;
    
    case 5: // dans le cas où $note vaut 5
        echo "Tu es très mauvais";
    break;
    
    case 7: // dans le cas où $note vaut 7
        echo "Tu es mauvais";
    break;
    
    case 10: // etc. etc.
        echo "Tu as pile poil la moyenne, c'est un peu juste…";
    break;
    
    case 12:
        echo "Tu es assez bon";
    break;
    
    case 16:
        echo "Tu te débrouilles très bien !";
    break;
    
    case 20:
        echo "Excellent travail, c'est parfait !";
    break;
    
    default:
        echo "Désolé, je n'ai pas de message à afficher pour cette note";
}
?>
Testez donc ce code !
Essayez de changer la note (dans la première instruction) pour voir comment PHP réagit ! Et si vous voulez apporter quelques modifications à ce code (vous allez voir qu'il n'est pas parfait), n'hésitez pas, ça vous fera de l'entraînement !

Tout d'abord, il y a beaucoup moins d'accolades (elles marquent seulement le début et la fin duswitch).

casesignifie « cas ». Dans leswitch, on indique au début sur quelle variable on travaille (ici$note). On dit à PHP : Je vais analyser la valeur de$note. Après, on utilise descasepour analyser chaque cas (case 0,case 10, etc.). Cela signifie  : Dans le cas où la valeur est 0… Dans le cas où la valeur est 10…

Avantage : on n'a plus besoin de mettre le double égal ! Défaut : ça ne marche pas avec les autres symboles (< > <= >= !=). En clair, leswitchne peut tester que l'égalité.

Le mot-clédefaultà la fin est un peu l'équivalent duelse. C'est le message qui s'affiche par défaut quelle que soit la valeur de la variable.

Il y a cependant une chose importante à savoir : supposons dans notre exemple que la note soit de 10. PHP va lire :case 0 ? Non. Je saute.case 5 ? Non plus. Je saute.case 7 ? Non plus. Je saute.case 10 ? Oui, j'exécute les instructions. Mais contrairement auxelseif, PHP ne s'arrête pas là et continue à lire les instructions des case qui suivent !case 12,case 16, etc.

Pour empêcher cela, utilisez l'instructionbreak;. L'instructionbreakdemande à PHP de sortir duswitch. Dès que PHP tombe surbreak, il sort des accolades et donc il ne lit pas lescasequi suivent. En pratique, on utilise très souvent unbreakcar sinon, PHP lit des instructions qui suivent et qui ne conviennent pas.
Essayez d'enlever lesbreakdans le code précédent, vous allez comprendre pourquoi ils sont indispensables !

Quand doit-on choisirif, et quand doit-on choisirswitch ?

C'est surtout un problème de présentation et de clarté. Pour une condition simple et courte, on utilise leif, et quand on a une série de conditions à analyser, on préfère utiliserswitchpour rendre le code plus clair.

Les ternaires : des conditions condensées
Il existe une autre forme de condition, beaucoup moins fréquente, mais que je vous présente quand même car vous pourriez un jour ou l'autre tomber dessus. Il s'agit de ce qu'on appelle les ternaires.

Un ternaire est une condition condensée qui fait deux choses sur une seule ligne :

on teste la valeur d'une variable dans une condition ;

on affecte une valeur à une variable selon que la condition est vraie ou non.

Prenons cet exemple à base deif… elsequi met un booléen$majeurà vrai ou faux selon l'âge du visiteur :

<?php
$age = 24;

if ($age >= 18)
{
    $majeur = true;
}
else
{
    $majeur = false;
}
?>
On peut faire la même chose en une seule ligne grâce à une structure ternaire :

<?php
$age = 24;

$majeur = ($age >= 18) ? true : false;
?>
Ici, tout notre test précédent a été fait sur une seule ligne !

La condition testée est$age >= 18. Si c'est vrai, alors la valeur indiquée après le point d'interrogation (icitrue) sera affectée à la variable$majeur. Sinon, c'est la valeur qui suit le symbole « deux-points » qui sera affectée à$majeur.

C'est un peu tordu mais ça marche.
Si vous n'utilisez pas ce type de condition dans vos pages web, je ne vous en voudrai pas. Il faut avouer que les ternaires sont un peu difficiles à lire car ils sont très condensés. Mais sachez les reconnaître et les comprendre si vous en rencontrez un jour en lisant le code source de quelqu'un d'autre.

En résumé
Les conditions permettent à PHP de prendre des décisions en fonction de la valeur des variables.

La forme de condition la plus courante estif…elseif…elsequi signifie « si »… « sinon si »… « sinon ».

On peut combiner des conditions avec les mots-clésAND(« et ») etOR(« ou »).

Si une condition comporte de nombreuxelseif, il peut être plus pratique d'utiliserswitch, une autre forme de condition.

Les ternaires sont des conditions condensées qui font un test sur une variable, et en fonction des résultats de ce test donnent une valeur à une autre variable. Elles sont cependant plus rarement utilisées.

Que pensez-vous de ce cours ?