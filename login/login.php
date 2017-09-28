<?php  
    $con = mysqli_connect('localhost','root','','test');
    $str="SELECT * FROM user WHERE name ='".$_POST['UserName']."'";
    $result = mysqli_query($con,$str);  
    if ($row = mysqli_fetch_array($result)) {  
        if($row["password"] == $_POST["PassWord"]){  
            echo "Petch Success!";  
        }  
        else{  
            echo "ERROR!";  
        }  
    }  
    else{  
        echo "UserName EMPTY!";  
    }  
    mysqli_close($con);  
?>