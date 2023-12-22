<?php
	session_start();
	require_once('conn.php');
	
	$sql = "SELECT * FROM Member WHERE test_user = '".mysqli_real_escape_string($conn,$_POST['txtUsername'])."' and test_pass = '".mysqli_real_escape_string($conn,$_POST['txtPassword'])."'";

	$query = mysqli_query($conn,$sql);
	$result = mysqli_fetch_array($query);

	if(!$result)
	{
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
