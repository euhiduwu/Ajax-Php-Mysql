function process(){  
    var city = document.getElementById("city").value;
    var postStr = "City=" + city;
    ajax("search.php",postStr,function(result){  
        document.getElementById("myDiv").innerHTML = result;  
    }); 
}
 
function ajax(url,postStr,onsuccess){
    var xmlHttp = window.XMLHttpRequest?
                  new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');  
    xmlHttp.open("POST",url,true);  
    xmlHttp.onreadystatechange = function(){  
        if(xmlHttp.readyState == 4){  
            if(xmlHttp.status == 200){  
                onsuccess(xmlHttp.responseText);  
            }  
            else{  
                alert("AJAX ERROR!");  
            }  
        }  
    }  
    xmlHttp.setRequestHeader('Content-Type','application/x-www-form-urlencoded');  
    xmlHttp.send(postStr);  
}  