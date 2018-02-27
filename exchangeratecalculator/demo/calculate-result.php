<?php
	//1.รับค่าจากindex.php
	//ส่งค่าเป็น POST
	//$thb = $_POST['attribute name']
	$thb = $_POST['thb'];
	$type = $_POST['type']; //ไปเพิ่ม

	

	//แบบแรก

	if ($type=="usd") {
		$result = $thb / 31.2273;
	} elseif ($type=="jyp") {
		$result = $thb / 28.9814;
	} elseif ($type=="krw") {
		$result = $thb / 0.0293;
	} elseif ($type=="gbp") {
		$result = $thb / 43.3292;
	} elseif ($type=="eru") {
		$result = $thb / 38.2737;
	}

	

	//แบบสอง

	// if ($type=="usd") {
	// 	$rate = 31.2273;
	// } elseif ($type=="jyp") {
	// 	$rate = 28.9814;
	// } elseif ($type=="krw") {
	// 	$rate = 0.0293;
	// } elseif ($type=="gbp") {
	// 	$rate = 43.3292;
	// } elseif ($type=="eru") {
	// 	$rate = 38.2737;
	// }

	

	// //แบบสาม

	// switch ($type) {
	// 	case 'usd':
	// 		$rate = 31.2273;
	// 		break;

	// 	case 'jyp':
	// 		$rate = 28.9814;
	// 		break;

	// 	case 'krw':
	// 		$rate = 0.0293;
	// 		break;

	// 	case 'gbp':
	// 		$rate = 43.3292;
	// 		break;

	// 	case 'eru':
	// 		$rate = 38.2737;
	// 		break;
		
	// 	default:
	// 		$rate = 0;
	// 		break;
	// }

	

	require 'connect.php';

	$sql = "INSERT INTO exch902_history(thb, calculated, currency) VALUES($thb, $result, '$type')";

	

	$sql_exe = $conn -> query($sql);
	echo "<br>";

	

?>



<!DOCTYPE html>
 <html>

	 <head>
	 	<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/style.css">
	 	<title>Result</title>
	 </head>

	 <body>
	 	
	 	<div class="container">
	 		<h4>
	 		<?php 

		 		echo "ค่าที่กรอกคือ".$thb;
				echo "<br>";
				echo "สกุลเงินที่ใช้คำนวณ ".$type;
				echo "<br>";

				echo "Result = ".$result;
				echo "<br>";

		 		$sql = "SELECT * FROM exch902_history ORDER BY dateRecord DESC";
		 		$sql_exe = $conn -> query($sql);

	 		?>
	 		</h4>
		 	<table class="table table-striped table-hover">
		 		
		 		<thead>
		 			<tr>
		 				<th class="text-center" colspan="5">ประวัติการคำนวณ</th>
		 			</tr>
			 		<tr>
			 			<th>ยอดเงินที่ใช้คำนวณ</th>
			 			<th>สกุลเงินของคุณ</th>
			 			<th>ผลลัพธ์</th>
			 			<th>เวลา</th>
			 			<th>ลบข้อมูล</th>
			 		</tr>
		 		</thead>
			 	<?php

			 		while ($row = mysqli_fetch_assoc($sql_exe)) {
			 			// echo $array['field name'];
			 			echo "<tr>
			 					<td>".$row['thb']."</td>
			 					<td>"." ".$row['currency']."</td>"."
			 					<td> = ".$row['calculated']."</td>
			 					<td>"." at ".$row['dateRecord']."</td>";
			 	?>

			 					<td>
									<a href="delete.php?id=<?php echo $row['recordID']?>&thb=<?php echo $row['thb'];?>" class="btn btn-danger">ลบข้อมูล</a>
								</td>
			 				 </tr>

			 	<?php
			 		}
			 		$conn->close();
			 	?>

		 	</table>
		</div>

	 </body>

 </html>












