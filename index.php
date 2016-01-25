<!DOCTYPE html>
<html>
<title>Simple Domotique Webcam control</title>

<head>
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
</head>
<body>

 


<form action="" method="post">

Horizontal :   <input type="range" name="hor" min="60" max="180"  value="<?=$_POST['hor']?>"  onchange="this.form.submit()">
Vertical :   <input type="range" name="ver" min="60" max="180"  value="<?=$_POST['ver']?>"  onchange="this.form.submit()"  orient="vertical">
  <input type="submit">
</form>

<form action="" method="post">
  <input type="hidden" name="hor" value="120">
  <input type="hidden" name="ver" value="120">
  <input type="submit" value="Reset">
</form>


Read more at <a href="http://domotique.web2diz.net/?p=468">Domotic and stupid geek stuff</a>

</body>
</html>


<?php
// this will sent a command to Vertical servo 
if ($_POST['ver']!=""){
system("sudo echo P1-13=".$_POST['ver']." > /dev/servoblaster" );
#echo "<p>".$_POST['ver']." to  P1-13</p>"; 
}
if ($_POST['hor']!=""){
// this will sent a command to Horizontal servo 
system("sudo echo P1-11=".$_POST['hor']." > /dev/servoblaster" );
#echo "<p>".$_POST['hor']." to  P1-11</p>"; 
}
?>
