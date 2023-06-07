 <!DOCTYPE html>
    <?php
    $link = mysqli_connect("sql213.epizy.com", "epiz_32523692", "PE0hLaTq8N", "epiz_32523692_chess");if (mysqli_connect_errno()) {echo "Error: " . mysqli_connect_error();  exit();}
    $roster = mysqli_query($link,"SELECT * FROM roster");
    mysqli_close($link);
    ?>
<html>
<head>
<title>Chess Environment</title>
<style>
body{
    background-color: #3f3f3f;
}
#h-bar{
    width: 17%;    height: 100%;
    top: 0;    left: 0;
    position: fixed;
    z-index: 1;
    background-color: #7f7f7f;
}
#menu{
    width: 16vw;    height: 97%;
    left: 50%;    top: 50%;
    position: absolute;
    transform: translate(-50%, -50%);
    border: 0.1vw solid black;
}
#options{
    width: 15vw;    height: 20.2vw;
    margin: .5vw;
    border: 0.1vw solid black;
    position:relative;
}
#boardsel{
    padding: 0;
    margin-top: .125vw;
    border-spacing: .1vw .125vw;
}
#nav-1{
    background-color: #5f5f5f;  color:#dfdfdf;
}
#nav-2{
    background-color: #5f5f5f;  color:#dfdfdf;
}
#nav-3{
    background-color: #5f5f5f;  color:#dfdfdf;
}
#nav-4{
    background-color: #5f5f5f;  color:#dfdfdf;
}
#nav-5{
    background-color: #5f5f5f;  color:#dfdfdf;
}
#nav-6{
    background-color: #9f9f9f;  color:#dfdfdf;
}
#boardsel td{
    width: 4.6vw;    height: 1.5vw;
    margin-left: .5vw;
    border: 0.1vw solid black;
    text-align: center;
    font-size: 1vw;
}
#tutinfo{
    width: 13.4vw;    height: 9.5vw;
    border: 0.1vw solid black;
    margin: 0.25vw;
    padding: .5vw;
    font-size: .6vw;
    line-height: .5vw;
    color: #ffffff
}
.tspan1{
    font-size: .8vw;
    line-height: .75vw;
}
#redit{
    position: absolute;
    bottom: 0;
}
#redit td{
    border: 0.1vw solid black;
    margin: 0.25vw;
    padding: .5vw;
    text-align: center;
    font-size: 1vw;
}
#rnew{
    width: 3vw;    height: 3vw;
    background-color: #9f9f9f;
}
#rmod{
    width: 3vw;    height: 3vw;
}
#indicator{
    width: 15vw;    height: 16vw;
    margin-left: .5vw;
    border: 0.1vw solid black;
    position:relative;
}
#indsel{
    padding: 0;
    margin-top: .125vw;
    border-spacing: .1vw .125vw;
}
#indsel td{
    width: 4.6vw;    height: 1.5vw;
    margin-left: .5vw;
    border: 0.1vw solid black;
    color:#dfdfdf;
    text-align: center;
    font-size: 1vw;
}
#indsec{
    padding: 0;
    border-spacing: .1vw .125vw;
    margin-left: 2vw;
    text-align: center;
    font-size: 4vw;
    color:#7f7f7f;
    text-shadow: -1px 0 black, 0 1px black, 1px 0 black, 0 -1px black;
}
#indsec td{
    width: 5vw;    height: 5vw;
    margin-left: .5vw;
    border: 0.1vw solid black;
}
#indcyc{
    width: 13.4vw;    height: 1.25vw;
    border: 0.1vw solid black;
    margin: 0.25vw;
    padding: .5vw;
    background-color: #9f9f9f;
    text-align: center;
    font-size: 1vw;
    position: absolute;
    bottom: 0;
}
#palette{
    width: 15vw;    height: 9.7vw;
    margin: .5vw;
    border: 0.1vw solid black;
    padding: 0;
}
#c-table{
    border-spacing: .1vw .125vw;
}
#c-table td{
    width: 2.15vw;    height: 2.15vw;
    min-height: 2.25vw;
    max-height: 2.25vw;
    border: 0.1vw solid black;
    padding: 0;
}
.slider{
  -webkit-appearance: none;
  appearance: none;
  outline: none;
    width: 12.5vw;    height: .4vw;
    background: #d3d3d3;
    margin: 0;
    font-size: 1vw;
}
.slider::-moz-range-thumb,.slider::-webkit-range-thumb{
    width: 1vw;   height: 1vw;
    background: #000000;
    cursor: pointer;
    margin: 0;
}
#r-slide::-moz-range-thumb,#r-slide::-webkit-range-thumb{
  border: .15vw solid #ff0000;
}
#g-slide::-moz-range-thumb,#g-slide::-webkit-range-thumb{
  border: .15vw solid #00ff00;
}
#b-slide::-moz-range-thumb,#b-slide::-webkit-range-thumb{
  border: .15vw solid #0000ff;
}
#t-result{
    width: 15vw;
    border: 0.1vw solid black;
}
#updatemessage{
    display: none;
    position: fixed;
    top: 0;
    left: 50%;
    transform: translate(-50%, 0%);
    color: #ffffff;
    border: 0.1vw solid white;
    width: auto;    height: 1.25vw;
    font-size: 1vw;
    text-align: center;
}
#grid{
    left: 50%;    top: 50%;
    border-collapse: collapse;
    position: fixed;
    transform: translate(-50%, -50%);
    z-index: 0;
    text-align: center;
}
#grid td{
    width: 3.5vw;    height: 3.5vw;
    min-width: 3.5vw;    min-height: 3.5vw;
    max-width: 3.5vw;    max-height: 3.5vw;
    border: 0.1vw solid black;
}
#r0,#r1,#r10,#r11,.c0,.c1,.c2,.c3,.c12,.c13,.c14,.c15{
    background-color: #7f7f7f;
}
#r2 .c4,#r2 .c6,#r2 .c8,#r2 .c10,#r3 .c5,#r3 .c7,#r3 .c9,#r3 .c11,#r4 .c4,#r4 .c6,#r4 .c8,#r4 .c10,#r5 .c5,#r5 .c7,#r5 .c9,#r5 .c11,#r6 .c4,#r6 .c6,#r6 .c8,#r6 .c10,#r7 .c5,#r7 .c7,#r7 .c9,#r7 .c11,#r8 .c4,#r8 .c6,#r8 .c8,#r8 .c10,#r9 .c5,#r9 .c7,#r9 .c9,#r9 .c11{
    background-color: #9f9f9f;
}
#r2 .c5,#r2 .c7,#r2 .c9,#r2 .c11,#r3 .c4,#r3 .c6,#r3 .c8,#r3 .c10,#r4 .c5,#r4 .c7,#r4 .c9,#r4 .c11,#r5 .c4,#r5 .c6,#r5 .c8,#r5 .c10,#r6 .c5,#r6 .c7,#r6 .c9,#r6 .c11,#r7 .c4,#r7 .c6,#r7 .c8,#r7 .c10,#r8 .c5,#r8 .c7,#r8 .c9,#r8 .c11,#r9 .c4,#r9 .c6,#r9 .c8,#r9 .c10{
    background-color: #5f5f5f;
}
.piece{
    width: 3.4vw;    height: 3.4vw;
    min-width: 3.4vw;    min-height: 3.4vw;
    max-width: 3.4vw;    max-height: 3.4vw;
    border-collapse: collapse;
    border: 0.1vw solid black;
    font-size: 2.5vw;
    text-align: center;
    line-height: 1.4;
}
.piece:hover, #purge:hover, #boardsel td:hover, #indsel td:hover, #indcyc:hover, #test-t td:hover, #rnew:hover, #formsub:hover, #formdel:hover, #formcan:hover{
    cursor: pointer;
    user-select: none;
}
#test-t{
    position: fixed;
    bottom: 0;
    left: 50%;
    transform: translate(-50%, 0%);
}
#test-t td{
    width: 6.6vw;    height: 1vw;
    border: 0.1vw solid black;
    margin: 0.25vw;
    padding: .5vw;
    background-color: #9f9f9f;
    text-align: center;
    font-size: 1vw;
}
#purge{
    width: 14vw;    height: .8vw;
    border: 0.1vw solid black;
    margin: 0.5vw;
    padding: 1vw;
    font-size: .8vw;
    background-color: #9f9f9f;
}
#rlabel{
    width: 15vw;    height: 1vw;
    border: 0.1vw solid black;
    margin: 0.5vw;
    padding: .5vw;
    text-align: center;
    font-size: 1vw;
    color: #dfdfdf;
    background-color: #6f6f6f;
}
#roster{
    width: 16vw;    height: 86%;
    left: 50%;    top: 50%;
    position: absolute;
    transform: translate(-50%, -44%);
    border: 0.1vw solid black;
    display: block;
    overflow-y: scroll;
    border-spacing: .1vw .1vw;
    padding-top: 0;
}
#roster td{
    height: 3.5vw;
    max-height: 3.5vw;    min-height: 3.5vw;
    border: 0.1vw solid black;
}
#l-bar{
    width: 17%;    height: 100%;
    bottom: 0;    right: 0;
    position: fixed;
    background-color: #7f7f7f;
    z-index: 1;
    overflow-x:auto;
}
#myForm {
  display: none;
    left: 50%;    top: 50%;
    position: fixed;
    transform: translate(-50%, -50%);
  border: 1px solid black;
  z-index: 9;
  color: white;
}
#form-container {
  width: 150px;
  padding: 10px;
  background-color: #3f3f3f;
}
#formsub, #formcan, #formdel{
  background-color: #9f9f9f;
  color: white;
  padding-top:  10px;
  border: none;
  width: 150px;  height:25px;
  margin-top:10px;
  opacity: 0.8;
  text-align: center;
}
#formsub{
    color: #afffaf;
}
#formdel{
    color: #ffafaf;
}
textarea {
  resize: none;
}
</style>
<script src="https://code.jquery.com/jquery-latest.min.js"></script>
<script>
var board=6;
window.onload=function(){
    //loadroster();
    loadindicator();
    loadboard();
}
var count = 0;
function allowDrop(ev) {
    ev.preventDefault();
}
function drag(ev) {
    ev.dataTransfer.setData("childID", ev.target.id);
}
function drop(ev) {
    ev.preventDefault();
    if (ev.target.hasChildNodes()) { return; }
    const id = ev.dataTransfer.getData("childID");
    if (id.startsWith("active") || !id) {
        ev.target.appendChild(document.getElementById(id));
        return;
    }
    const nodeCopy = document.getElementById(id).cloneNode(true);
    nodeCopy.id = "active" + id + "-" + count++;
    nodeCopy.style.color = 'rgb('+rval+','+gval+','+bval+')';
    nodeCopy.addEventListener("dragstart", drag);
    ev.target.appendChild(nodeCopy);
}
function deleteDiv(ev) {
    ev.preventDefault();
    const id = ev.dataTransfer.getData("childID");
    if (!id.startsWith("active")) {
        return;
    }
    const el = document.getElementById(id);
    el.parentNode.removeChild(el);
}
function paint(ev) {
    ev.preventDefault();
    const id = ev.dataTransfer.getData("childID");
    if (id.startsWith("active") || !id) {return;}
    const nodeCopy = document.getElementById(id).cloneNode(true);
    ev.target.style.backgroundColor = 'rgb('+rval+','+gval+','+bval+')';
}
function purge(){
    var actpie = document.getElementById('grid').getElementsByTagName("div");
    for(var i=0; i<actpie.length; i) {
    actpie[i].remove();
}
}
var playernum;
var currentturn;
function play2(){
    document.getElementById("ind-2").style.backgroundColor="#9f9f9f";
    document.getElementById("ind-3").style.backgroundColor="";
    document.getElementById("ind-4").style.backgroundColor="";
    document.getElementById("player-3").style.display = "none";
    document.getElementById("player-4").style.display = "none";
    playernum=2;
}
function play3(){
    document.getElementById("ind-2").style.backgroundColor="";
    document.getElementById("ind-3").style.backgroundColor="#9f9f9f";
    document.getElementById("ind-4").style.backgroundColor="";
    document.getElementById("player-3").style.display = "";
    document.getElementById("player-4").style.display = "none";
    playernum=3;
}
function play4(){
    document.getElementById("ind-2").style.backgroundColor="";
    document.getElementById("ind-3").style.backgroundColor="";
    document.getElementById("ind-4").style.backgroundColor="#9f9f9f";
    document.getElementById("player-3").style.display = "";
    document.getElementById("player-4").style.display = "";
    playernum=4;
}
function turn1(){
    document.getElementById("player-1").innerHTML = "X";
    document.getElementById("player-2").innerHTML = "";
    document.getElementById("player-3").innerHTML = "";
    document.getElementById("player-4").innerHTML = "";
    currentturn=1;
}
function turn2(){
    document.getElementById("player-1").innerHTML = "";
    document.getElementById("player-2").innerHTML = "X";
    document.getElementById("player-3").innerHTML = "";
    document.getElementById("player-4").innerHTML = "";
    currentturn=2;
}
function turn3(){
    document.getElementById("player-1").innerHTML = ""; 
    document.getElementById("player-2").innerHTML = "";
    document.getElementById("player-3").innerHTML = "X";
    document.getElementById("player-4").innerHTML = "";
    currentturn=3;
}
function turn4(){
    document.getElementById("player-1").innerHTML = "";
    document.getElementById("player-2").innerHTML = "";
    document.getElementById("player-3").innerHTML = "";
    document.getElementById("player-4").innerHTML = "X";
    currentturn=4;
}
var currpieceid;
function submitForm() {
    $.post("editroster.php",
    {
        unicode: document.getElementById("formunicode").value,
        name: document.getElementById("formname").value,
        description: document.getElementById("formdescription").value,
        pieceid: currpieceid,
    },
    function(){
        document.getElementById("myForm").style.display = "none";
        location.reload();
    });
} 
function deleteForm() {
    $.post("deleroster.php",
    {
        pieceid: currpieceid,
    },
    function(){
        document.getElementById("myForm").style.display = "none";
        location.reload();
    });
} 
function cancelForm() {
  document.getElementById("myForm").style.display = "none";
} 
function editroster(ev){
    ev.preventDefault();
    const id = ev.dataTransfer.getData("childID");
    if (id.startsWith("active") || !id) {return;}
    currpieceid = id.split('piece_').pop();
    $.post("hostroster.php",
    {
        pieceid: currpieceid,
    },
    function(data){
        var obj = jQuery.parseJSON(data);
        document.getElementById("formunicode").value = obj.unicode;
        document.getElementById("formname").value = obj.name;
        document.getElementById("formdescription").value = obj.description;
        document.getElementById("myForm").style.display = "block";
    });
}
function formroster(){
    $.post("formroster.php",
    {},
    function(){
        alert("new piece made. reloading...");
        location.reload();
    });
}
function loadboard(){
    $.post("loadboard.php",
    {
        board: board,
    },
    function(data){
        purge();
        var obj = jQuery.parseJSON(data);
        $.each( obj, function( key, value ) {
            //alert(value.typeid);
            //alert("r"+value.ypos);
            var newdiv = document.createElement("div");
            newdiv.classList.add("piece");
            newdiv.id = "active_"+value.typeid+"-"+value.pieceid;
            newdiv.style.color = 'rgb('+value.rvalue+','+value.gvalue+','+value.bvalue+')';
            newdiv.innerHTML = document.getElementById('piece_'+value.typeid).innerHTML;
            newdiv.draggable = 'true';
            newdiv.addEventListener("dragstart", drag);
            document.getElementById('grid').rows[value.ypos].cells[value.xpos].appendChild(newdiv);
        });
    });
}
function saveboard(){
    var actpie = document.getElementById('grid').getElementsByTagName("div");
    var type = [];
    var xcor = [];
    var ycor = [];
    var rval = [];
    var gval = [];
    var bval = [];
    for(var i=0; i<actpie.length; i++) {
        type[i] = actpie[i].id.split('_').pop().split('-')[0];
        xcor[i] = actpie[i].parentNode.className.slice(1);
        ycor[i] = actpie[i].parentNode.parentNode.id.slice(1);
        rval[i] = actpie[i].style.color.match(/^rgb\s*\(\s*(\d+)\s*,\s*(\d+)\s*,\s*(\d+)\s*\)$/i)[1];
        gval[i] = actpie[i].style.color.match(/^rgb\s*\(\s*(\d+)\s*,\s*(\d+)\s*,\s*(\d+)\s*\)$/i)[2];
        bval[i] = actpie[i].style.color.match(/^rgb\s*\(\s*(\d+)\s*,\s*(\d+)\s*,\s*(\d+)\s*\)$/i)[3];
    }
    $.post("saveboard.php",
    {
        board: board,
        count: actpie.length,
        type: type,
        xcor: xcor,
        ycor: ycor,
        rval: rval,
        gval: gval,
        bval: bval,
    },
    function(){alert("board saved");});
}
function loadindicator(){
    $.post("loadindicator.php",
    {
        board: board,
    },
    function(data){
        var obj = jQuery.parseJSON(data);
        document.getElementById('player-1').style.backgroundColor= 'rgb('+obj.color1r+','+obj.color1g+','+obj.color1b+')';
        document.getElementById('player-2').style.backgroundColor= 'rgb('+obj.color2r+','+obj.color2g+','+obj.color2b+')';
        document.getElementById('player-3').style.backgroundColor= 'rgb('+obj.color3r+','+obj.color3g+','+obj.color3b+')';
        document.getElementById('player-4').style.backgroundColor= 'rgb('+obj.color4r+','+obj.color4g+','+obj.color4b+')';
        playernum = obj.setting;
        currentturn = obj.state;
        if(playernum==1){play1();}else if(playernum==2){play2();}else if(playernum==3){play3();}else{play4();}
        if(currentturn==1){turn1();}else if(currentturn==2){turn2();}else if(currentturn==3){turn3();}else{turn4();}
    });
}
function saveindicator(){
    var c1rgb = document.getElementById("player-1").style.backgroundColor.match(/^rgb\s*\(\s*(\d+)\s*,\s*(\d+)\s*,\s*(\d+)\s*\)$/i);
    var c2rgb = document.getElementById("player-2").style.backgroundColor.match(/^rgb\s*\(\s*(\d+)\s*,\s*(\d+)\s*,\s*(\d+)\s*\)$/i);
    var c3rgb = document.getElementById("player-3").style.backgroundColor.match(/^rgb\s*\(\s*(\d+)\s*,\s*(\d+)\s*,\s*(\d+)\s*\)$/i);
    var c4rgb = document.getElementById("player-4").style.backgroundColor.match(/^rgb\s*\(\s*(\d+)\s*,\s*(\d+)\s*,\s*(\d+)\s*\)$/i);
    $.post("saveindicator.php",
    {
        board: board,
        playernum: playernum, currentturn: currentturn,
        c1r: c1rgb[1], c1g: c1rgb[2], c1b: c1rgb[3],
        c2r: c2rgb[1], c2g: c2rgb[2], c2b: c2rgb[3],
        c3r: c3rgb[1], c3g: c3rgb[2], c3b: c3rgb[3],
        c4r: c4rgb[1], c4g: c4rgb[2], c4b: c4rgb[3],
    },
    function(){alert("indicator saved");});
}
function turncycle(){
    if(playernum==2){if(currentturn==1){turn2();}else{turn1();}
    }else if(playernum==3){if(currentturn==1){turn2();}else if(currentturn==2){turn3();}else{turn1();}
    }else{if(currentturn==1){turn2();}else if(currentturn==2){turn3();}else if(currentturn==3){turn4();}else{turn1();}
    }
}
</script>
</head>
<div id="myForm">
  <div id="form-container">
    <div><b>Decimal Unicode</b></div>
    <textarea id="formunicode" rows="1"></textarea >
    <div><b>Name</b></div>
    <textarea id="formname" rows="1"></textarea >
    <div><b>Description</b></div>
    <textarea id="formdescription" rows="4"></textarea >
    <div id="formsub" onclick="submitForm()">Submit</div>
    <div id="formdel" onclick="deleteForm()">Delete</div>
    <div id="formcan" onclick="cancelForm()">Cancel</div>
  </div>
</div>
<body>
<div id="h-bar">
<div id="menu">
<div id="options">
<table id="boardsel">
<tr><td id="nav-1" onclick="location.href='chess1.php'">Board 1</td><td id="nav-2" onclick="location.href='chess2.php'">Board 2</td><td id="nav-3" onclick="location.href='chess3.php'">Board 3</td></tr>
<tr><td id="nav-4" onclick="location.href='chess4.php'">Board 4</td><td id="nav-5" onclick="location.href='chess5.php'">Board 5</td><td id="nav-6" onclick="location.href='chess6.php'">Board 6</td></tr>
</table>
<div id="tutinfo">  <span class="tspan1">drag an icon from the roster to the board to make a playable piece<br></span>&nbsp;<br>
                    <span class="tspan1">drag a piece from the board to the roster to remove it<br></span>&nbsp;<br>
                    <span class="tspan1">use the sliders to change the icon colors<br></span>&nbsp;<br>
                    <span class="tspan1">drag a colored icon from the roster to the turn indicator to change its color<br></span>&nbsp;<br>
                    <span class="tspan1">drag a piece from the roster to the <br>'edit existing piece' region to edit a piece<br></span>
                    </div>
<table id="redit">
<tr><td id="rnew" onclick="formroster()">create new piece</td><td id="rmod" ondrop="editroster(event)" ondragover="allowDrop(event)">edit existing piece</td></tr>
</table>
</div>
<div id="indicator">
<table id="indsel">
<tr><td id="ind-2" onclick="play2()">2 players</td><td id="ind-3" onclick="play3()">3 players</td><td id="ind-4" onclick="play4()">4 players</td></tr>
</table>
<table id="indsec" ondrop="paint(event)" ondragover="allowDrop(event)">
<tr><td id="player-1"></td><td id="player-2"></td></tr>
<tr><td id="player-3"></td><td id="player-4"></td></tr>
</table>
<div id="indcyc" onclick="turncycle()">advance turn</div>
</div>
<div id="palette">
<table id="c-table"><!--0,64,128,191,255-->
  <tr><td><input autocomplete="off" type="range" min="0" max="255" step="63.75" value="0" class="slider" id="r-slide"></td><td id="r-result" style="background: #000000;"></td></tr>
  <tr><td><input autocomplete="off" type="range" min="0" max="255" step="63.75" value="0" class="slider" id="g-slide"></td><td id="g-result" style="background: #000000;"></td></tr>
  <tr><td><input autocomplete="off" type="range" min="0" max="255" step="63.75" value="0" class="slider" id="b-slide"></td><td id="b-result" style="background: #000000;"></td></tr>
  <tr><td colspan="2" id="t-result" style="background: #000000;"></td></tr>
</table>
</div>
</div>
</div>
<div id="updatemessage">- another player has saved a change, reload to see changes -</div>
<table id="test-t">
<tr><td id="test-si" onclick="saveindicator()">save indicator</td><!--<td id="test-li" onclick="loadindicator()">load indicator</td>--><td id="test-sb" onclick="saveboard()">save board</td><!--<td id="test-lb" onclick="loadboard()">load board</td>--></tr>
</table>
<table id="grid" class="dropArea" ondrop="drop(event)" ondragover="allowDrop(event)">
<tr id="r0"><td class="c0"><td class="c1"><td class="c2"><td class="c3"><td class="c4"><td class="c5"><td class="c6"><td class="c7"><td class="c8"><td class="c9"><td class="c10"><td class="c11"><td class="c12"><td class="c13"><td class="c14"><td class="c15"></tr>
<tr id="r1"><td class="c0"><td class="c1"><td class="c2"><td class="c3"><td class="c4"><td class="c5"><td class="c6"><td class="c7"><td class="c8"><td class="c9"><td class="c10"><td class="c11"><td class="c12"><td class="c13"><td class="c14"><td class="c15"></tr>
<tr id="r2"><td class="c0"><td class="c1"><td class="c2"><td class="c3"><td class="c4"><td class="c5"><td class="c6"><td class="c7"><td class="c8"><td class="c9"><td class="c10"><td class="c11"><td class="c12"><td class="c13"><td class="c14"><td class="c15"></tr>
<tr id="r3"><td class="c0"><td class="c1"><td class="c2"><td class="c3"><td class="c4"><td class="c5"><td class="c6"><td class="c7"><td class="c8"><td class="c9"><td class="c10"><td class="c11"><td class="c12"><td class="c13"><td class="c14"><td class="c15"></tr>
<tr id="r4"><td class="c0"><td class="c1"><td class="c2"><td class="c3"><td class="c4"><td class="c5"><td class="c6"><td class="c7"><td class="c8"><td class="c9"><td class="c10"><td class="c11"><td class="c12"><td class="c13"><td class="c14"><td class="c15"></tr>
<tr id="r5"><td class="c0"><td class="c1"><td class="c2"><td class="c3"><td class="c4"><td class="c5"><td class="c6"><td class="c7"><td class="c8"><td class="c9"><td class="c10"><td class="c11"><td class="c12"><td class="c13"><td class="c14"><td class="c15"></tr>
<tr id="r6"><td class="c0"><td class="c1"><td class="c2"><td class="c3"><td class="c4"><td class="c5"><td class="c6"><td class="c7"><td class="c8"><td class="c9"><td class="c10"><td class="c11"><td class="c12"><td class="c13"><td class="c14"><td class="c15"></tr>
<tr id="r7"><td class="c0"><td class="c1"><td class="c2"><td class="c3"><td class="c4"><td class="c5"><td class="c6"><td class="c7"><td class="c8"><td class="c9"><td class="c10"><td class="c11"><td class="c12"><td class="c13"><td class="c14"><td class="c15"></tr>
<tr id="r8"><td class="c0"><td class="c1"><td class="c2"><td class="c3"><td class="c4"><td class="c5"><td class="c6"><td class="c7"><td class="c8"><td class="c9"><td class="c10"><td class="c11"><td class="c12"><td class="c13"><td class="c14"><td class="c15"></tr>
<tr id="r9"><td class="c0"><td class="c1"><td class="c2"><td class="c3"><td class="c4"><td class="c5"><td class="c6"><td class="c7"><td class="c8"><td class="c9"><td class="c10"><td class="c11"><td class="c12"><td class="c13"><td class="c14"><td class="c15"></tr>
<tr id="r10"><td class="c0"><td class="c1"><td class="c2"><td class="c3"><td class="c4"><td class="c5"><td class="c6"><td class="c7"><td class="c8"><td class="c9"><td class="c10"><td class="c11"><td class="c12"><td class="c13"><td class="c14"><td class="c15"></tr>
<tr id="r11"><td class="c0"><td class="c1"><td class="c2"><td class="c3"><td class="c4"><td class="c5"><td class="c6"><td class="c7"><td class="c8"><td class="c9"><td class="c10"><td class="c11"><td class="c12"><td class="c13"><td class="c14"><td class="c15"></tr>
</table>
<div id="l-bar" ondrop="deleteDiv(event)" ondragover="allowDrop(event)">
<div id="purge" onclick="purge()">Remove All Pieces From the Board</div>
<table id="roster">
<div id="rlabel">Roster</div>
<?php while($row = mysqli_fetch_assoc($roster)){ 
    echo "<tr>
    <td style='border: 0.1vw solid black;width: 3.5vw;'><div draggable='true' ondragstart='drag(event)' class='piece' id='piece_".$row["typeid"]."'>&#".$row["unicode"].";</div></td>
    <td style='font-size:0.9vw;color:#dfdfdf;width:5vw;padding-left:0.25vw;'>".$row["name"]."</td>
    <td style='font-size:0.7vw;color:#dfdfdf;width:10vw;'>".$row["description"]."</td>
    </tr>";
    }?>
</table>
</div>
<script>
var rval = 0;
var gval = 0;
var bval = 0;
document.getElementById("r-slide").oninput = function() {
    document.getElementById("r-result").style.background = 'rgb('+this.value+',0,0)';
    rval = this.value;
    document.getElementById("t-result").style.background = 'rgb('+rval+','+gval+','+bval+')';
    document.getElementById("roster").style.color = 'rgb('+rval+','+gval+','+bval+')';
    }
document.getElementById("g-slide").oninput = function() {
    document.getElementById("g-result").style.background = 'rgb(0,'+this.value+',0)';
    gval = this.value;
    document.getElementById("t-result").style.background = 'rgb('+rval+','+gval+','+bval+')';
    document.getElementById("roster").style.color = 'rgb('+rval+','+gval+','+bval+')';
    }
document.getElementById("b-slide").oninput = function() {
    document.getElementById("b-result").style.background = 'rgb(0,0,'+this.value+')';
    bval = this.value;
    document.getElementById("t-result").style.background = 'rgb('+rval+','+gval+','+bval+')';
    document.getElementById("roster").style.color = 'rgb('+rval+','+gval+','+bval+')';
    }
</script>
</body>
</html> 
