<?php
	include("lib_db.php");
	//print_r($_REQUEST);exit();
	//print_r($_FILES);exit();
	//buoc 1
	//upload file
	
	$linkNative = ""; //lay anh, lay filename 
	//1. 
	//print_r($_FILES['link']['error']);exit();
	// if (isset($_FILES['link'])){

	// 	//echo "có file truyền vào thì mới nhảy vào đây";exit();
	// 	$fitem = $_FILES['link'];
	// 	$filename = pathinfo($fitem['name'],PATHINFO_FILENAME);
	// 	$ext = pathinfo($fitem['name'],PATHINFO_EXTENSION);
	// 	$extra = time();
	// 	$toFile = "uploads/{$filename}-{$extra}.{$ext}";
	// 	//if (move_uploaded_file($fitem['tmp_name'],$toFile))
	// 	$linkNative = $toFile;
	// 	$data['link'] = $linkNative;
	// 	//
	// }
	
	//error = 1 thi co file truyen vao
	//error = 4 thi khong co file truyen vao
	if ($_FILES['link']['error'] == 1){

		//echo "có file truyền vào thì mới nhảy vào đây";exit();
		$fitem = $_FILES['link'];
		$filename = pathinfo($fitem['name'],PATHINFO_FILENAME);
		$ext = pathinfo($fitem['name'],PATHINFO_EXTENSION);
		//$extra = time();
		$toFile = "audio/{$filename}.{$ext}";
		//if (move_uploaded_file($fitem['tmp_name'],$toFile))
		$linkNative = $toFile;
		$data['link'] = $linkNative;

		//
	}
	
	// print_r($_FILES['link']);exit();
	//echo $thumbnail;exit();
	//end upload file
	$id = isset($_REQUEST["id"]) ? $_REQUEST["id"] : '';
	$data['title'] = isset($_REQUEST["title"]) ? $_REQUEST["title"] : '';
	$data['description'] = isset($_REQUEST["description"]) ? $_REQUEST["description"] : '';
	$data['cid']= isset($_REQUEST["cid"]) ? $_REQUEST["cid"]  : '';
	$data['aid'] = isset($_REQUEST["aid"]) ? $_REQUEST["aid"]  * 1 : 0;
	//print_r($data);exit();
	$sql = data_to_sql_update('product',$data);
	$sql .= " where id=" . $id;
	//echo $sql;exit();
	
	$result = exec_update($sql); //thuc thi $sql phia tren
	?>
<html>
<style>
label{width:100px;float:left;}
</style>
<body>
<?php if ($result) {?>
Done editing!
<?php }else {?>
<?php }?>
<br/> 
<a href="manager.php">Back.</a>
</body>
</html>