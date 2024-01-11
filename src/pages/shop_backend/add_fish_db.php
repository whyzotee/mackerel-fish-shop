<?php

require_once('../../config/config.php');

// รับค่าไฟล์จากฟอร์ม
$fileupload = $_REQUEST['add_picture'];
// ฟังก์ชั่นวันที่ ให้เป็นของประเทศไทย
date_default_timezone_set('Asia/Bangkok');
$date = date("Ymd");
// ฟังก์ชั่นสุ่มตัวเลข เพื่อเอาไปตั้งชื่อไฟล์ที่อัพโหลดไม่ให้ชื่อไฟล์ซ้ำกัน
$numrand = (mt_rand());
// เพิ่มไฟล์	
$upload = $_FILES['add_picture'];
if ($upload <> '') {
	// โฟลเดอร์ที่เก็บไฟล์
	$path = "img/";
	// เอาชื่อไฟล์เก่าออกให้เหลือแต่นามสกุล
	$type = strrchr($_FILES['add_picture']['name'], ".");
	// ตั้งชื่อไฟล์ใหม่ โดยเอาเวลาไว้หน้าชื่อไฟล์เดิม
	$newname = $date . $numrand . $type;
	$path_copy = $path . $newname;
	$path_link = "img/" . $newname;
	// คัดลอกไฟล์ไปเก็บที่เว็บเซอร์เวอร์ 
	move_uploaded_file($_FILES['add_picture']['tmp_name'], $path_copy);
}

$sql = "INSERT INTO scheduling_fish (add_id, fish_name, fish_detail, fish_price, fish_image, fish_familia) 
				VALUES ('" . $_POST["add_id"] . "',
						'" . $_POST["fish_name"] . "',
						'" . $_POST["fish_detail"] . "',
						'" . $_FILES["fish_price"] . "',
						'" . $_POST["fish_image"] . "',
						'" . $_POST["fish_familia"] . "')";

$query = mysqli_query($conn, $sql);

if ($query) {
	echo "เพิ่มรายการคอร์ส เสร็จสมบูรณ์...";
	echo "<meta http-equiv=\"Refresh\" content=\"1; URL=https://waraporn.cmtc.ac.th/student/student65/u65301280005/mackerel-fish-shop-new/php/pages/info/info.php\">";
	// echo "<meta http-equiv=\"Refresh\" content=\"1; URL=https://waraporn.cmtc.ac.th/testTrainingReserve/scheduling_course.php\">";
}
mysqli_close($conn);
?>