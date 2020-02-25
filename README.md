# FormationPHP
Comment hasher(crypter) un mot de passe en PHP
par Tychic Obanda

Programmation web |  5 commentaires

Partager sur Facebook Partager sur Twitter Partager sur Whatsapp

Bienvenue sur 243tech, blog dédié sur le Développement web et le Blogging. Si c'est la première fois que vous venez ici, je vous offre gratuitement mon ebook "Le guide ultime pour le développement web". Cliquez ici pour télécharger le guide !



 
Il vous est déjà arrivé de vous demander comment crypter les mots de passe de vos utilisateurs afin de les sécuriser? Et bien, c'est ce que je vais partager avec vous aujourd'hui. Nous allons découvrir ensemble comment hasher un mot de passe en PHP.

PHP est parmi les langages back-end les plus utilisés sur le web et son utilisation est en quelque sorte un chemin obligé pour les novices en programmation web.

Si vous êtes encore débutant en programmation, il est fort probable que vous ne connaissiez pas ce que c'est hasher un mot de passe. Mais à travers cet article, vous allez le comprendre et l'utiliser pour toute une vie Emoji sourire

A lire :
Comment sécuriser les dossiers de son site internet
Mais c'est quoi exactement hasher un mot de passe? Et pourquoi le faire?

Ces questions méritent des réponses.

C'est quoi hasher un mot de passe

 
Hasher un mot de passe revient à le crypter pour interdire la compréhension aux humains que nous sommes. Vous n'avez pas toujours compris? Un exemple vous fera comprendre.

Supposons que votre mot de passe est MotDEPass3. Après le hashage(action de hasher), ce mot de passe deviendra $2y$10$.ULS6PTKyvRm4.W7tewXe.dsCddKhoJ0Cj1j4ib0D9JNaZaXJDd4a.

Vous êtes arrivé à lire ce mot de passe crypté? Je ne crois pas. Avec cet exemple, je pense que vous avez compris l'importance de hasher un mot de passe.

Un autre exemple :

Imaginez que vous créez un espace membre sur votre site. Et qu'à chaque inscription, le membre doit renseigner ses informations ainsi que son mot de passe que vous allez stocker dans la base de données.

Vous ne devez jamais stocker dans votre base de données un mot de passe tel que saisi par l'utilisateur. Il faut le crypter. Pourquoi? Votre site peut être un jour le cible de piratage(je ne souhaite pas que cela vous arrive Emoji sourire ) et que le hacker récupère une copie de votre base de données.

Si les mots de passe de vos utilisateurs sont cryptés, le hacker ne saura pas se connecter aux comptes de vos utilisateurs. Dans le cas contraire, vous savez où je vais arriver.

Bref, il faut faire le hashage de mot de passe et voyons maintenant comment le faire.

Le hashage ne concerne pas seulement les mots de passe et ne se fait pas uniquement en PHP. Vous pouvez hasher n'importe quelle information dans n'importe quel langage de programmation.

Comment hasher un mot de passe en PHP

 
Lorsqu'on hashe les mots de passe, les deux considérations les plus importantes sont le temps de traitement et le grain de sel. Plus la puissance de traitement requise est élevée, plus il faudra du temps pour casser le mot de passe en analysant sa sortie.

Un grain de sel est une petite donnée additionnelle qu'on renforce significativement la puissance du hashage pour le rendre beaucoup plus difficile à hacker.

Pour hasher un mot de passe en PHP, on peut utiliser plusieurs fonctions que je vous présente ci-dessous.

password_hash()
La fonction password_hash() crypte dynamiquement une information et c'est la fonction recommandé pour le hashage des mots de passe.

Cette fonction reçoit toujours deux paramètres :

la chaîne de caractère : dans notre cas, il s'agit du mot de passe
l'option de hashage : nous avons trois options de hashage :
PASSWORD_DEFAULT : l'option que je vous conseille d'utiliser
PASSWORD_BCRYPT
PASSWORD_ARGON2I
Prenons maintenant un exemple.

<?php
$pass = "MotDEPass3";
  echo password_hash($pass, PASSWORD_DEFAULT);  // Affiche le mot de passe crypté
?>
Cet exemple explique l'utilisation de la fonction password_hash(). Cette fonction reçoit en premier paramètre, l'information qu'on souhaite hasher(variable $pass). En deuxième paramètre, elle reçoit l'option de hashage(PASSWORD_DEFAULT).

Maintenant la question qui se pose c'est, comment comment savoir si le mot de passe sais correspond à celui hashé?

Vérifier la correspondance entre mot de passe hashé et son origine
Pour vérifier la correspondance d'un mot de passe hashé en password_hash(), on utilise la fonction password_verify() qui recoit deux paramètres :

le mot de passe non hashé
le mot de passe hashé
<?php
$pass = "MotDEPass3";
$pass_hash = password_hash($pass, PASSWORD_DEFAULT);
if (password_verify($pass, $pass_hash))
{
  echo "Mot de passe correct";
}
else
{
  echo "Mot de passe incorrect";
}
?>
Autres fonctions pour hasher un mot de passe
La fonction password_hash() n'est pas la seule fonction de hashage. Il existe d'autres fonctions de hashage.

Mais le problème avec ces fonctions est que, on ne conseille plus de les utiliser car elles ne sont plus fortes côté sécurité.

Parmi ces fonctions, nous avons :

crypt()
sha1()
md5()
Avec cet article, je pense que vous êtes maintenant en mesure de hasher les mots de passe de vos utilisateurs.

Partager sur Facebook Partager sur Twitter Partager sur Whatsapp
