<?php
/*
Template Name: Proxy
*/
	$sel = str_replace(' ','+',$_GET["sel"]);
	$url = "http://www.google.com/ig/api?weather=".$sel."&hl=es&oe=utf-8";
	$data = file_get_contents($url);
	//$utf = mb_convert_encoding($data,"UTF-8","ISO-8859-2");
	$xml = simplexml_load_string($data);
	print $xml;
	$current = $xml->xpath("/xml_api_reply/weather/current_conditions");
	$forecast =$xml->xpath("/xml_api_reply/weather/forecast_conditions");
	$city = $xml->xpath("/xml_api_reply/weather/forecast_information");
	echo '<span class="ciudad">' . $city[0]->city['data'] . ' </span><img src = "http://www.google.com'.$forecast[0]->icon['data'].'" alt = "clima" style = "width: 20px; height:20px; margin-right: 10px; vertical-align:middle;"/><span class="temp">'.$current[0]->temp_c['data'].'&deg C </span> * ';
?>