<?php 
header('Content-Type: text/xml');
echo "<?xml version='1.0' encoding='UTF-8' standalone='yes'?>";
echo "<response>";
$name = $_GET['name'];
$userNames = array('CRISTIAN','BOGDAN','FILIP','MIHAI','YODA');
if(in_array(strtoupper($name),$userNames))
	echo "Hello, master ".htmlentities($name).'!';
else if(trim($name)=='')
	echo "Stanger, Please tell me your name";
else
	echo htmlentities($name).", I don\'t know you";
echo "</response>";
?>