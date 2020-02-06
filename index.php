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


        <script src="" async defer></script>
    </body>
</html>