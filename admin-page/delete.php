<?php 
	include ('lib_db.php');
	$id = isset($_REQUEST["id"]) ? $_REQUEST["id"] : '';
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>Confirm</title>
 	<link rel="stylesheet" type="text/css" href="form_style.css">
 </head>
 <body>
 	<fieldset>
 		<legend>
 			<h1>WARNING</h1>
 		</legend>
 	<text> Ban co thuc su muon xoa khong?</text>

 	<a href="delete_exec.php?id=<?php echo $id ?>"><input type="submit" value="OK"></a>
 	<a href="manager.php"><input type="button" value="Back"></a>
 	</fieldset>
 </body>
 </html>