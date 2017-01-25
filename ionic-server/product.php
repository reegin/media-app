<?php
include('incl.php');
$ajax = new Ajax();
$logic = new Logic();
//sua, them, 
$id = $ajax->getParam('id') * 1;
$ret = $logic->selectOne($id);
$artist = $logic->getArtist();
foreach ($artist as $key => $value) {
	if($ret['aid'] == $value['id']){
		$ret['artname'] = $value['name'];
		$ret['artimage'] = $value['image'];
	}
}
echo $ajax->returnOne($ret);