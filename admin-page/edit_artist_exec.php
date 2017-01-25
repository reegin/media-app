<?php 
	include("lib_db.php");
	//print_r($_REQUEST);exit();
	$image = "";
	
	//error = 1: co file
	//error = 4: ko co file truyen vao
	
	if ($_FILES['image']['error'] == 0){

		//echo "có file truyền vào thì mới nhảy vào đây";exit();
		$fitem = $_FILES['image'];
		$filename = pathinfo($fitem['name'],PATHINFO_FILENAME);
		$ext = pathinfo($fitem['name'],PATHINFO_EXTENSION);
		//$extra = time();
		//$toFile = "img/{$filename}-{$extra}.{$ext}";
		$toFile = "img/{$filename}.{$ext}";
		//if (move_uploaded_file($fitem['tmp_name'],$toFile))
		$image = $toFile;
		$data['image'] = $image;

	}
	
	$id = isset($_REQUEST['id']) ? $_REQUEST['id'] : '';
	$data['name'] = isset($_REQUEST['name']) ? $_REQUEST['name'] : '';
	//print_r($data);exit();
	
	$sql = data_to_sql_update('artist',$data);
	$sql .= " where id=" . $id;
	//echo $sql;exit();
	$result = exec_update($sql);
?>

<html>
	<style>
	label{width:100px;float:left;}
	</style>
	<body>
		<?php if ($result) {?>
		Ban da edit thanh cong bai hat 
		<?php }else {?>
		<?php }?>
		<br/> 
		<a href="manager_artist.php">Back.</a>
	</body>
</html>