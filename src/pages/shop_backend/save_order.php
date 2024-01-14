<?php
require_once('../../core/config.php');

if (
  $_SERVER['REQUEST_METHOD'] === 'POST' &&
  isset($_POST['order_status'], $_POST['id']) &&
  is_array($_POST['order_status']) &&
  is_array($_POST['id'])
) {
  $ids = array_map('intval', $_POST['id']);
  $statuses = array_map('intval', $_POST['order_status']);

  $updateValues = '';
  foreach ($ids as $id) {
    $status = $statuses[$id] ?? 0;
    $updateValues .= "WHEN $id THEN $status ";
  }

  $updateValues = rtrim($updateValues);

  $sql = "UPDATE order_fish SET order_status = CASE id $updateValues END WHERE id IN (" . implode(',', $ids) . ")";
  $query = mysqli_query($conn, $sql);

  if ($query) {
    echo '<script language="javascript">';
    echo 'alert("Order has been updated!"); window.location = "dashboard.php";';
    echo '</script>';
  } else {
    echo '<script language="javascript">';
    echo 'alert("Order has been error to updated!"); window.location = "dashboard.php";';
    echo '</script>';
  }
} else {
  echo '<script language="javascript">';
  echo 'alert("Invalid data provided!"); window.location = "dashboard.php";';
  echo '</script>';
}

mysqli_close($conn);
?>