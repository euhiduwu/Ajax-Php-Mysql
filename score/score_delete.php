<?php  
    $sid=$_REQUEST['sid'];  
    $conn=mysqli_connect('127.0.0.1','root','','tarena',3306);  
    $sql="SET NAMES UTF8";  
    mysqli_query($conn,$sql);  
    $sql="DELETE FROM score WHERE sid=$sid;";  
    $result=mysqli_query($conn,$sql);  
    if($result===true){  
        echo "<script type='text/javascript'>alert('学生成绩删除成功');</script>";  
    }else{  
        echo "<script type='text/javascript'>alert('学生成绩删除失败');</script>".$sql;  
    }
    mysqli_close($conn);  
?> 