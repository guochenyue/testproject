<?php
require 'common.inc.php';
if($_userid) set_cookie('auth', '');
dheader('my.php?reload='.$DT_TIME);
// $userinfo['member'] = $db->get_one("SELECT * FROM {$DT_PRE}member WHERE userid='25'");
// $userinfo['company'] = $db->get_one("SELECT * FROM {$DT_PRE}company WHERE userid='25'");
// $url = 'http://192.168.100.116/ajax.php?action=laoqumember';
// $res = tongbu($url,$userinfo);
?>