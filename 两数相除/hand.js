var xmlHttp = createXmlHttpRequestObject();

function createXmlHttpRequestObject(){
	var xmlHttp;
	try{
		xmlHttp = new XMLHttpRequest();
	}catch(e){
		var XmlHttpVersions = new Array("MSXML2.XMLHTTP.6.0",
			                            "MSXML2.XMLHTTP.5.0",
			                            "MSXML2.XMLHTTP.4.0",
			                            "MSXML2.XMLHTTP.3.0",
			                            "MSXML2.XMLHTTP",
			                            "Microsoft.XMLHTTP");
		for(var i=0; i<XmlHttpVersions.length && !xmlHttp; i++){
			try{
				xmlHttp = new ActiveXObject(xmlHttpVersions[i]);
			}catch(e){

			}
		}
	}
	if(!xmlHttp)
		alert('Error creating the XMLHttpRequest object');
	else
		return xmlHttp;
}

function process(){
	if(xmlHttp){
		try{
			var firstNumber = document.getElementById("firstNumber").value;
			var secondNumber = document.getElementById('secondNumber').value;
			var params = "firstNumber="+firstNumber+"&&secondNumber="+secondNumber;
			xmlHttp.open("GET", "hand.php?"+params,true);
			xmlHttp.onreadystatechange = handleRequestStateChange;
			xmlHttp.send(null);
		}catch(e){
			alert("Can't connect to server:\n"+e.toString());
		}
	}
}

function handleRequestStateChange(){
	if(xmlHttp.readyState == 4){
		if(xmlHttp.status == 200){
			try{
				handleServerResponse();
			}catch(e){
				alert("Error reading the response:"+e.toString());
				alert(1);
			}
		}else{
			alert("There was a problem retrieving the data:\n"+xmlHttp.statusText);
		}
	}
}

function handleServerResponse(){
	var xmlResponse = xmlHttp.responseXML;
	var rootNodeName = xmlResponse.documentElement.nodeName;
	xmlRoot = xmlResponse.documentElement;
	responseText = xmlRoot.firstChild.data;
	myDiv = document.getElementById("myDivElement");
	myDiv.innerHTML = "Server says the answer is:"+responseText;
}