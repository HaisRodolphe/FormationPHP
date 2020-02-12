<?php

require "twitteroauth/autoload.php";

use Abraham\TwitterOAuth\TwitterOAuth;

// Configuration
$recherche = $_POST['mot_recherche'];
$nbrTweet = 10;
$consumerKey = "XXXXXXXXXXXXXXXXXXXXXXXXX";
$consumerSecret = "XXXXXXXXXXXXXXXXXXXX";
$accessToken = "XXXXXXXXXXXXXXXXXXX";
$accessTokenSecret = "XXXXXXXXXXXXXXXXXXX"; 

if($recherche && $consumerKey && $consumerSecret && $accessToken && $accessTokenSecret) {
    $twitterConnexion = new TwitterOAuth(
		$consumerKey,
        $consumerSecret,
        $accessToken,
        $accessTokenSecret
    );
    
	$twitterData = $twitterConnexion->get(
	    'search/tweets',
		array(
			'q' => $recherche
		)
	);
	
	
	$resultats_recherche = '<h1>Tweets à propos de '.$recherche.'</h1>';

			 if(!empty($twitterData)) {
        foreach($twitterData->statuses as $tweet):
			$tweetResultat = $tweet->text;
            $tweetResultat = preg_replace('/http:\/\/([a-z0-9_\.\-\+\&\!\#\~\/\,]+)/i', '<a href="http://$1" target="_blank">http://$1</a>', $tweetResultat);
            $tweetResultat = preg_replace('/@([a-z0-9_]+)/i', '<a class="tweet-author" href="http://twitter.com/$1" target="_blank">@$1</a>', $tweetResultat);
	
			$resultats_recherche .= '<li><a href="'. $tweet->user->url .'" title="'. $tweet->user->name .'"><img alt="" src="'. $tweet->user->profile_image_url .'"></a><div><h3 class="title" title="'. $tweet->text .'">'. $tweetResultat .'</h3></li>';
    
        endforeach; 
    }else{
        echo '<li>Aucun tweet ne correspond à votre recherche</li>'; 
    }
    
	$resultats_recherche .= '</ul>';
}else{
      echo "Problème d'authentification, veuillez réessayer";
}

	echo $resultats_recherche;
?>
