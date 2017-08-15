<?php
function curl($url, $ifpost = 0, $datafields = '', $cookiefile = '', $v = false) { 
	$header = array("Connection: Keep-Alive","Accept: text/html, application/xhtml+xml, */*", 
	                 "Pragma: no-cache", "Accept-Language: zh-Hans-CN,zh-Hans;q=0.8,en-US;q=0.5,en;q=0.3","User-Agent: Mozilla/5.0 (compatible; MSIE 10.0; Windows NT 6.2; WOW64; Trident/6.0)"); 
	$ch = curl_init(); 
	curl_setopt($ch, CURLOPT_URL, $url); 
	curl_setopt($ch, CURLOPT_HEADER, $v); 
	curl_setopt($ch, CURLOPT_HTTPHEADER, $header); 
	$ifpost && curl_setopt($ch, CURLOPT_POST, $ifpost); 
	$ifpost && curl_setopt($ch, CURLOPT_POSTFIELDS, $datafields); 
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true); 
	curl_setopt($ch, CURLOPT_ENCODING, 'gzip,deflate'); 
	$cookiefile && curl_setopt($ch, CURLOPT_COOKIEFILE, $cookiefile); 
	$cookiefile && curl_setopt($ch, CURLOPT_COOKIEJAR, $cookiefile); 
	$r = curl_exec($ch); 
	curl_close($ch); 
	return $r; 
} 

