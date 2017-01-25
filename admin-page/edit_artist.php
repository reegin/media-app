<?php 
	include("lib_db.php");
	$id = isset($_REQUEST['id']) ? $_REQUEST['id'] * 1 : 0;
	
	$sql = "select * from artist where id = {$id}";
	
	$data = select_one($sql);
	//print_r($data);exit();
?>

<html>
	<meta http-equiv="Content-Type" content="text/shtml; charset=utf-8" />
	<link rel="stylesheet" type="text/css" href="form_style.css">
	<body>
		<fieldset>
		<legend>
			<h1>EDIT ARTIST INFORMATION</h1>
		</legend>

		<form class = "add_artist" action = "edit_artist_exec.php?id=<?php echo $data['id'] ?>" method = "POST" enctype = "multipart/form-data" >
		
		<br/>
		
			<label>Name: </label>
			<br>
			<input type = "text" name = "name" value = "<?php echo $data['name'] ?>" />
			<hr>
			<br/>
			
			<label>Current image: </label>
				<?php echo $data['image'] ?>
			
			<hr><br/>

			<label>New link:</label>
			<br>
			<input type = "file" name = "image" value = "" />
			<hr>
			<br/>
			
			<button>OK</button>
			</fieldset>
		</form>
		
	</body>
</html>	