<?php
/******************************************
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
/*******************************************/

// this will sent a command to Vertical servo 
if ($_GET['v']!=""){
	$v=100-$_GET['v']; // this is to reverse the vertical cmd
	system("sudo echo 3=".$v."% > /dev/servoblaster" );
}
if ($_GET['h']!=""){
// this will sent a command to Horizontal servo 
	system("sudo echo 1=".$_GET['h']."% > /dev/servoblaster" );
}
?>
