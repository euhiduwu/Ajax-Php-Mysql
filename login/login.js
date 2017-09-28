function validation(){  
    var UserName = document.getElementById("UserName").value;  
    var PassWord = document.getElementById("PassWord").value;  
    var postStr = "UserName=" + UserName + "&PassWord=" + PassWord;
    ajax("login.php",postStr,function(result){  
        document.getElementById("info").innerHTML = result;  
    });  
}  
  
function ajax(url,postStr,onsuccess){ 
    var xmlhttp = window.XMLHttpRequest?new XMLHttpRequest():new ActiveXObject('Microsoft.XMLHTTP');  
    xmlhttp.open("POST",url,true);  
    xmlhttp.onreadystatechange = function(){  
        if(xmlhttp.readyState == 4){  
            if(xmlhttp.status == 200){
                onsuccess(xmlhttp.responseText);  
            }  
            else{  
                alert("AJAX ERROR!");  
            }  
        }  
    }  
    xmlhttp.setRequestHeader('Content-Type','application/x-www-form-urlencoded');  
    xmlhttp.send(postStr);  
}  