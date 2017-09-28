<?php  
    $sid=$_REQUEST['sid'];  
    $stuName=$_REQUEST['stuName'];  
    $chinese=$_REQUEST['chinese'];  
    $math=$_REQUEST['math'];  
    $conn=mysqli_connect('127.0.0.1','root','','tarena',3306); 
    $sql="SET NAMES UTF8";  
    mysqli_query($conn,$sql);
    $sql="INSERT INTO score VALUES($sid,'$stuName','$chinese','$math');";
    $result=mysqli_query($conn,$sql);  
    if($result===true){  
        echo  "<script type='text/javascript'>alert('学生成绩保存成功');</script>";  
    }else{  
        echo "<script type='text/javascript'>alert('学生成绩保存失败');</script>".$sql;  
    }
    mysqli_close($conn);
?>  
