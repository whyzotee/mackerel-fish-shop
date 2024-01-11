<?php
require_once('../../config/config.php');

$filename = $_FILES["fish_image"]["name"];
$tempname = $_FILES["fish_image"]["tmp_name"];

$sql = "UPDATE scheduling_fish SET 
			fish_name = '" . $_POST['fish_name'] . "',
			fish_detail = '" . $_POST['fish_detail'] . "',
			fish_price = '" . $_POST['fish_price'] . "',
			fish_image = '" . $decodedImage . "',
			fish_familia = '" . $_POST['fish_familia'] . "'
			WHERE add_id = '" . $_POST['add_id'] . "'
		";

$query = mysqli_query($conn, $sql);

if ($query) {
	echo "แก้ไขข้อมูลคอร์สอบรม เสร็จสมบูรณ์... " . $decodedImage . "";
	echo "<meta http-equiv=\"Refresh\" content=\"1; URL=https://waraporn.cmtc.ac.th/student/student65/u65301280005/mackerel-fish-shop-new/php/pages/shop/scheduling_fish.php\">";
	// echo "<meta http-equiv=\"Refresh\" content=\"1; URL=https://waraporn.cmtc.ac.th/testTrainingReserve/scheduling_course.php\">";
}
mysqli_close($conn);
?>