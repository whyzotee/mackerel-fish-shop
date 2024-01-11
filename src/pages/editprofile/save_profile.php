<?php
session_start();
if ($_SESSION['local_id'] == "") {
	echo "กรุณากรอกเข้าสู่ระบบ!";
	exit();
}

require_once('../../core/config.php');
$sql = "SELECT * FROM member WHERE id = '" . $_SESSION['local_id'] . "' ";
$query = mysqli_query($conn, $sql);
$result = mysqli_fetch_array($query, MYSQLI_ASSOC);

if ($_POST["txtPassword"] != $_POST["txtConPassword"]) {
	echo "ไม่สามารถบันทึกรหัสผ่านได้!";
	exit();
}
$sql = "UPDATE member SET password = '" . trim($_POST['txtPassword']) . "' WHERE id = '" . $_SESSION["local_id"] . "' ";
$query = mysqli_query($conn, $sql);

echo "บันทึกข้อมูลผู้ใช้สำเร็จ!";
echo '<script language="javascript">';
echo 'alert("Password is saved!"); window.location = "../info/info.php";';
echo '</script>';

mysqli_close($conn);
?>