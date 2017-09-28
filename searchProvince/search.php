<?php
$city = $_POST['City'];
//建立一个新的 xml 文件
$dom = new DOMDocument();
//建立根元素并将其加入文件
$response = $dom->createElement('response');
$dom->appendChild($response);

$mysqli = mysqli_connect('localhost', 'root', '', 'test');
$query = "select * from code where province='" . $_POST['City'] .  "'";
$result = mysqli_query($mysqli,$query);
$num = mysqli_num_rows($result);

$p = $dom->createElement('p');
$p->appendChild($dom->createTextNode($city . " 省的数据共有 " . $num . " 条"));
$dom->appendChild($p);

$table = $dom->createElement('table');
$response->appendChild($table);

$thHead = $dom->createElement('tr');
$table->appendChild($thHead);
 
while($field = mysqli_fetch_field($result)){
	$tdHead = $dom->createElement('td');
	$text = $dom->createTextNode($field->name);
	$tdHead->appendChild($text);
}

while($row = mysqli_fetch_row($result)){
	$tr = $dom->createElement('tr');
	$table->appendChild($tr);
	for($i = 0; $i<count($row); $i++){
		$text = $dom->createTextNode($row[$i]);
		$td = $dom->createElement('td');
		$td->appendChild($text);
		$tr->appendChild($td);
	}
}
//在一个字符串变量中建立 XML 结构
$xmlString = $dom->saveXML();

mysqli_free_result($result);
mysqli_close($mysqli);

echo $xmlString;
?>