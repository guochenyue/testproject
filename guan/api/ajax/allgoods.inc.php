<?php
defined('IN_DESTOON') or exit('Access Denied');
$num = $_GET['num'];
$page = $_GET['page'];
$limit = ($page-1)*$num;
// 猜你喜欢部分
if($_GET['islike']){
	global $db;
	if(isset($_COOKIE['item_his'])){//存在浏览记录，就将第一条的分类取出查询该分类下的产品
		$his = explode(',',$_COOKIE['item_his']);
		$catid = $db->get_one("SELECT catid FROM {$db->pre}mall WHERE itemid = ".$his[0],'CACHE');
		$childid = get_catid($catid['catid']);
		if($childid['arrchildid']){
			$sql = "SELECT * FROM {$db->pre}mall WHERE catid in (".$childid['arrchildid'].") and level <> 4 limit $limit,$num";
		}else{
			$sql = "SELECT * FROM {$db->pre}mall WHERE catid = ".$catid['catid']." limit $limit,$num";
		}
	}else{//暂无浏览记录，就先生成随机商品
	    $sql = "SELECT * FROM {$db->pre}mall WHERE level <> 4 order by rand() desc limit $limit,$num";
	}
    $result = $db->query($sql,'CACHE');
    $pos = array();
    while($r = $db->fetch_array($result)) {
		$r['thumb'] = str_replace('.thumb.'.file_ext($r['thumb']), '',$r['thumb']);
		$r['title'] = dsubstr($r['title'],42,'...');
		$pos[] = $r;
	}
}else if($_GET['arealike']){//老区馆部分的猜你喜欢
	$sql = "SELECT * FROM {$db->pre}mall WHERE areaid=".$_GET['arealike']." and level <> 4 limit $limit,$num";	
	$result = $db->query($sql,'CACHE');
    $pos = array();
    while($r = $db->fetch_array($result)) {
		$r['thumb'] = str_replace('.thumb.'.file_ext($r['thumb']), '',$r['thumb']);
		$r['title'] = dsubstr($r['title'],42,'...');
		$pos[] = $r;
	}
}else{
//列表页的下拉列表
	if($_GET['order'] == 'xiaoliang'){
		$order = 'sales';
		$by = 'DESC';
	}else if($_GET['order'] == 'pinglun'){
		$order = 'comments';
		$by = 'DESC';
	}else if($_GET['order'] == 'zonghe'){
		$order = 'itemid';
		$by = 'DESC';
	}else if($_GET['order'] == 'jiage'){
		$order = 'price';
		if($_GET['statu'] == 1){
			$by = 'DESC';
		}else{
			$by = 'ASC';
		}
	}
	if($catid = $_GET['catid']){
		$childid = get_catid($catid);
		$catid1 = $childid['arrchildid'];
		if($catid1){
			$sql = "SELECT * FROM {$db->pre}mall WHERE catid in ($catid1) ORDER BY $order $by limit $limit,$num";
		}else{
			$sql = "SELECT * FROM {$db->pre}mall WHERE catid = $catid limit ORDER BY $order $by $limit,$num";
		}
	}else if($_GET['kw']){
		make_search($kw);//添加搜索记录
		$sql = "SELECT * FROM {$db->pre}mall WHERE title like '%$kw%' ORDER BY $order $by limit $limit,$num";
	}else if($_GET['areaid']){
		// if($_GET['catid']){
		// 	$childid = get_catid($_GET['catid']);
		// 	$catid1 = $childid['arrchildid'];
		// 	if($catid1){
		// 		$sql = "SELECT * FROM {$db->pre}mall WHERE catid in ($catid1) and areaid=".$_GET['areaid']." ORDER BY $order $by limit $limit,$num";
		// 	}else{
		// 		$sql = "SELECT * FROM {$db->pre}mall WHERE catid = ".$_GET['catid']." and areaid=".$_GET['areaid']." ORDER BY $order $by limit $limit,$num";
		// 	}
		// }else{
			$sql = "SELECT * FROM {$db->pre}mall WHERE areaid=".$_GET['areaid']." and level <> 4 ORDER BY $order $by limit $limit,$num";	
		// }
	}else{
		$sql = "SELECT * FROM {$db->pre}mall WHERE level <> 4 ORDER BY $order $by limit $limit,$num";
	}
	// echo $sql;die;
	$result = $db->query($sql,'CACHE');
	$pos = array();
	while($r = $db->fetch_array($result)) {
		$r['areaid'] = get_area($r['areaid']);
		$r['areaid'] = $r['areaid']['areaname'];
		$r['thumb'] = str_replace('.thumb.'.file_ext($r['thumb']),'',$r['thumb']);
		$r['title'] = dsubstr($r['title'],42,'...');
		$pos[] = $r;
	}
}
echo json_encode($pos);

?>