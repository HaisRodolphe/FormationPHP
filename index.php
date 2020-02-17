<!--Les Boucles-->

<!--Les Boucles simple: while-->
<!--whilepeut se traduire par « tant que ». 
Ici, on demande à PHP : TANT QUE$continuer_boucleest vrai, 
exécuter ces instructions.-->
<?php
while ($continuer_boucle == true)
{
    // instructions à exécuter dans la boucle
}
?>

<!-- vous avez été punis et que vous devez recopier 100 fois 
« Je ne dois pas regarder les mouches voler quand j'apprends le PHP. ».-->
<!--La boucle pose la condition : TANT QUE$nombre_de_lignesest inférieur ou égal à 100.-->
<?php
$nombre_de_lignes = 1;

while ($nombre_de_lignes <= 100)
{
    echo 'Je ne dois pas regarder les mouches voler quand j\'apprends le PHP.<br />';
    $nombre_de_lignes++; // $nombre_de_lignes = $nombre_de_lignes + 1
}
?>

<!--On peut écrire de la même manière une centaine de lignes, 
mais chacune peut être différente (on n'est pas obligés d'écrire la même chose à chaque fois).
Cet exemple devrait vous montrer que la valeur de la variable augmente à chaque 
passage dans la boucle :-->

<!--Voilà, c'est tout bête, et cet exemple ressemble beaucoup au précédent. La particularité, 
là, c'est qu'on affiche à chaque fois la valeur de$nombre_de_lignes
(ça vous permet de voir que sa valeur augmente petit à petit).-->
<?php
$nombre_de_lignes = 1;

while ($nombre_de_lignes <= 100)
{
    echo 'Ceci est la ligne n°' . $nombre_de_lignes . '<br />';
    $nombre_de_lignes++;
}
?>

<!--Une boucle plus complexe : for-->
<!--forest un autre type de boucle, dans une forme un peu plus 
condensée et plus commode à écrire, ce qui fait queforest assez fréquemment utilisé.-->

<?php
for ($nombre_de_lignes = 1; $nombre_de_lignes <= 100; $nombre_de_lignes++)
{
    echo 'Ceci est la ligne n°' . $nombre_de_lignes . '<br />';
}
?>

<!--Bon, vous vous en doutez, je ne vais vous expliquer que la ligne dufor, 
le reste n'ayant pas changé.

Après le motfor, il y a des parenthèses qui contiennent trois éléments, 
séparés par des points-virgules;.-->

