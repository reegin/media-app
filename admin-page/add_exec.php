<?php
	include("lib_db.php");
	//upload file
	// print_r($_REQUEST);
	//print_r($_FILES);exit();
	$linkNative = "null"; //lay anh, lay filename 
	//1. 
	if ($_FILES['link']['error'] == 1){ //isset($_FILES['link'])
		$fitem = $_FILES['link'];
		$filename = pathinfo($fitem['name'],PATHINFO_FILENAME);
		$ext = pathinfo($fitem['name'],PATHINFO_EXTENSION);
		//$extra = time();
		$toFile = "audio/{$filename}.{$ext}";
		//$toFile = "D:\wamp64\www\audio\{$filename}.{$ext}";
		//if (move_uploaded_file($fitem['tmp_name'],$toFile)){
		$linkNative = $toFile;
		//}
		
		
			
	}
	$data['link'] = $linkNative;
	//print_r($linkNative);
	
	//print_r($data);exit();

	//0968854164-01666632646
	
	//end upload file

	$data['title'] = isset($_REQUEST["title"]) ? $_REQUEST["title"] : '';
	$data['description'] = isset($_REQUEST["description"]) ? $_REQUEST["description"] : '';
	$data['cid'] = isset($_REQUEST["cid"]) ? $_REQUEST["cid"]  * 1 : 0;
	$data['aid'] = isset($_REQUEST["aid"]) ? $_REQUEST["aid"] : 0;
	// print_r($data);exit();

	$sql = data_to_sql_insert("product",$data); //viet cau lenh sql
	// print_r($data);exit();
	$result = exec_update($sql); 
	?>
<html>
	<style>
		label{width:100px;float:left;}
	</style>
	<body>
		<?php if($result) {?>
			<?php echo "Add completely!" ?>
		<?php } ?>
		<br/> 
		<!-- <audio controls = "controls"> 
			<source src = <?php echo $data['link'] ?> type = "audio/mpeg">
		</audio> -->
		<a href="add.php">Add another track</a><br/>
		<text>Move to </text>
		<a href="manager.php">admin page</a>
	</body>
</html>