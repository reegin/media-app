<?php
	include("lib_db.php");
	//buoc 1 ko co
	//buoc 2
	$sqlCat = "SELECT * FROM category";
	$dataCat = select_list($sqlCat);
	//print_r ($dataCat);exit;
	$sqlArt = "SELECT * FROM artist";
	$dataArt = select_list($sqlArt);
	//print_r ($dataArt);exit;
	?>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/shtml; charset=utf-8" />

	<link rel="stylesheet" type="text/css" href="form_style.css">
	<!-- /*label{
		width:100px;
		float:left;}*/ -->
</head>

<body>
	
	<text>Move to </text>
	<a href="manager.php">manager</a>
	<text> page</text>
	<br>
<form class="add" action="add_exec.php" method="post"  enctype="multipart/form-data">
		<!-- nhay sang trang exec -->
		<fieldset>
			<legend>
				<h1>ADD TRACK</h1>
			</legend>


			
			<label>Title:</label>
			<br>
			<input type="text" name="title" align="right" value=""/>
			<hr>
			<br/>
			
			<label>Description:</label>
			<br>
			<textarea type="text" name="description" align="right" value=""></textarea>
			<hr>
			<br/>

			<label>Link:</label>
			<br>
			<input type="file" name="link"  value=""/>
			<br/>			
			<hr>

			
			<label>Genre:</label>
			<br>
			<select name="cid">
				<?php foreach ($dataCat as $key => $cat) { ?>
					<option value="<?php echo $cat['id'] ?>"><?php echo $cat['title'] ?></option>
				<?php } ?>
			</select>
			<br/>
			
			<hr>

			
			<label>Artist:</label>
			<br>
			<select name="aid">
			<?php foreach ($dataArt as $key => $art) { ?>
				<option value="<?php echo $art['id'] ?>"><?php echo $art['name'] ?></option>
			<?php } ?>
			</select>		
			<br/>

			<hr>
		
		<button>Add</button>
	</fieldset>
</form>
</body>
</html>