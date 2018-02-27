<?php

	if ($_SERVER['HTTP_HOST']=='localhost') { 
		
		$DB_SERVER = 'localhost';
		$DB_USER_READER = 'root';
		$DB_PASS_READER = '';
		$DB_NAME = 'db902_exchange';
		echo "<br>";
		// echo "localhost";


	} else {

	// 	//บน server imsu.co

		$DB_SERVER = 'localhost';
		$DB_USER_READER = 'u13580209';
		$DB_PASS_READER = 'QjYuC5ieDD';
		$DB_NAME = 'db13580209';

	}

		//คำสั่งที่ใช้ต่อกับฐานข้อมูล
		//msqli จะปลอดภัยกว่า mysql
	$conn = new mysqli($DB_SERVER, $DB_USER_READER, $DB_PASS_READER, $DB_NAME); 

	//ตรวจสอบว่าต่อสำเร็จหรือไม่
	if ($conn -> connect_error) {
		die("connection failed".$conn -> connect_error);
	}

	mysqli_set_charset($conn, "utf8"); //จำเป็นถ้าไม่มีจะอ่านค่าข้อมูลเป็นต่างดาว

?>