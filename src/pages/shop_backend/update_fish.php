<?php
session_start();

if ($_SESSION['test_id'] == "") {
  echo "กรุณากรอกชื่อผู้ใช้!";
  exit();
}

if ($_SESSION['test_status'] != "EMPLOYEE") {
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
  <meta http-equiv="Content-Type" content="text/html; charset=utf8">
  <title>ผู้ดูแลระบบ การจัดการคอร์สอบรม</title>
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
            <br><a>ข้อมูลการจองคอร์สอบรม</a>
          </div>
        </nav>
      </div>
    </div>
  </section>
  <!--menu end-->


  <!--2 ปรับปรุงการจองคอร์ส-->
  <div class="container">
    <h3>ปรับปรุงข้อมูลการจองคอร์สอบรม</h3><br>
    <!-- start -->
    <?php
    // เรียกใช้ไฟล์ conn.php สำหรับเชื่อมต่อฐานข้อมูล
    require_once('../../config/config.php');
    $sql = "SELECT * FROM BookCourse";
    $result = $conn->query($sql);
    ?>

    <p align="right"> <a href="view_reserve.php" class="btn btn-success"><span class="glyphicon glyphicon-plus">
          <font color="blue">ข้อมูลการจองคอร์สอบรม</font>
        </span></a> </p>

    <div class="container">
      <form action="save_update.php" method="POST" name="form1">
        <table>
          <thead>
            <tr>
              <td width="5%">ลำดับ</td>
              <td width="25%">ชื่อคอร์สอบรม</td>
              <td width="15%">ช่วงวันที่เข้าอบรม</td>
              <td width="10%">จำนวนผู้เข้าอบรม</td>
              <td width="15%">ชื่อผู้จอง</td>
              <td width="20%">อีเมล</td>
              <td width="10%">สถานะการจอง</td>
              <td width="5%"></td>
            </tr>
          </thead>
          <tbody>
            <!-- ข้อมูลที่เราจะทำการ fetch จากฐานข้อมูล -->
            <?php while ($row = $result->fetch_assoc()): ?>
              <tr>
                <td>
                  <?php echo $row['id']; ?>
                </td>
                <td class="name">
                  <?php echo $row['add_name']; ?>
                </td>
                <td class="name">
                  <?php echo $row['add_date']; ?>
                </td>
                <td class="name">
                  <?php echo $row['add_people']; ?>
                </td>
                <td class="name">
                  <?php echo $row['add_book']; ?>
                </td>
                <td class="name">
                  <?php echo $row['add_email']; ?>
                </td>

                <td class="name">
                  <select name="course_status">
                    <option value="<?php echo $row['course_status']; ?>">
                      <?php echo $row['course_status']; ?>
                    </option>
                    <option value="course_status">รออนุมัติ</option>
                    <option value="course_status">อนุมัติ</option>
                  </select>
                </td>

                <td>
                  <p>
                    <button type="submit" class="btn btn-primary" name="btnadd"><span
                        class="glyphicon glyphicon-plus"></span>
                      <font color="blue"> บันทึก </font>
                    </button>
                  </p>
                </td>
              </tr>
            <?php endwhile ?>
          </tbody>
        </table>
      </form>
    </div>

  </div>
  <!-- สิ้นสุด 2 ปรับปรุงการจองคอร์ส -->

</body>

</html>

<?php
mysqli_close($conn);
?>