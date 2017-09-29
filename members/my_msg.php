<?php
/*
网页重导向公共程序
 */
function my_header($redirect){
	echo "<script language=\"javascript\">";
	echo "location.href='".$redirect."'";
	echo "</script>";
	return;
}

function my_msg($msg,$redirect){
	echo "<SCRIPT Language=javascript>";
	echo "window.alert('".$msg."')";
	echo "</SCRIPT>";
	echo "<script language=\"javascript\">";
	echo "location.href='".$redirect."'";
	echo "</script>";
	return;
}
?>