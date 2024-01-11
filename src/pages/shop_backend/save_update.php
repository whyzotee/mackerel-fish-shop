<html>

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title></title>
</head>

<body>
  <?php
  require_once('../../config/config.php');
  $sql = "UPDATE BookCourse SET 
      course_status = '" . $_POST['course_status'] . "'
      WHERE id = '" . $_POST['id'] . "' ";

  $query = mysqli_query($conn, $sql);

  if ($query) {
    echo "แก้ไขสถานะการจองคอร์ส เสร็จสมบูรณ์...";
    echo "<meta http-equiv=\"Refresh\" content=\"1; URL=https://waraporn.cmtc.ac.th/testTrainingReserve/scheduling_course.php\">";
    // echo "<meta http-equiv=\"Refresh\" content=\"1; URL=https://waraporn.cmtc.ac.th/testTrainingReserve/view_reserve.php\">";
  }
  mysqli_close($conn);

  ?>

</body>

</html>