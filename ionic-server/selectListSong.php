<!-- <?php 
	/*include('incl.php');
	$ajax = new Ajax();
	$logic = new Logic();
	$data = $logic->getSong();
	echo $ajax->returnList($data);*/
?>  -->

<?php 
	include('incl.php');
	$ajax = new Ajax();
	$logic = new Logic();
	$data = $logic->getSong();
	$art = $logic->getArtist();
	foreach ($data as $key => $value) {
		foreach ($art as $key_art => $value_art) {
			if ($value['aid'] == $value_art['id']) {
				$data[$key]['art_name'] = $value_art['name'];
				$data[$key]['art_image'] = $value_art['image'];
			}
		}
	}
	echo $ajax->returnList($data);
?>