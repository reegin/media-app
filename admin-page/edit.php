<?php
	include("lib_db.php");
	//buoc 1 id
	$id = isset($_REQUEST["id"]) ? $_REQUEST["id"] * 1 : 0;// lay id trong request gui tu manager.php
	//echo $id;exit();
	//buoc 2
	$sql = "select * from Product where id={$id}";
	$data = select_one($sql);
	//print_r($data);exit();
	//danh sach chuyen muc
	$catName='';
	$artistName = '';
	$sqlCat = "select * from Category";
	$dataCat = select_list($sqlCat);
	//print_r($dataCat);exit();
	foreach ($dataCat as $key => $value) {
		if($data['cid'] == $value['id']){
			$catName = $value['title'];
		}
	}
	

	$sqlArtist = "select * from Artist";
	$dataArtist = select_list($sqlArtist);
	foreach ($dataArtist as $key => $value2) {
		if($data['aid'] == $value2['id']){
			$artistName = $value2['name'];
		}
	}
	//echo $data['link'];exit();
	//buoc 3 output
	//print_r($dataArtist);exit();
?>
<html>
<meta http-equiv="Content-Type" content="text/shtml; charset=utf-8" />
<!-- <style>
label{width:100px;float:left;}
</style> -->
<link rel="stylesheet" type="text/css" href="form_style.css">
<body>
	
	<!-- <audio controls="controls">
  		Your browser does not support the <code>audio</code> element.
  		<source src="audio/miracle-miles.mp3" type="audio/mpeg">
	</audio> -->
	

	<audio controls = "controls">
  			<source src="<?php echo $data['link'] ?>" type="audio/mpeg">
	</audio>
<form class="add" action="edit_exec.php?id=<?php echo $data['id'] ?>" method="post"  enctype="multipart/form-data">
		<!-- nhay sang trang exec -->

		<fieldset>
		<legend>
			<h1>EDIT TRACKS</h1>
		</legend>

		<br/>
		<label>Title:</label>
		<br>
		<input type="text" name="title"  value="<?php echo $data["title"] ?>"/>
		<hr>
		

		<label>Description:</label>
		<br>
		<textarea type="text" name="description">  <?php echo $data["description"] ?> </textarea>
		<hr>
		

		<label>Current link: </label>
		
		<?php if ($data['link']) { ?>
			<?php echo $data["link"] ?>
		<?php } ?>	
		<hr>

		
		
		<label>New link:</label>
		<br>
		<input type="file" name="link"  value=""/>
		<hr>
		
		

		<label>Genre:</label>
		<br>

		<select name="cid">
			<option value="<?php echo $data['cid'] ?>"><?php echo $catName ?></option>
			<?php foreach ($dataCat as $key => $cat) { ?>
				<option value="<?php echo $cat['id'] ?>"><?php echo $cat['title'] ?></option>
			<?php } ?>
		</select>
		<hr>
		

		<label>Artist:</label>
		<br>

		<select name="aid">
			<option value="<?php echo $data['aid'] ?>"><?php echo $artistName ?></option>
			<?php foreach ($dataArtist as $key => $art) { ?>
				<option value="<?php echo $art['id'] ?>"><?php echo $art['name'] ?></option>
			<?php } ?>
		</select>
		<hr>
		

		

		<button>OK</button>
		</fieldset>
</form>
</body>
</html>