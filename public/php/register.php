<?php
	require_once('config.php');

	if (!$conn) {
		header("Status: 404 Not Found");
  		die("ไม่สามารถเชื่อมต่อฐานข้อมูลได้ " . mysqli_connect_error());
	}

	$data = json_decode(file_get_contents("php://input"), true);

	$firstname = $data['firstname'];
	$lastname = $data['lastname'];
	$email = $data['email'];
	$username = $data['username'];
	$password = $data['password'];
	$status = $data['status'];

	$sql = "INSERT INTO `Register`( `name`, `last_name`, `email`, `username`, `password`, `status`) VALUES ('".$firstname."','".$lastname."','".$email."','".$username."','".$password."','".$status."');";

	if (mysqli_query($conn, $sql)) {
  		echo "บันทึกข้อมูลสำเร็จ...";
  		echo "<meta http-equiv=\"Refresh\" content=\"1; URL=https://waraporn.cmtc.ac.th/student/student65/u65301280005/mackerel-fish-shop-new/pages/auth/login/\">";
	}

	mysqli_close($conn);
?> 