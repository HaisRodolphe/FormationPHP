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



