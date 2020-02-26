# FormationPHP
Tutoriel sur la création d'un panier en PHP
Table des matièresPlier
Introduction
I. Procédure
II. Création du script de fonctions
II-A. Création du panier
II-B. Ajout d'un article
II-C. Suppression d'un article
II-D. Modifier un article
II-E. Montant du panier
II-F. Quelques fonctions utiles
III. Création du panier
III-A. Affichage du panier
III-B. Création des traitements
III-C. Utilisation du panier
IV. Pour aller plus loin
V. Remerciements
VI. Codes complets
Cet article a pour but d'expliquer la création simple d'un panier en PHP.

52 commentaires Donner une note � l'article (4.5)

Article lu 123218 fois.

L'auteur
Joris CROZIER

L'article
Publié le 5 novembre 2007 - Mis à jour le 10 décembre 2019 

Version PDF
ePub, Azw et Mobi

Liens sociaux
Viadeo Twitter Facebook Share on Google+  Partager 
Introduction▲
Cet article montre une méthode simple pour créer un panier en PHP. Cet article s'adresse aux programmeurs débutants désirant créer simplement un panier pour leur site.
Pour comprendre cet article, il vous faut connaitre un minimum :

les bases de PHP ;
les tableaux en PHP ;
les sessions en PHP.
I. Procédure▲
Pour créer notre panier, nous allons procéder comme suit :

un script fonctions-panier.php regroupera les diverses fonctions utiles au panier ;
un script panier.php représentera le panier en lui-même et la base des appels aux fonctions.
Pour rendre le panier plus sympa à utiliser, nous ajouterons quelques miettes de JavaScript !

Dans notre exemple les articles ont trois propriétés :

leur libellé ;
leur quantité ;
leur prix.
Libre à vous d'en ajouter :-)

Il est recommandé d'utiliser une version de PHP 4.2.0 au minimum dû à l'utilisation de la fonction array_search().

II. Création du script de fonctions▲
Nous allons dans un premier temps monter notre fichier de fonctions pour notre panier : fonctions-panier.php.

II-A. Création du panier▲
Nous allons commencer avec une fonction creationPanier():

fonctions-panier.phpSélectionnez
function creationPanier(){
   if (!isset($_SESSION['panier'])){
      $_SESSION['panier']=array();
      $_SESSION['panier']['libelleProduit'] = array();
      $_SESSION['panier']['qteProduit'] = array();
      $_SESSION['panier']['prixProduit'] = array();
      $_SESSION['panier']['verrou'] = false;
   }
   return true;
}
Quelques explications

Dans un premier temps, on regarde si le panier existe, sinon on le crée.
On retourne true pour des raisons de pratique lors des tests 'if'.
La variable 'verrou' me permet de verrouiller toute action sur le panier, le verrou est à activer lorsque vous passez votre panier en paiement (non couvert dans cet article).
II-B. Ajout d'un article▲
Nous allons ajouter une fonction ajouterArticle() (toujours dans le fichier fonctions-panier.php, n'ayez crainte je fournis le code complet en fin d'article) :

fonctions-panier.phpSélectionnez
function ajouterArticle($libelleProduit,$qteProduit,$prixProduit){

   //Si le panier existe
   if (creationPanier() && !isVerrouille())
   {
      //Si le produit existe déjà on ajoute seulement la quantité
      $positionProduit = array_search($libelleProduit,  $_SESSION['panier']['libelleProduit']);

      if ($positionProduit !== false)
      {
         $_SESSION['panier']['qteProduit'][$positionProduit] += $qteProduit ;
      }
      else
      {
         //Sinon on ajoute le produit
         array_push( $_SESSION['panier']['libelleProduit'],$libelleProduit);
         array_push( $_SESSION['panier']['qteProduit'],$qteProduit);
         array_push( $_SESSION['panier']['prixProduit'],$prixProduit);
      }
   }
   else
   echo "Un problème est survenu veuillez contacter l'administrateur du site.";
}

Quelques explications

On vérifie en premier que le panier existe via notre fonction précédente creationPanier() et on vérifie que le panier n'est pas verrouillé.
On regarde si l'article existe déjà :

si oui on augmente sa quantité dans le panier ;
sinon on l'ajoute.
II-C. Suppression d'un article▲
Pour être en mesure de supprimer un article, il nous faut également une fonction, la voici :

fonctions-panier.phpSélectionnez
function supprimerArticle($libelleProduit){
   //Si le panier existe
   if (creationPanier() && !isVerrouille())
   {
      //Nous allons passer par un panier temporaire
      $tmp=array();
      $tmp['libelleProduit'] = array();
      $tmp['qteProduit'] = array();
      $tmp['prixProduit'] = array();
      $tmp['verrou'] = $_SESSION['panier']['verrou'];

      for($i = 0; $i < count($_SESSION['panier']['libelleProduit']); $i++)
      {
         if ($_SESSION['panier']['libelleProduit'][$i] !== $libelleProduit)
         {
            array_push( $tmp['libelleProduit'],$_SESSION['panier']['libelleProduit'][$i]);
            array_push( $tmp['qteProduit'],$_SESSION['panier']['qteProduit'][$i]);
            array_push( $tmp['prixProduit'],$_SESSION['panier']['prixProduit'][$i]);
         }

      }
      //On remplace le panier en session par notre panier temporaire à jour
      $_SESSION['panier'] =  $tmp;
      //On efface notre panier temporaire
      unset($tmp);
   }
   else
   echo "Un problème est survenu veuillez contacter l'administrateur du site.";
}
Quelques explications

On vérifie en premier que le panier existe via notre fonction précédente creationPanier() (et on vérifie le verrou).
On crée un panier « tampon » qui va être notre panier sans les éléments à supprimer.
On remplit ledit panier « tampon ».
On réaffecte notre panier via les valeurs du panier tampon que l'on supprime par la suite.

Cette méthode nous permet de garder un panier sans fioritures, nous aurions pu simplement supprimer les valeurs correspondantes dans le premier panier, ce qui aurait eu pour effet de laisser des valeurs NULL dans le panier et l'aurait rendu peu pratique à l'utilisation !

II-D. Modifier un article▲
Enfin il nous manque une fonction qui peut ne pas être mise en place, mais qui ajoute un grand confort à l'utilisation du panier, à savoir la modification de la quantité d'un article, la voici :

fonctions-panier.phpSélectionnez
function modifierQTeArticle($libelleProduit,$qteProduit){
   //Si le panier existe
   if (creationPanier() && !isVerrouille())
   {
      //Si la quantité est positive on modifie sinon on supprime l'article
      if ($qteProduit > 0)
      {
         //Recherche du produit dans le panier
         $positionProduit = array_search($libelleProduit,  $_SESSION['panier']['libelleProduit']);

         if ($positionProduit !== false)
         {
            $_SESSION['panier']['qteProduit'][$positionProduit] = $qteProduit ;
         }
      }
      else
      supprimerArticle($libelleProduit);
   }
   else
   echo "Un problème est survenu veuillez contacter l'administrateur du site.";
}
Quelques explications

On vérifie en premier que le panier existe via notre fonction précédente creationPanier().
Si la quantité demandée pour un produit est supérieure à 0 (et accessoirement celui-ci existe, mais il a peu de chances qu'on demande la modification d'un article qui n'existe pas).
On la modifie.
Si la quantité est négative ou nulle, cela revient à dire que l'on supprime l'article !
II-E. Montant du panier▲
Évidemment que serait notre panier s'il ne renvoyait pas le montant global des achats ?

fonctions-panier.phpSélectionnez
function MontantGlobal(){
   $total=0;
   for($i = 0; $i < count($_SESSION['panier']['libelleProduit']); $i++)
   {
      $total += $_SESSION['panier']['qteProduit'][$i] * $_SESSION['panier']['prixProduit'][$i];
   }
   return $total;
}
II-F. Quelques fonctions utiles▲
Nous allons ajouter quelques fonctions utiles et en premier lieu la fonction de vérification du verrou :

fonctions-panier.phpSélectionnez
function isVerrouille(){
   if (isset($_SESSION['panier']) && $_SESSION['panier']['verrou'])
   return true;
   else
   return false;
}
Cette fonction vérifie seulement l'état du verrou sans affecter le panier.

fonctions-panier.phpSélectionnez
function compterArticles()
{
   if (isset($_SESSION['panier']))
   return count($_SESSION['panier']['libelleProduit']);
   else
   return 0;

}
Quant à cette fonction-là, elle permet de compter le nombre d'articles différents dans le panier.
Pour avoir le nombre d'articles en fonction de la quantité de chacun, il faudra parcourir les articles et prendre en compte chaque quantité (à vous de jouer !)

fonctions-panier.phpSélectionnez
function supprimePanier(){
   unset($_SESSION['panier']);
}
Et une fonction qui peut s'avérer indispensable dans toute bonne boutique : la suppression du panier.

III. Création du panier▲
Nous allons créer un script que l'on appellera panier.php dans lequel nous allons afficher le panier, mais aussi appeler les fonctions créées précédemment !

Avant toute chose il est important de placer la ligne session_start() au début de notre panier.php (et si possible sur toutes les autres pages de votre site afin d'éviter de perdre votre panier et autres informations en route).

Ne mettez pas de session_start() dans le fichier fonctions-panier.php vous risqueriez d'obtenir des erreurs.

III-A. Affichage du panier▲
Dans un premier temps nous allons afficher le contenu du panier en traitant le cas où il serait vide : c'est le code qui sera exécuté par défaut dans notre script panier.php, le traitement se fera toujours avant l'affichage du panier :

panier.phpSélectionnez
<?php
session_start();
include_once("fonctions-panier.php");

echo '<?xml version="1.0" encoding="utf-8"?>';?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr">
<head>
<title>Votre panier</title>
</head>
<body>

<form method="post" action="panier.php">
<table style="width: 400px">
    <tr>
        <td colspan="4">Votre panier</td>
    </tr>
    <tr>
        <td>Libellé</td>
        <td>Quantité</td>
        <td>Prix Unitaire</td>
        <td>Action</td>
    </tr>


    <?php
    if (creationPanier())
    {
        $nbArticles=count($_SESSION['panier']['libelleProduit']);
        if ($nbArticles <= 0)
        echo "<tr><td>Votre panier est vide </ td></tr>";
        else
        {
            for ($i=0 ;$i < $nbArticles ; $i++)
            {
                echo "<tr>";
                echo "<td>".htmlspecialchars($_SESSION['panier']['libelleProduit'][$i])."</ td>";
                echo "<td><input type=\"text\" size=\"4\" name=\"q[]\" value=\"".htmlspecialchars($_SESSION['panier']['qteProduit'][$i])."\"/></td>";
                echo "<td>".htmlspecialchars($_SESSION['panier']['prixProduit'][$i])."</td>";
                echo "<td><a href=\"".htmlspecialchars("panier.php?action=suppression&l=".rawurlencode($_SESSION['panier']['libelleProduit'][$i]))."\">XX</a></td>";
                echo "</tr>";
            }

            echo "<tr><td colspan=\"2\"> </td>";
            echo "<td colspan=\"2\">";
            echo "Total : ".MontantGlobal();
            echo "</td></tr>";

            echo "<tr><td colspan=\"4\">";
            echo "<input type=\"submit\" value=\"Rafraichir\"/>";
            echo "<input type=\"hidden\" name=\"action\" value=\"refresh\"/>";

            echo "</td></tr>";
        }
    }
    ?>
</table>
</form>
</body>
</html>
Quelques explications

On crée un tableau HTML pour la présentation de notre panier.
S'il est vide, on le spécifie.
Sinon on affiche les lignes de notre panier.
La petite spécificité de notre exemple c'est que j'ai mis en place un formulaire pour gérer le changement de quantité d'un article !

III-B. Création des traitements▲
Dans notre exemple nous allons traiter les diverses actions via une variable $action passée en GET ou en POST (les deux fonctionnent).

Notre variable débouchera donc sur un Switch qui appellera nos fonctions créées précédemment.
Tout ceci avant l'affichage du panier.

panier.phpSélectionnez
$erreur = false;

$action = (isset($_POST['action'])? $_POST['action']:  (isset($_GET['action'])? $_GET['action']:null )) ;
if($action !== null)
{
   if(!in_array($action,array('ajout', 'suppression', 'refresh')))
   $erreur=true;

   //récuperation des variables en POST ou GET
   $l = (isset($_POST['l'])? $_POST['l']:  (isset($_GET['l'])? $_GET['l']:null )) ;
   $p = (isset($_POST['p'])? $_POST['p']:  (isset($_GET['p'])? $_GET['p']:null )) ;
   $q = (isset($_POST['q'])? $_POST['q']:  (isset($_GET['q'])? $_GET['q']:null )) ;

   //Suppression des espaces verticaux
   $l = preg_replace('#\v#', '',$l);
   //On vérifie que $p soit un float
   $p = floatval($p);

   //On traite $q qui peut être un entier simple ou un tableau d'entiers
    
   if (is_array($q)){
      $QteArticle = array();
      $i=0;
      foreach ($q as $contenu){
         $QteArticle[$i++] = intval($contenu);
      }
   }
   else
   $q = intval($q);
    
}

if (!$erreur){
   switch($action){
      Case "ajout":
         ajouterArticle($l,$q,$p);
         break;

      Case "suppression":
         supprimerArticle($l);
         break;

      Case "refresh" :
         for ($i = 0 ; $i < count($QteArticle) ; $i++)
         {
            modifierQTeArticle($_SESSION['panier']['libelleProduit'][$i],round($QteArticle[$i]));
         }
         break;

      Default:
         break;
   }
}
Un grand soin est apporté à la vérification des variables transmises au panier pour éviter les injections de code ou les failles xss.

L'utilisation du pattern '\v' nécessite une version de PHP 5.2.4, elle permet de supprimer les espaces verticaux superflus.

Plus d'infos sur le pattern utilisé.

III-C. Utilisation du panier▲
Nous avons désormais toutes nos fonctions du panier et notre panier. Reste un petit détail : comment appeler le panier pour y ajouter un article ?

Nous allons utiliser une fonction JavaScript à placer sur notre page de catalogue :

page d'un catalogueSélectionnez
<a href="panier.php?action=ajout&amp;l=LIBELLEPRODUIT&amp;q=QUANTITEPRODUIT&amp;p=PRIXPRODUIT" onclick="window.open(this.href, '', 
'toolbar=no, location=no, directories=no, status=yes, scrollbars=yes, resizable=yes, copyhistory=no, width=600, height=350'); return false;">Ajouter au panier</a>
Voilà, notre panier est opérationnel !
Nous avons pu voir la création simple d'un panier, bien entendu vous pouvez maintenant partir de cet exemple pour faire un panier plus élaboré !

Bon développement !

IV. Pour aller plus loin▲
L'utilisation du panier peut aussi se faire via une base de données, afin de coller au plus près de la gestion des produits et des stocks.
Cette partie sera sûrement abordée dans un prochain article sur la création avancée d'un panier en php et Mysql.
En attendant, je vous renvoie sur un lien pour implémenter la gestion de la base avec votre panier : Utiliser une base de données pour sécuriser vos sessions