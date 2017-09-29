<!-- 管理员更改会员密码 -->
<?php
include_once 'sql_connect.php';
include_once 'my_msg.php';
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
	<title>管理员更改会员密码</title>
</head>

<body>
	<?php
	if(isset($_COOKIE['cookie_chk'])){
		if($_COOKIE['cookie_chk']!='adm_logined'){
			my_msg('登录失败，请重新登录。','login.html');
		}
	}else{
		my_msg('登录失败，请重新登录。','login.html');
	}
	$str ="select id from member where rank=1 and status=1";
	$result = mysqli_query($link,$str);
	?>

    <h1 align="center">选择要更改密码的会员</h1>
	<p align="center">
		<form name="form_1" action="mod_passwd_check.php" method="post">
			<select name="mod_id" size="1">
				<?php
				while($row = mysqli_fetch_array($result)){
					echo "<option>" . $row['id'];
				}
				?>
			</select>
			<p>请输入这个会员的新密码：<input type="password" name="passwd"></p>
			<p>请重复输入以确认：<input type="password" name="repasswd"></p>
			<input type="submit" name="提交">
			<input type="reset" name="重设">
		</form>
	</p>
	<h3 align="center"><a href="adm.php">回到主菜单</a></h3>
	<h3 align="center"><a href="login.html">重新登录</a></h3>
</body>
</html>