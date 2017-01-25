<?php 
	include("lib_db.php");
	
?>

<!DOCTYPE html>
<html>
	

	<head>
		<meta http-equiv="Content-Type" content="text/shtml; charset=utf-8" />
		<link rel="stylesheet" type="text/css" href="form_style.css">
		<title>.:Add artist:.</title>
	</head>
	<body>

		
		<text>Move to </text>
		<a href="manager_artist.php">manager</a>
		<text> page</text>
		<br>

		<form class="add" action="add_artist_exec.php" method="POST"  enctype="multipart/form-data">
			<fieldset>
				<legend>
					<h1>ADD ARTIST</h1>
				</legend>
			<br>
			<label>Name:</label>
			<br>
			<input type="text" name="name" align="right" value=""></input>
			<hr>
			<br/>


			<label>Image:</label>
			<br>
			<input type="file" name="image"  value=""/>
			<hr>
			<br/>

			<button>Add</button>
			<fieldset>
		</form>

	</body>
</html>