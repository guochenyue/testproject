<?php
$db_host = '127.0.0.1';
$db_user = 'root';
$db_psw = 'root';
$db_name = 'test';
$db_port = '3306';
$sqlconn = new mysqli($db_host,$db_user,$db_psw,$db_name);
$q="set names utf8;";
$result=$sqlconn->query($q);


if (mysqli_connect_errno()) {
	printf("Connect failed: %s\n", mysqli_connect_error());
	exit();
}