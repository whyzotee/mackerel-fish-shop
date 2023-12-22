<?php
	session_start();
	require_once('config.php');

	$data = json_decode(file_get_contents("php://input"), true);
	$username = $data['username'];
	$password = $data['password'];
	
	$sql = "SELECT * FROM Member WHERE test_user = '".mysqli_real_escape_string($conn, $username)."' and test_pass = '".mysqli_real_escape_string($conn, $password)."'";

	$query = mysqli_query($conn,$sql);
	$result = mysqli_fetch_array($query);

	if(!$result)
	{
		header("Status: 401 Unauthorized");
		echo "ชื่อผู้ใช้ หรือ รหัสผ่าน ผิดพลาด!";
		echo "<meta http-equiv=\"Refresh\" content=\"1; URL=https://waraporn.cmtc.ac.th/student/student65/u65301280005/mackerel-fish-shop-new/testlogin/login.php\">";
	}
	else
	{
			$_SESSION["test_id"] = $result["test_id"];
			$_SESSION["test_status"] = $result["test_status"];

			session_write_close();
			
			if($result["test_status"] == "EMPLOYEE")
			{
				header("location:Employee_page.php");
			}
			else
			{
				header("location:Customer_page.php");
			}
	}
	mysqli_close($conn);
?>
