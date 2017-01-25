<?php
include('incl.php');
$ajax = new Ajax();
$logic = new Logic();
$data = $logic->getCategory();
echo $ajax->returnList($data);
?>