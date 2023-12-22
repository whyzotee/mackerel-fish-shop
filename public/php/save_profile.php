<?php
	session_start();
	if($_SESSION['test_id'] == "")
	{
		echo "กรุณากรอกเข้าสู่ระบบ!";
		exit();
	}

	require_once('conn.php');
	$sql = "SELECT * FROM Member WHERE test_id = '".$_SESSION['test_id']."' ";
	$query = mysqli_query($conn,$sql);
	$result = mysqli_fetch_array($query,MYSQLI_ASSOC);
	
	if($_POST["txtPassword"] != $_POST["txtConPassword"])
	{
		echo "ไม่สามารถบันทึกรหัสผ่านได้!";
		exit();
	}
	$sql = "UPDATE Member SET test_pass = '".trim($_POST['txtPassword'])."' WHERE test_id = '".$_SESSION["test_id"]."' ";
	$query = mysqli_query($conn,$sql);
	
	echo "บันทึกข้อมูลผู้ใช้สำเร็จ!";		
	
	if($_SESSION["test_status"] == "EMPLOYEE")
	{
		echo "<br> กลับไปยังหน้า <a href='Employee_page.php'>EMPLOYEE</a>";
	}
	else
	{
		echo "<br> กลับไปยังหน้า <a href='Customer_page.php'>CUSTOMER</a>";
	}
	
	mysqli_close($conn);
?>
