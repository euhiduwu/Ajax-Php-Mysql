<?php
//载入出错模板
require_once('error_handler.php');
//指定输出为一个 XML 文件
header('Content-Type: text/xml');
//计算结果
$firstNumber = $_GET['firstNumber'];
$secondNumber = $_GET['secondNumber'];
$result = $firstNumber / $secondNumber;
//建立一个新的 xml 文件
$dom = new DOMDocument();
//建立根元素并将其加入文件
$response = $dom->createElement('response');
$dom->appendChild($response);
//以文本模式将计算出的平方值加入 <response> 元素
$responseText = $dom->createTextNode($result);
$response->appendChild($responseText);
//在一个字符串变量中建立 XML 结构
$xmlString = $dom->saveXML();
echo $xmlString;
?>