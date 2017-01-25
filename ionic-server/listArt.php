<?php
include('incl.php');
$ajax = new Ajax();
$logic = new Logic();
$id = $ajax->getParam('id') * 1;
$datas = $logic->selectListArt($id);
$artist = $logic->getArtist();
foreach ($datas as $keydata => $valuedata) {
	foreach ($artist as $keyart => $valueart) {
		if($valuedata['aid'] == $valueart['id']){
			$datas[$keydata]["artname"] = $valueart['name'];
			$datas[$keydata]["artimage"] = $valueart['image'];
		}
	}
}

echo $ajax->returnList($datas);