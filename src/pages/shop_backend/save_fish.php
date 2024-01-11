<?php
require_once('../../core/config.php');


$filename = $_FILES['fish_image']['name'];
$location = "../../../assets/images/upload/" . $filename;

if (!is_dir('../../../assets/images/upload/'))
	mkdir('../../../assets/images/upload/', 0755);

if (move_uploaded_file($_FILES['fish_image']['tmp_name'], $location)) {
	$sql = "UPDATE scheduling_fish SET 
			fish_name = '" . $_POST['fish_name'] . "',
			fish_detail = '" . $_POST['fish_detail'] . "',
			fish_price = '" . $_POST['fish_price'] . "',
			fish_image = '" . $location . "',
			fish_familia = '" . $_POST['fish_familia'] . "'
			WHERE id = '" . $_POST['id'] . "' ";

	$query = mysqli_query($conn, $sql);

	if ($query) {
		echo '<script language="javascript">';
		echo 'alert("Fish details is saved!"); window.location = "dashboard.php";';
		echo '</script>';
	}
} else {
	if (empty($filename)) {
		$sql = "UPDATE scheduling_fish SET 
			fish_name = '" . $_POST['fish_name'] . "',
			fish_detail = '" . $_POST['fish_detail'] . "',
			fish_price = '" . $_POST['fish_price'] . "',
			fish_familia = '" . $_POST['fish_familia'] . "'
			WHERE id = '" . $_POST['id'] . "'
		";

		$query = mysqli_query($conn, $sql);

		if ($query) {
			echo '<script language="javascript">';
			echo 'alert("Fish details is saved!"); window.location = "dashboard.php";';
			echo '</script>';
		}
	} else {
		echo '<script language="javascript">';
		echo 'alert("Error to upload file"); window.location = "dashboard.php";';
		echo '</script>';
	}
}
mysqli_close($conn);
?>