<?php 
	include ('lib_db.php');
	$id = isset($_REQUEST["id"]) ? $_REQUEST["id"] : '';
	$sql = "delete from artist where id =$id";

	$data = exec_update($sql);
	//print_r($data);exit();

	if ($data !==  1) {
		echo "Khong the xoa duoc";
	}
	else echo "Xoa thanh cong.";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Delete OK</title>
</head>
<body>
	<a href="manager_artist.php"> Quay lai trang quan ly. </a>
	

</body>
</html>