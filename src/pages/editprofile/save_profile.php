<?php
session_start();
if ($_SESSION['test_id'] == "") {
	echo "กรุณากรอกเข้าสู่ระบบ!";
	exit();
}

require_once('../config/config.php');
$sql = "SELECT * FROM member WHERE test_id = '" . $_SESSION['test_id'] . "' ";
$query = mysqli_query($conn, $sql);
$result = mysqli_fetch_array($query, MYSQLI_ASSOC);

if ($_POST["txtPassword"] != $_POST["txtConPassword"]) {
	echo "ไม่สามารถบันทึกรหัสผ่านได้!";
	exit();
}
$sql = "UPDATE member SET test_pass = '" . trim($_POST['txtPassword']) . "' WHERE test_id = '" . $_SESSION["test_id"] . "' ";
$query = mysqli_query($conn, $sql);

echo "บันทึกข้อมูลผู้ใช้สำเร็จ!";
// echo "<meta http-equiv=\"Refresh\" content=\"1; URL=http://localhost/mackerel-fish/php/pages/info/info.php\">";
echo "<meta http-equiv=\"Refresh\" content=\"1; URL=https://waraporn.cmtc.ac.th/student/student65/u65301280005/mackerel-fish-shop-new/php/pages/info/info.php\">";
mysqli_close($conn);
?>