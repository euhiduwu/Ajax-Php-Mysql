<!-- 会员功能 -->
<?php
include_once 'sql_connect.php';
include_once 'my_msg.php';
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
	<title>会员主功能表</title>
</head>
<body>
	<?php
	if(isset($_COOKIE['cookie_chk'])){
		if($_COOKIE['cookie_chk']!='logined'){
			my_msg('登录失败，请重新登录。','login.html');
		}
	}else{
		my_msg('登录失败，请重新登录。','login.html');
	}
	?>
	<h1 align="center">欢迎<?echo $_COOKIE['cookie_id'];?>进入会员区<br>
	    <p>会员主功能表</p> 
	</h1>
	<h3 align="center"><a href="mod.html">更改密码</a></h3>
	<h3 align="center"><a href="login.html">重新登录</a></h3>
</body>
</html>