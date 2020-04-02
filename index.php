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

        <!--Les variables-->
        <?php
        $age_du_visiteur = 17;
        echo $age_du_visiteur; //Afficher les variables.
        ?>

        <?php
        $age_du_visiteur = 17;
        echo 'Le visiteur a ' . $age_du_visiteur . ' ans';//Afficher les variables la bonne écriture. 
        ?>
        
        <!--Les calcules-->
        <?php
        $nombre = 2 + 4; // $nombre prend la valeur 6
        $nombre = 5 - 1; // $nombre prend la valeur 4
        $nombre = 3 * 5; // $nombre prend la valeur 15
        $nombre = 10 / 2; // $nombre prend la valeur 5

        // Allez on rajoute un peu de difficulté
        $nombre = 3 * 5 + 1; // $nombre prend la valeur 16
        $nombre = (1 + 2) * 2; // $nombre prend la valeur 6
        ?>
        
        <?php
        $nombre = 10;
        $resultat = ($nombre + 5) * $nombre; // $resultat prend la valeur 150
        ?>

        <script src="" async defer></script>
    </body>
</html>