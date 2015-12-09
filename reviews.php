<!DOCTYPE html>
<html>

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<title>Untitled 1</title>
</head>

<body>
<div id="temp-review">

</div>


<script type="text/javascript">
var movieId = "tt0108778";
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("temp-review").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET","reviewFunc.php?movieId="+movieId,false);
        xmlhttp.send();
        
        
function populateReviews(){
	var div = document.getElementById("tn15content");
	var reviews = div.getElementsByTagName("p");
	var divs = div.getElementsByTagName("div");
	var usefulDivs = [];
	for(var i=0; i<3; i++){
		var total = divs[i*2].getElementsByTagName("small")[0].innerHTML;
		var totalDisplay = total.split(":")[0];
		var title = divs[i*2].getElementsByTagName("h2")[0].innerHTML;
		var user = divs[i*2].getElementsByTagName("a")[1].innerHTML;
		var loc = divs[i*2].getElementsByTagName("small")[1].innerHTML;
		var date = divs[i*2].getElementsByTagName("small")[2].innerHTML;
		var review = reviews[i].innerHTML;
		var display = title+"("+user+" "+loc+")\n"+review;
		alert(display);
	}
}
</script>
</body>

</html>
