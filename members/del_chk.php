<!-- 管理员删除会员密码验证 -->
<?php
include_once 'sql_connect.php';
include_once 'my_msg.php';
?>

<?php
//检查数据
$del_id = $_POST['del_id'];

if($del_id==''){
	my_msg('字段不可空白。','del.php');
}

$str = "update member set status=0 where id='".$del_id."'";

$result = mysqli_query($link,$str);
my_msg('删除用户成功，回到主菜单。','adm.php');
mysqli_free_result($result);
mysqli_close($link);
?>