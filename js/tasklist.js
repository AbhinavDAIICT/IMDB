function setColor(){
var colors = ["blue","green","yellow","red"];

var col1 = document.getElementById("drag1");
var tasks = col1.getElementsByClassName("dragIt thumbnail");
for(var i =0;i<tasks.length;i++){
var task = tasks[i];

var colorIndex = (Math.random)%3;
task.style.backgroundColor = colors[colorIndex];
}
}


function add(){
var colors = ["blue","green","yellow","red"];
var colorIndex = Math.floor((Math.random() * 3) + 1);
var inp = document.getElementById("taskInput").value;
var d = new Date();
var id = d.getTime();
var newNode = document.createElement("div");
newNode.id = id;
//newNode.innerHTML = inp;
newNode.draggable="true";
newNode.className = "dragIt";
newNode.className += " thumbnail";
newNode.innerHTML = inp;
newNode.style.backgroundColor = colors[colorIndex];

/*
var but = document.createElement("input");
	// but.style.lineHeight="12px";
   //  but.style.width="18px";
   //  but.style.fontSize="8pt";
   //  but.style.fontFamily="tahoma";
     but.style.marginTop="1px";
     but.style.marginRight="2px";
    // but.style.position="absolute";
    // but.style.top="0";
    // but.style.right="0";
	but.id=id;
	but.type = "button";
	but.value= "x";
	but.className = "myButton";
    newNode.appendChild(but);
*/

newNode.addEventListener("dragstart",function(ev) {drag(ev)});


var col1 = document.getElementById("drag1");
var col2 = document.getElementById("drag2");
var child1 = col1.getElementsByTagName("div");
var child2 = col2.getElementsByTagName("div");
var count = child1.length+child2.length;
update(id,inp,2*count);

if(child1.length>child2.length){
col2.appendChild(newNode);
}else{
col1.appendChild(newNode);
}
}


function parseOnReload(id, data){
var colors = ["blue","green","yellow","red"];
var colorIndex = Math.floor((Math.random() * 3) + 1);
var inp = data;
var newNode = document.createElement("div");
newNode.id = id;
newNode.draggable="true";
newNode.className = "dragIt";
newNode.className += " thumbnail";
newNode.innerHTML = inp;
newNode.style.backgroundColor = colors[colorIndex];
newNode.addEventListener("dragstart",function(ev) {drag(ev)});

var col1 = document.getElementById("drag1");
var col2 = document.getElementById("drag2");
var child1 = col1.getElementsByTagName("div");
var child2 = col2.getElementsByTagName("div");
if(child1.length>child2.length){
col2.appendChild(newNode);
}else{
col1.appendChild(newNode);
}
}


function update(id,data,count){
var storedData = new Array();
if(JSON.parse(localStorage.getItem("taskId"))!=null){
storedData = JSON.parse(localStorage.getItem("taskId"));
}
storedData[count] = id;
storedData[count+1] = data;

localStorage["taskId"] = JSON.stringify(storedData);
alert(localStorage["taskId"]);
}

function callOnReload() {
var storedData = new Array();
storedData = JSON.parse(localStorage.getItem("taskId"));
for(i=0;i<storedData.length;i++){
parseOnReload(storedData[i],storedData[i+1]);
i++;
}
}

window.onunload = function (e) {
// Firefox || IE
e = e || window.event;
var y = e.pageY || e.clientY;
 
if (y < 0) {
alert("close");
}
else {
alert("refresh");
}
}
function allowDrop(ev) {
    ev.preventDefault();
}

function drag(ev) {
//alert("id"+ ev.target.id)
    ev.dataTransfer.setData("text", ev.target.id);
}



function drop(ev) {
    ev.preventDefault();
    var dropArea = document.getElementById("dropHere");
    var data = ev.dataTransfer.getData("text");
    alert("data "+ data);
    var draggedNode = document.getElementById(data);
    draggedNode.style.marginTop = "5px";
    draggedNode.style.backgroundColor = "yellow";
    draggedNode.style.minHeight = "60px";
    draggedNode.className = "final";
    draggedNode.className += " thumbnail";
    draggedNode.draggable = "false";
    dropHere.appendChild(draggedNode);
   // ev.target.appendChild(draggedNode);
}


