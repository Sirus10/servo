<!DOCTYPE html>
<html>
<head>
<title>Simple Domotique Webcam control</title>
<!-- *****************************************
# This script will control 2 servo horizontal and vertical 
# Site    : http://domotique.web2diz.net/
# Detail  : http://domotique.web2diz.net/?p=468
#
# Source  : https://github.com/Sirus10/servo
# License : CC BY-SA 4.0
#
# This script use the ServoBlaster interface 
# See source here : 
# https://github.com/richardghirst/PiBits/tree/master/ServoBlaster
#
#
/*******************************************-->
<script src="https://code.jquery.com/jquery-1.9.1.min.js" type="text/javascript"></script>
<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
<style type="text/css">
 input[type=range][orient=vertical]
{
    writing-mode: bt-lr; /* IE */
    -webkit-appearance: slider-vertical; /* WebKit */
    width: 8px;
    height: 175px;
    padding: 0 5px;
}
</style>

<script type="text/javascript">
// update here the value for initial value
var v_init=50;
var h_init=50;
var auto_v;
var auto_h;



// Reset the servos to initial value
function reset_position(){
clearInterval(auto_v);
clearInterval(auto_h);
	$("#ver").val(h_init);
	$("#hor").val(v_init);
	update_position();
}

// This is to enable automatic move for horizontal 
function auto_change_h(more_or_less) { 
clearInterval(auto_h);
	auto_h = setInterval(function () {
		 var value = document.getElementById('hor').value;
		 
		 if(more_or_less=='more')  value++;
		 else      value--;
		$("#hor").val(value);
		update_position();
		if (value <= 0 || value >= 100) clearInterval(auto_h);
	}, 500);
}
// This is to enable automatic move for vertical
function auto_change_v(more_or_less) { 
clearInterval(auto_v);
	auto_v = setInterval(function () {
		 var value = document.getElementById('ver').value;
		 if(more_or_less=='more')  value++;
		 else      value--;
		$("#ver").val(value);
		update_position();
		if (value <= 15 || value >= 85) clearInterval(auto_v);
	}, 500);
}

// Call the action.oho script when the move will be ordered
function update_position(){
	h=document.getElementById('hor').value;
	v=document.getElementById('ver').value;
	jQuery.get('./action.php?h='+h+'&v='+v);
}
</script>
</head>

<body>

<!-- Horizontal : -->
 <button onclick="auto_change_h('less');"> - </button>
 <input type="range" id="hor" min="0" max="100" oninput="update_position();" />
 <button onclick="auto_change_h('more');"> + </button>
<!-- Vertical :   -->
 <button onclick="auto_change_v('less');"> - </button>
 <input type="range" id="ver" min="15" max="85" oninput="update_position();"  orient="vertical"  />
 <button onclick="auto_change_v('more');"> + </button>

 
 <br>
 <br>

<button onclick="clearInterval(auto_v);clearInterval(auto_h); "> Stop </button>

<button onclick="reset_position();"> Reset </button>





<small>Read more at <a href="http://domotique.web2diz.net/?p=468">Domotic and stupid geek stuff</a><small>
</body>
</html>
