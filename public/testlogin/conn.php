<?php

//กำหนดตัวแปรเพื่อนำไปใช้งาน
	$servername = "localhost"; //ชื่อโฮสต์
	$username = "u65301280005"; //ชื่อผู้ใช้
	$password = "u65301280005"; //รหัสผ่าน
	$dbname = "u65301280005"; //ชื่อฐานข้อมูล

// สร้าง connection
	$conn = mysqli_connect($servername, $username, $password, $dbname);

	@date_default_timezone_set("Asia/Bangkok");

// ยกเลิกการเชื่อมต่อฐานข้อมูล
	mysqli_close($conn, "SET NAMES 'utf8' ");
?> 