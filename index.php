
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Carousel Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
  <!--  <link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

-->    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
   <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>

   <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="html5shiv.min.js"></script>
      <script src="respond.min.js"></script>
    <![endif]-->

    <!-- Custom styles for this template -->
    <link href="css/cover.css" rel="stylesheet">
    <style type="text/css">
.auto-style1 {
	margin:5px;
	border-width: 0px;
	color:white;
}
.auto-style2 {
	border-style: solid;
	border-width: 3px;
		border-color:red;

	}
	.auto-style3 {
		border-style: solid;
		border-width: 1px;
	}
	</style>

  </head>
<!-- NAVBAR
================================================== -->
  <body>

    <div class="site-wrapper">

      <div class="site-wrapper-inner">

        <div class="cover-container">

        
          <div class="inner cover">
            <form class="form-horizontal" method="get" action="index.php">
			  <div class="form-group form-group-lg">
			    <div class="col-sm-12">
			      <input class="form-control" type="text"  name="actorFirst" placeholder="Enter the actor's first name">
			      <br>
			      <input class="form-control" type="text"  name="actorLast" placeholder="Enter the actor's last name">
			    </div>
			  </div>
			   <input type="submit" class="btn btn-default col-sm-10 col-sm-offset-1">
		  	</form>
            </div>

        </div>
        <br>
        
        <div id="results" class="row" style="margin:20px;visibility:visible;">
        <table style=" width:100%" class="auto-style1">
		<tr id="tr-1">
			<td id="tr-1-poster" class="auto-style2">Poster1</td>
			<td id="tr-1-details" class="auto-style2">details1</td>
			<td id="tr-1-reviews" class="auto-style2">Movie 1 Reviews
			<table style="width: 100%">
				<tr id="r-1-1">
					<td id="d-1-1" class="auto-style3">&nbsp;</td>
				</tr>
				<tr>
					<td id="d-1-2" class="auto-style3">&nbsp;</td>
				</tr>
				<tr>
					<td id="d-1-3" class="auto-style3">&nbsp;</td>
				</tr>
			</table>
			</td>
		</tr>
		<tr id="tr-2">
			<td id="tr-2-poster" class="auto-style2">Poster2</td>
			<td id="tr-2-details" class="auto-style2">details2</td>
			<td id="tr-2-reviews" class="auto-style2">Movie 2 Reviews
			<table style="width: 100%">
				<tr id="r-2-1">
					<td id="d-2-1" class="auto-style3">&nbsp;</td>
				</tr>
				<tr>
					<td id="d-2-2" class="auto-style3">&nbsp;</td>
				</tr>
				<tr>
					<td id="d-2-3" class="auto-style3">&nbsp;</td>
				</tr>
			</table>

			</td>
		</tr>
		<tr id="tr-3">
			<td id="tr-3-poster" class="auto-style2">&nbsp;</td>
			<td id="tr-3-details" class="auto-style2">&nbsp;</td>
			<td id="tr-3-reviews" class="auto-style2">Movie 2 Reviews
			<table style="width: 100%">
				<tr id="r-3-1">
					<td id="d-3-1" class="auto-style3">&nbsp;</td>
				</tr>
				<tr>
					<td id="d-3-2" class="auto-style3">&nbsp;</td>
				</tr>
				<tr>
					<td id="d-3-3" class="auto-style3">&nbsp;</td>
				</tr>
			</table>
</td>
		</tr>
	</table>
        </div>

      </div>

    </div>
    

    
<div id="dom-target" style=";">
<?php
if((isset($_GET["actorFirst"]) && !empty($_GET["actorFirst"])) || (isset($_GET["actorLast"]) && !empty($_GET["actorLast"]))){
$first = $_GET["actorFirst"];
$last = $_GET["actorLast"];
$name = $first."%20".$last;
echo $name.'</br>';
$url = "http://www.imdb.com/xml/find?json=1&nr=1&nm=on&q=".$name;
//echo $url.'</br>';
$str = file_get_contents($url);
$content = file_get_contents($url);
$json = json_decode($content, true);
$names = $json['name_popular'];
$id = $names[0]['id'];
//echo $id.'</br>';

$url = "http://www.imdb.com/filmosearch?sort=user_rating&amp;explore=title_type&amp;role=".$id."&ref_=filmo_ref_typ&sort=user_rating,desc&mode=detail&page=1&title_type=movie";
$home = file_get_contents($url);
echo "<div id=\"resultDiv\">".$home."</div>";


echo $content;
}else{
/*echo '<script type="text/javascript">var divTable = document.getElementById("results");divTable.style.visibility = "hidden";</script>';
*/}
$i = 0;
?>

</div>
<div id="temp-review-1">

</div>
<div id="temp-review-2">

</div>
<div id="temp-review-3">

</div>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="js/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
 <!--   <script src="../../assets/js/vendor/holder.min.js"></script>
-->    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <!--<script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
 --> 
 <script type="text/javascript">
    
	
	var div = document.getElementsByClassName("lister-item-image");        
        

	
/*	var divTable = document.getElementById("results");
	divTable.style.visibility = "visible";
*/	
	    
var count =0;
    for(var i=0;i<3;i++){
    var movieId = div[i].getAttribute("data-tconst");
            if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("temp-review-"+(i+1)).innerHTML = xmlhttp.responseText;
                populateReviews(i+1);
            }
        };
        xmlhttp.open("GET","reviewFunc.php?movieId="+movieId,false);
        xmlhttp.send();

        $.getJSON("http://www.omdbapi.com/?i="+movieId, function(result){
            var thumb = result.Poster;
            var title = result.Title;
            var year = result.Year;
            var rated = result.Rated;
            var genre = result.Genre;
            var runtime = result.Runtime;
            var imdbRating = result.imdbRating;
            var imdbVotes = result.imdbVotes;
            // alert(" Thumb "+thumb+"Title: "+title+" Year: "+year+" Rated: "+rated+" Genre: "+genre+" Runtime: "+runtime+" IMDB Rating: "+imdbRating+" IMDB Votes: "+imdbVotes);
                   //Do something about documentary
                count++;
                   var tdPoster = document.getElementById("tr-"+count+"-poster");
                   if(thumb!="N/A"){
				   var posterNode = document.createElement("img");
				   posterNode.src = thumb;
				   tdPoster.appendChild(posterNode);
				   }else{
				   tdPoster.innerHTML = "No Image";
				   }
				   
                   var tdDetails = document.getElementById("tr-"+count+"-details");
                   tdDetails.innerHTML = "Title: "+title+"| Year: "+year+"| Rated: "+rated+"| Genre: "+genre+"| Runtime: "+runtime+"| IMDB Rating: "+imdbRating+"| IMDB Votes: "+imdbVotes;

                   var tdReviews = document.getElementById("tr-"+count+"-reviews");
                  //lert(count);
            });
	}
	
	$('#resultDiv').remove();
	

/*$( document ).ready(function() {

$('#resultDiv').remove();
    console.log( "ready!" );
});
*/ 
function populateReviews(k){
	var div = document.getElementById("tn15content");
	var reviews = div.getElementsByTagName("p");
	var divs = div.getElementsByTagName("div");
	var count = 0;
	var usefulDivs = [];
	for(var i=0; i<3; i++){
		var total = divs[i*2].getElementsByTagName("small")[0].innerHTML;
		var totalDisplay = total.split(":")[0];
		var title = divs[i*2].getElementsByTagName("h2")[0].innerHTML;
		var user = divs[i*2].getElementsByTagName("a")[1].innerHTML;
		var loc = divs[i*2].getElementsByTagName("small")[1].innerHTML;
		var date = divs[i*2].getElementsByTagName("small")[2].innerHTML;
		var review = reviews[i].innerHTML;
		var display = "<b>"+title+"</b></br>("+user+" "+loc+")</br>"+review;
	//	alert("d-"+k+"-"+(i+1));
		var field = document.getElementById("d-"+k+"-"+(i+1));
		field.innerHTML = display;
		//alert(review);
	}
	$('#temp-review-'+k).remove();
}

 </script>

  </body>
</html>
