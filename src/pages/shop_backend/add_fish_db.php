<?php
require_once('../../core/config.php');

$filename = $_FILES['fish_image']['name'];
$location = "../../../assets/images/upload/" . $filename;

if (!is_dir('../../../assets/images/upload/'))
	mkdir('../../../assets/images/upload/', 0755);

if (move_uploaded_file($_FILES['fish_image']['tmp_name'], $location)) {
	$sql = "INSERT INTO scheduling_fish (fish_name, fish_detail, fish_price, fish_image, fish_familia) 
		VALUES ('" . $_POST["fish_name"] . "',
				'" . $_POST["fish_detail"] . "',
				'" . $_POST["fish_price"] . "',
				'" . $location . "',
				'" . $_POST["fish_familia"] . "')";

	$query = mysqli_query($conn, $sql);

	if ($query) {
		echo '<script language="javascript">';
		echo 'alert("Fish details is added!"); window.location = "dashboard.php";';
		echo '</script>';
	}
} else {
	if (empty($filename)) {

		$sql = "INSERT INTO scheduling_fish (fish_name, fish_detail, fish_price, fish_image, fish_familia) 
		VALUES ('" . $_POST["fish_name"] . "',
				'" . $_POST["fish_detail"] . "',
				'" . $_FILES["fish_price"] . "',
				'" . $_POST["fish_familia"] . "')";

		$query = mysqli_query($conn, $sql);

		if ($query) {
			echo '<script language="javascript">';
			echo 'alert("Fish details is added!"); window.location = "dashboard.php";';
			echo '</script>';
		}
	} else {
		echo '<script language="javascript">';
		echo 'alert("Error to add product (image file error)"); window.location = "dashboard.php";';
		echo '</script>';
	}
}

mysqli_close($conn);
?>