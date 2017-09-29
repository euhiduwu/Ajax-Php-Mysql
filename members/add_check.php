<!-- 会员信息添加检查 -->
<?php
include_once 'sql_connect.php';
include_once 'my_msg.php';
?>
<?php
//检查数据
$id = $_POST['id'];
$passwd = $_POST['passwd'];
$repasswd = $_POST['repasswd'];

if($id=='' || $passwd=='' || $repasswd==''){
	my_msg('字段不可空白。','add.html');
}
if($passwd != $repasswd){
	my_msg('密码并不相符，需重复输入相同密码以确认。','add.html');
}

$str = "insert into member values('','".$id."','".$passwd."',1,1)";
$result = mysqli_query($link,$str);
my_msg('添加用户成功，请以此用户账号/密码重新登陆。','login.html');
mysqli_free_result($result);
mysqli_close($link);
?>