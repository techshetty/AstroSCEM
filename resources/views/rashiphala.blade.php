<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Report Ready</title>
    <link rel="stylesheet" href="/css/rashi.css">
    <link rel="stylesheet" href="/css/index.css">
</head>
<body onload="hidePL()">
    <div id="preloader">
        <img src="\assets\fishload.png" id="preimg"\>
    </div>
<div id="rashiresult">
	<div id="userDet">
		<div id="userImg">
			<div id="userpic"></div>
		</div>
		<div id="userName">
			<span>Name: <?php 
            if(isset($_GET["nameString"])):
            echo $_GET["nameString"]; else:echo "John Doe";
            endif;
            ?></span>
			<span>DOB: <?php 
            if(isset($_GET["dateString"])){
            $dlist=explode("T",$_GET["dateString"]);
            echo $dlist[0];
            }
            else{echo "XX-XX-XX";}
            ?></span>
			<span>BirthTime: <?php 
            if(isset($_GET["dateString"])){
            echo $dlist[1];
            }
            else{echo "XX:XX:XX";}
            ?></span>	
			<span id="userZod">ZODIAC-SIGN: </span>
		</div>
	</div>
	<div id="rashiDet">
    <div class="zodpart"><span class="zodDets">Zodiac Sign: </span><span class="zodDets">Nakshatra: </span><span class="zodDets">Zodiac Sign lord: </span>
    <span class="zodDets" title="Nakshatra Vimsottari Lord">Vimsottari lord: </span></div>
            <div id="spinner">
                <img src="/assets/astrologo.png" id="spinlogo"/>
            </div>
		<div class="zodpart">
		<span class="zodDets">Nakshatra number:</span><span class="zodDets">House number: </span>
		<span class="zodDets">Nakshatra Pada: </span><span class="zodDets">Current Sign: </span></div>
    </div>
    <div id="download" onclick="dload()" title="Download Report"></div>
</div>
<div hidden>
<?php
            if(isset($_GET["dateString"])){
            $dlist=explode("T",$_GET["dateString"]);
            $finDate=explode("-",$dlist[0]);
            $finTime=explode(":",$dlist[1]);
            }
            ?>
	<span id="month">
    </span>
	<span id="year"><?php echo $finDate[0]?></span>
	<span id="date"><?php echo $finDate[2]?></span>
	<span id="mnth"><?php echo $finDate[1]?></span>
	<span id="hour"><?php echo $finTime[0]?></span>
	<span id="min"><?php echo $finTime[1]?></span>
	<span id="sec"><?php echo $finTime[2]?></span>
</div>
<script type="text/javascript" src="/scripts/rashiscript.js"></script>
</body>
</html>