<!DOCTYPE html>
<html lang="fr_FR">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
    <?php
    function afficheContenu() {
        $fichier = "./flux-cache.txt";
        $heure_courante = time();
        $expiration = 300;
        $heure_fichier = filemtime($fichier);
		
        if(file_exists($fichier) && ($heure_courante - $expiration < $heure_fichier)) {
            return file_get_contents($fichier);
        }
        else {
            $contenu = recupereContenu();
            file_put_contents($fichier, $contenu);
            return $contenu;
        }
    }

    function recupereContenu() {
        $html = "";
        $listeFlux = array(
            array(
                "nom" => "Le Monde",
                "url" => "http://www.lemonde.fr/rss/une.xml"
            ),
            array(
                "nom" => "L'Équipe",
                "url" => "https://www.lequipe.fr/rss/actu_rss.xml"
            ),
            array(
                "nom" => "Télérama",
                "url" => "http://www.telerama.fr/rss/une.xml"
            )
        );
 
		function litFlux($url){
            $rss = simplexml_load_file($url);
			
			//print_r($rss);
            $article = 0;
            $html .= '<ul>';
            foreach($rss->channel->item as $item) {
                $article++;
                if($article > 8){
                    break;
                }
                $html .= '<li><a href="'.htmlspecialchars($item->link).'">'.htmlspecialchars($item->title).'</a><br/>'.htmlspecialchars($item->description).'</li>';
            }
            $html .= '</ul>';
            return $html;
        }
        
		foreach($listeFlux as $source) {
            $html .= '<h2>'.$source["nom"].'</h2>';
            $html .= litFlux($source["url"]);
        }
        return $html;
    }
    
	print afficheContenu();
    ?>

    </body>
</html>