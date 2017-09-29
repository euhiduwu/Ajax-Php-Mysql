<?php
include_once 'sql_connect.php';
include_once 'my_msg.php';
?>
<!-- 登录信息检查 -->
<?php
//检查数据
$id = $_POST['id'];
$passwd = $_POST['passwd'];

if($id=='' || $passwd==''){
	my_msg('字段不可空白。','login.html');
}
$str = "select * from member where id='".$id."' and passwd='".$passwd."' and status=1";
$result = mysqli_query($link,$str);

$row = mysqli_fetch_array($result);
if(mysqli_num_rows($result)==1 && $row['rank']==100){
	setcookie('cookie_chk','adm_logined');
	setcookie('cookie_id',$id);
	my_header('adm.php');// 管理员登录

}else if(mysqli_num_rows($result)==1 && $row['rank']==1){
	setcookie('cookie_chk','logined');
	setcookie('cookie_id',$id);
	my_header('main.php');// 会员登录
}else{
	my_msg('登录失败，请重新登录。','login.html');
}

mysqli_free_result($result);
mysqli_close($link);
?>