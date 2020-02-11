<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="">
    </head>
    <body>
    <h2>Affichage de texte avec PHP</h2>
        
        <p>
            Cette ligne a été écrite entièrement en HTML.<br />
            <?php echo "Celle-ci a été écrite entièrement en PHP."; ?>
        </p>

        <!--Les conditions-->
        <!--Ici, on demande à PHP : si la variable$ageest inférieure ou égale à 12, affiche « Salut gamin ! ».-->
        <?php
        $age = 8;

        if ($age <= 12)
        {
            echo "Salut gamin !";
        }
        ?>
        
        <!--Ensuite, vous avez remarqué que j'ai ajouté le motelse(« sinon »). En clair, on demande : 
        Si l'âge est inférieur ou égal à 12 ans, fais ceci, sinon fais cela.-->
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

        <!--La principale nouveauté ici, c'est le mot-cléelseifqui signifie « sinon si ». Dans l'ordre, 
        PHP rencontre les conditions suivantes :-->

        <!--1-si ($autorisation_entrer) est égale à « Oui », tu exécutes ces instructions…-->
        <!--2-sinon si ($autorisation_entrer) est égale à « Non », tu exécutes ces autres instructions…-->
        <!--3-sinon, tu redemandes l'âge pour savoir si on a ou non l'autorisation d'entrer.-->
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

        <p>Le cas des booléens</p>
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
        <!--En effet, si vous « lisez » la première ligne, ça donne : « SI on a l'autorisation d'entrer… ».
C'est donc un raccourci à connaître quand on travaille sur des booléens.-->
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

        <!--Il y a un symbole qui permet de vérifier 
        si la variable vautfalse : le point d'exclamation (!). On écrit :-->
        <!--C'est une autre façon de faire. Si vous préférez mettreif ($autorisation_entrer == false)
        c'est tout aussi bien, mais la méthode « courte » est plus lisible.-->
        <?php
        $autorisation_entrer = true;

        if (! $autorisation_entrer)
        {

        }
        ?>

        <!--Des conditions multiples-->
        
        <!-- si l'âge est inférieur ou égal à 12 ans et que le visiteur parle français, 
        on lui affiche un message de bienvenue en français. Sinon, si le visiteur parle anglais, 
        on affiche un message en anglais.-->
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

        <!--Exemple 2 avec "OR"-->
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

        <!--L'astuce bonus-->
        <!--les deux codes ci-dessous donnent exactement le même résultat-->
        <?php
        $variable = 23;

        if ($variable == 23)
        {
            echo '<strong>Bravo !</strong> Vous avez trouvé le nombre mystère !';
        }
        ?>
        <!--et-->
        <?php
        $variable = 23;

        if ($variable == 23)
        {
        ?>
        <strong>Bravo !</strong> Vous avez trouvé le nombre mystère !
        <?php
        }
        ?>

        <!--Un autre type de condition bien pratique : switch-->
        <!--En théorie, les structures à base de if… elseif… elseque je viens 
        de vous montrer suffisent pour traiter n'importe quelle condition.-->
        <!--Pour vous faire comprendre l'intérêt deswitch, je vais vous donner un 
        exemple un peu lourd avec lesifetelseifque vous venez d'apprendre :-->
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
        <!--Comme vous le voyez, c'est lourd, long, et répétitif. Dans ce cas, 
        on peut utiliser une autre structure plus souple : c'est switch.-->
        <!--Voici le même exemple avec switch(le résultat est le même,
         mais le code est plus adapté) :-->
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

        <!--Les ternaires : des conditions condensées-->
        <!--Prenons cet exemple à base deif… elsequi met un booléen "$majeur" à vrai 
        ou faux selon l'âge du visiteur :-->
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
        <!--On peut faire la même chose en une seule ligne grâce à une structure ternaire :-->
        <?php
        $age = 24;

        $majeur = ($age >= 18) ? true : false;
       
       ?>
       <!--La condition testée est$age >= 18. Si c'est vrai, alors la valeur indiquée après 
       le point d'interrogation (icitrue) sera affectée à la variable$majeur. Sinon, 
       c'est la valeur qui suit le symbole « deux-points » qui sera affectée à$majeur.-->


        <script src="" async defer></script>
    </body>
</html>