<?php

require "twitteroauth/autoload.php";

use Abraham\TwitterOAuth\TwitterOAuth;

?>


<?php
// Configuration
$twitterID = $_POST['compte_twitter'];
$nbrTweet = 10;
$consumerKey = "XXXXXXXXXXXXX";
$consumerSecret = "XXXXXXXXXXXXX";
$accessToken = "XXXXXXXXXXXXXXXXXXX";
$accessTokenSecret = "XXXXXXXXXXXXXX"; 

if($twitterID && $consumerKey && $consumerSecret && $accessToken && $accessTokenSecret) {
    // Authentication avec Twitter
    $twitterConnexion = new TwitterOAuth(
		$consumerKey,
        $consumerSecret,
        $accessToken,
        $accessTokenSecret
    );
    
	// On récupère la timeline de l'utilisateur
    $twitterData = $twitterConnexion->get(
        'statuses/user_timeline',
        array(
            'screen_name'     => $twitterID,
            'count'           => $nbrTweet,
            'exclude_replies' => false
        )
    );
	  
$contenu_timeline = '<div class="tweet-box">
          <h1>Tweets</h1>
          <div class="tweets-widget">            
             <ul class="tweet-list">';
	
    if(!empty($twitterData)) {
        foreach($twitterData as $tweet):
			$latestTweet = $tweet->text;
            $latestTweet = preg_replace('/http:\/\/([a-z0-9_\.\-\+\&\!\#\~\/\,]+)/i', '<a href="http://$1" target="_blank">http://$1</a>', $latestTweet);
            $latestTweet = preg_replace('/@([a-z0-9_]+)/i', '<a class="tweet-author" href="http://twitter.com/$1" target="_blank">@$1</a>', $latestTweet);
            $tweetTime = date("D M d H:i:s",strtotime($tweet->created_at));
	
		$contenu_timeline .= '<li class="tweet-wrapper">
        <div class="tweet-thumb">
			<span class="had-thumb"><a href="'. $tweet->user->url .'" title="'. $tweet->user->name .'"><img alt="" src="'. $tweet->user->profile_image_url .'"></a></span>
        </div>
        <div class="tweet-content">
            <h3 class="title" title="'. $tweet->text .'">'. $latestTweet .'</h3>
            <span class="meta">'. $tweetTime .' - <span><span class="dsq-postid">'. $tweet->favorite_count .'Favori</span></span>
        </div>
		</li>';
    
        endforeach; 
    }else{
        echo '<li class="tweet-wrapper">Aucun tweet pour ce compte.</li>'; 
    }
    
	$contenu_timeline .= '</ul>
        </div>
  	</div>';
}else{
      echo "Problème d'authentification, veuillez réessayer";
}
	echo $contenu_timeline;

?>
