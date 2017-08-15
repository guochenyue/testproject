<?php 
defined('IN_DESTOON') or exit('Access Denied');
global $db;
$data = base64_decode($_POST['data']);
$data = json_decode($data);

// 注册前检查
if(isset($data->check) && $data->check == 1){
	if(isset($data->username)){
		$username = $data->username;
		$sql = "SELECT username FROM {$db->pre}member WHERE username = '".$username."'";
	}
	if(isset($data->mobile)){
		$mobile = $data->mobile;
		$sql = "SELECT mobile FROM {$db->pre}member WHERE mobile = '".$mobile."'";
	}
	$res = $db->get_one($sql);
	if($res){
		// 已经有数据
		echo 2;
	}else{
		// 尚未有数据
		echo 1;
	}
}else{
	$member = $data->member;
	$company = $data->company;
	if(isset($member->check)){
		unset($member->check);
	}
	if(isset($member->userid)){
		unset($member->userid);
	}
	$key = '';
	$value = '';
	foreach($member as $k=>$v){
		$key .= ','.$k;
		$value .= ',"'.$v.'"';
	}
	$key = substr($key,1);
	$value = substr($value,1);
	$sql = "INSERT INTO {$db->pre}member ($key) VALUES ($value)";
	$res1 = $db->query($sql);
	$company->userid = $db->insert_id();

	$key = '';
	$value = '';
	foreach($company as $k=>$v){
		$key .= ','.$k;
		$value .= ',"'.$v.'"';
	}
	$key = substr($key,1);
	$value = substr($value,1);
	$sql = "INSERT INTO {$db->pre}company ($key) VALUES ($value)";
	$res2 = $db->query($sql);

	if($res1 && $res2){
		exit('ok');
	}else{
		exit('ko');
	}
}

?>