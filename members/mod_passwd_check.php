<!-- 管理员更改会员密码验证 -->
<?php
include_once 'sql_connect.php';
include_once 'my_msg.php';
?>

<?php
//检查数据
$id = $_POST['id'];
$passwd = $_POST['passwd'];
$repasswd = $_POST['repasswd'];

if($passwd=='' || $repasswd==''){
	my_msg('字段不可空白。','mod_passwd.php');
}
if($passwd != $repasswd){
	my_msg('密码并不相符，需重复输入相同密码以确认。','mod_passwd.php');
}

$str = "update member set passwd='".$passwd."' where id='".$_POST['mod_id']."'";
$result = mysqli_query($link,$str);

my_msg('密码更改成功，回到主菜单。','adm.php');
mysqli_free_result($result);
mysqli_close($link);
?>