<?php 
	include('incl.php');
	$ajax = new Ajax();
	$logic = new Logic();
	$data = $logic->getArtist();
	echo $ajax->returnList($data);
?>