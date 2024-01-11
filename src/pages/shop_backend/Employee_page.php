<?php
session_start();

if ($_SESSION['test_id'] == "") {
  echo "กรุณากรอกชื่อผู้ใช้!";
  exit();
}

if ($_SESSION['status'] != "EMPLOYEE") {
  echo "หน้านี้สำหรับ ผู้ดูแลระบบ เท่านั้น!";
  exit();
}
require_once('../../config/config.php');
$sql = "SELECT * FROM member WHERE test_id = '" . $_SESSION['test_id'] . "' ";
$query = mysqli_query($conn, $sql);
$result = mysqli_fetch_array($query, MYSQLI_ASSOC);
?>

<html>

<head>
  <title>ผู้ดูแลระบบ การจัดการคอร์สอบรม</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf8">
  <link rel="stylesheet" href="style.css">
</head>

<body>

  <?php include('Employee.php'); ?>

  <!--menu start-->
  <section id="menu">
    <div class="container">
      <div class="menubar">
        <nav class="navbar navbar-default">
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <a href="scheduling_course.php">ปรับปรุงคอร์สอบรม</a>
            <br><a href="view_reserve.php">ข้อมูลการจองคอร์สอบรม</a>
          </div>
        </nav>
      </div>
    </div>
  </section>
  <!--menu end-->

</body>

</html>

<?php
mysqli_close($conn);
?>