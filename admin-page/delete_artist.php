<?php 
	include ('lib_db.php');
	$id = isset($_REQUEST["id"]) ? $_REQUEST["id"] : '';
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 	<link rel="stylesheet" type="text/css" href="form_style.css">
 </head>
 <body>
 	<fieldset>
 		<legend>
 			<h1> Are you sure??</h1>
 		</legend>
 	
 	
 	<a href="manager_artist.php"><input type="button" value="Back"></a>
 	<a href="delete_artist_exec.php?id=<?php echo $id ?>"><input type="submit" value="OK"></a>
 	</fieldset>
 </body>
 </html>