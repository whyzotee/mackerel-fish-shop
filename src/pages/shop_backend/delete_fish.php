<html>

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title></title>
</head>

<body>

  <?php

  require_once('../../config/config.php');

  $deleteAddid = $_GET["add_id"];
  $sql = "DELETE FROM scheduling_fish WHERE add_id = '" . $deleteAddid . "' ";

  $query = mysqli_query($conn, $sql);

  if (mysqli_affected_rows($conn)) {
    echo "ลบข้อมูลดังกล่าวออกจากระบบ เสร็จสมบูรณ์...";
    echo "<meta http-equiv=\"Refresh\" content=\"1; URL=https://waraporn.cmtc.ac.th/testTrainingReserve/scheduling_course.php\">";
    // echo "<meta http-equiv=\"Refresh\" content=\"1; URL=https://waraporn.cmtc.ac.th/testTrainingReserve/scheduling_course.php\">";
  }
  mysqli_close($conn);
  ?>

</body>

</html>