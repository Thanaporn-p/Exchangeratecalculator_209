<?php
	
	$id = $_REQUEST['id'];
	$thb = $_REQUEST['thb'];

	$sql = "DELETE FROM exch902_history WHERE recordID = $id";

	require 'connect.php';

	$sql_exe = $conn -> query($sql);

	$conn->close();
?>

<!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
 	<link rel="stylesheet" type="text/css" href="css/style.css">
 	<title>Delete</title>
 </head>
 <body class="text-center">
 	<div class="container">
 	<?php  
		if ($sql_exe) {     	
	?>
		<br>
			<h2 class='text-success'>ทำรายการสำเร็จ!
				<br><br>
				<small>Delete ID : <?php echo $id ?> THB = <?php echo $thb ?></small></h2>
		<br>
			<a href="index.php" class="btn btn-success btn-lg">Back</a>
			
	<?php }else{?>

			<h1 class="text-danger">ล้มเหลว!</h1>

	<?php }					
	?>
</div>

 </body>
 </html>