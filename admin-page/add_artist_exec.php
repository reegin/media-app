<?php 
	include("lib_db.php");
	// print_r($_REQUEST);
	// print_r($_FILES);exit();
	$image = "null";
	
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
		

	}
	$data['image'] = $image;
	$data['name'] = isset($_REQUEST['name']) ? $_REQUEST['name'] : '';
	//print_r($data);exit();
	
	$sql = data_to_sql_insert('artist',$data);
	//echo $sql;exit();
	$result = exec_update($sql);
?>

<!DOCTYPE html>
<html>
	<head>
		<title>.:Notification:.</title>
	</head>
	<style>
		label{width:100px;float:left;}
	</style>
	
	<body>
		<?php if($result) {?>
			<?php echo "Add completely!" ?>
		<?php } ?>
		<br/> 

		<a href="add_artist.php">Add another guys.</a><br/>
		<text>Move to </text>
		<a href="manager_artist.php">admin page</a>

	</body>
</html>