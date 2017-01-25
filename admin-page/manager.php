<?php 
	include('lib_db.php');
	$key = isset($_REQUEST['key']) ? $_REQUEST['key'] : '';



	$sql = "SELECT * FROM Product";	
	$dataProduct = select_list($sql);


	//print_r($dataProduct);exit();

	$stt=0;
	
	//print_r($dataProduct);exit();
	function binding_foreach($dataProduct)
	{	
		$sqlArtist = "SELECT * FROM Artist";
		$sqlCategory = "SELECT * FROM Category";
		$dataArtist = select_list($sqlArtist);
	    $dataCategory= select_list($sqlCategory);
		foreach ($dataProduct as $keyProduct => $product) {
			foreach ($dataArtist as $keyArtist => $artist) {
				foreach ($dataCategory as $keyCategory => $category) {
					if($product['aid'] == $artist['id']){
						$dataProduct[$keyProduct]['artistName'] = $artist['name'];
					}
					if($product['cid'] == $category['id']){
						$dataProduct[$keyProduct]['catName'] = $category['title'];
					}
				}
			}
		}

		return $dataProduct;
	}



	$dataProduct = binding_foreach($dataProduct);
	
	if ($key) {
		$sqlSearch = "select * from product where title LIKE '%".$key."%'";
		$queryResult = select_list($sqlSearch);
		if($queryResult){
			$dataProduct = binding_foreach($queryResult);
		}else {
			echo " Khong tim thay";
		}
	}
	



	//print_r($dataProduct);exit();
	
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Database</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body

	<h1> PHP ADMIN</h1>
	<form action="manager.php?key=<?php echo $key ?>" method="POST">
		Key
		<input type="text" name="key" ></input>
		<!-- <br> -->
		<input type="submit" value="Search"></input>
		<br>
		<br>
		<a href="add.php">Move to adding track page</a>
	</form>
	<table align="center">
		  <tr>
		     <td class="title">Stt</td>
		     <td class="title">ID</td>
		     <td class="title">Title</td>
		     <td class="title">Description</td>
		     <td class="title">Genre</td>
		     <td class="title">Artist</td>
		     <td class="title">Link</td>
		     <td class="title">Edit</td>
		     <td class="title">Delete</td>
		   </tr>
	    

		  <?php foreach ($dataProduct as $key => $product){  $stt++; ?>
						
			       <tr>
				       	<td><?php echo $stt; ?></td>
		                <td><?php echo $product['id']; ?></td>
		                <td><?php echo $product['title']; ?></td>
		                <td><?php echo $product['description']; ?></td>
		                <td><?php echo $product['catName']; ?></td>
		                <td><?php echo $product['artistName']; ?></td>
		                <td><?php echo $product['link']; ?> </td>
		                
		                <td>
		                	<a href="edit.php?id=<?php echo $product['id']; ?>">Edit</a>
		                </td>
		                <td>
		                	<a href="delete.php?id=<?php echo $product['id']; ?>">Delete</a>
		                </td>
				    	     
		    		</tr>
				<?php }?> 
</table>
</body>
</html>