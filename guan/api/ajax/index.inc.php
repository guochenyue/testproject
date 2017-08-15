<?php
defined('IN_DESTOON') or exit('Access Denied');
$catid = $_POST['catid'];
//echo json_encode($catid);
//$data = array();
//echo json_encode($catid);die;
if($catid == 'ts'){
$tsgoods = get_tsp_goods();
$tscp = get_tsp_com();
$result = array_merge($tsgoods,$tscp);

}
else if($catid == 'tsg'){
	$tsgoods = get_tsp_cg();
	$tscp = get_ts_changguan();
	$tj = get_tjg();
	$result = array_merge($tsgoods,$tscp);
	$result[] = $tj;
	//$result = array_merge($result,$tj);
}else{
	 $producters = get_goods($catid,10);
	 $cats = get_maincats($catid);
	 $result = array_merge($producters,$cats);
}
echo json_encode($result);

?>