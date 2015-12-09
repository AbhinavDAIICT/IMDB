<?php
$name = $_GET["actorName"];
echo $name;
$url = "http://www.imdb.com/xml/find?json=1&nr=1&nm=on&q=".$name;
echo $url;
//$str = file_get_contents($url);
$content = file_get_contents($url);
$json = json_decode($content, true);
$names = $json['name_popular'];
$id = $names[0]['id'];
echo $id.'</br>';

$url = "http://www.imdb.com/filmosearch?sort=user_rating&amp;explore=title_type&amp;role=".$id."&amp;ref_=nm_flmg_shw_3";

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
curl_setopt($ch, CURLOPT_AUTOREFERER, TRUE);
$result = curl_exec($ch);

echo $result;

/*$home = file_get_contents($url);
echo "<div id=\"resultDiv\">".$home."</div>";
*/
$i = 0;
?>
