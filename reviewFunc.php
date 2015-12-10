<?php
/*$id = "tt0108778";*/
$id = $_GET['movieId'];
echo $id;
$url = "http://www.imdb.com/title/".$id."/reviews?filter=best&spoiler=hide";
$home = file_get_contents($url);
echo "<div id=\"resultDiv1\">".$home."</div>";
?>
