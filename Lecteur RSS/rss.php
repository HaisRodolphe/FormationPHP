<?php

$flux = "http://www.lemonde.fr/rss/une.xml";
$rss = simplexml_load_file($flux);
$html = "";
$article = 0;

foreach($rss->channel->item as $item) {
    $article++;
    if($article > 10){
        break;
    }
    $html .= '<a href="'.htmlspecialchars($item->link).'">'.htmlspecialchars($item->title).'</a> - '.$item->pubDate.'<br/>'.htmlspecialchars($item->description).'<br/><br/>';
}

echo $html;

?>