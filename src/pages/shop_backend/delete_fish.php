<?php

require_once('../../core/config.php');

$deleteAddid = $_GET["add_id"];
$sql = "DELETE FROM scheduling_fish WHERE id = '" . $deleteAddid . "' ";

$query = mysqli_query($conn, $sql);

if (mysqli_affected_rows($conn)) {
    echo '<script language="javascript">';
    echo 'alert("Suscess to delete product!"); window.location = "dashboard.php";';
    echo '</script>';
}
mysqli_close($conn);
?>