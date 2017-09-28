<?php
//设置用户出错处理方法为 error_handler
set_error_handler('error_handler', E_ALL);
//出错处理函数
function error_handler($errNo, $errStr, $errFile, $errLine){
	//清楚以生成的所有输出
	if(ob_get_length()) 
		ob_clean();
	//输出错误信息、
	$error_message = 'ERRNO: '.$errNo.chr(10).
	                'TEXT: '.$errStr.chr(10).
	                'LOCATION: '.$errFile.chr(10).
	                'Line: '.$errLine;
	echo $error_message;
}
