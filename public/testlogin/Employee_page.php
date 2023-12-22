<?php
	session_start();

	if($_SESSION['test_id'] == "")
	{
		echo "กรุณากรอกเข้าสู่ระบบ!";
		exit();
	}

	if($_SESSION['test_status'] != "EMPLOYEE")
	{
		echo "หน้านี้สำหรับ ผู้ดูแลระบบ เท่านั้น!";
		exit();
	}	
	require_once('conn.php');
	$sql = "SELECT * FROM Member WHERE test_id = '".$_SESSION['test_id']."' ";
	$query = mysqli_query($conn,$sql);
	$result = mysqli_fetch_array($query,MYSQLI_ASSOC);
?>

<html>
  <head>
    <title>ทดสอบระบบ Employee</title>
  </head>
  <body>
    <a href="login.php">หน้าแรก</a><br><br>
    ยินดีต้อนรับ ผู้ดูแลระบบ <?php echo $result["test_status"];?><br><br>
    <table border="1" style="width: 300px">
      <tbody>
        <tr>
          <td width="85"> &nbsp;ชื่อผู้ใช้ :</td>
          <td width="195"><?php echo $result["test_user"];?></td>
        </tr>
        <tr>
          <td> &nbsp;ชื่อ :</td>
          <td><?php echo $result["test_name"];?></td>
        </tr>
        <tr>
          <td> &nbsp;นามสกุล :</td>
          <td><?php echo $result["test_lname"];?></td>
        </tr>
      </tbody>
    </table>
    <br>
    <a href="edit_profile.php">แก้ไขข้อมูลผู้ใช้</a><br>
    <br>
    <a href="logout.php">ออกจากระบบ</a>
  </body>
</html>
