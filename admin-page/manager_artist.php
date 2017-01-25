<?php 
	include('lib_db.php');
	$key = isset($_REQUEST['key']) ? $_REQUEST['key'] : '';
	
	$sql = "select * from artist";
	$dataArt = select_list($sql);
	//print_r($dataArt);exit();
	$stt=0;
	
	if($key) {
		$sqlSearch = "select * from artist where name LIKE '%".$key."%'";
		$dataArt = select_list($sqlSearch);
		
		if(!$dataArt) {
			echo "Khong tim thay";
		}
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Artist Database</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body>
		<h1>ART MANAGER</h1>
			<form action = "manager_artist.php?key=<?php echo $key ?>" method = "POST">
			Key
			<input type = "text" name = "key"></input>
			<input type = "submit" value = "Search"></input>
			<br>
			<br>
			<a href="add_artist.php">Move to adding artist page</a>
		</form>
		<table align = "center">
			<tr>
				<td class="title">STT</td>
				<td class="title">ID</td>
				<td class="title">Name</td>
				<td class="title">Image</td>
				<td class="title">Edit</td>
				<td class="title">Delete</td>
			</tr>
			<?php 
				foreach ($dataArt as $key =>$artist) {
					$stt++;
				?>
				
				<tr>
					<td><?php echo $stt; ?></td>
					<td><?php echo $artist['id']; ?></td>
					<td><?php echo $artist['name'] ?></td>
					<td>
						<img src ="<?php echo $artist['image'] ?>" ></img>
					</td>
					<td>
		                	<a href="edit_artist.php?id=<?php echo $artist['id']; ?>">Edit</a>
		                </td>
		                <td>
		                	<a href="delete_artist.php?id=<?php echo $artist['id']; ?>">Delete</a>
		                </td>
				</tr>	
				<?php } ?>	
		</table>
	</body>
</html>