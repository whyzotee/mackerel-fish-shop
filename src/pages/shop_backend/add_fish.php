<html>

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title>เพิ่มรายการคอร์สอบรม</title>
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
    integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>

<body>

  <div class="container">
    <div class="row">
      <div class="col-md-3"></div>
      <div class="col-md-6"> <br>
        <h4 align="center"> ฟอร์ม เพิ่มรายการปลา</h4>
        <hr>
        <form action="add_fish_db.php" method="POST" enctype="multipart/form-data" name="addprd"
          class="form-horizontal">

          <div class="form-group">
            <div class="col-sm-12">
              <p>ลำดับ</p>
              <input type="text" name="add_id" id="add_id" class="form-control">
            </div>
          </div>

          <div class="form-group">
            <div class="col-sm-12">
              <p>ชื่อคอร์สอบรม</p>
              <input type="text" name="add_course" id="add_course" class="form-control">
            </div>
          </div>

          <div class="form-group">
            <div class="col-sm-12">
              <p> รายละเอียดคอร์สอบรม </p>
              <textarea name="add_detail" id="add_detail" class="form-control" rows="3"></textarea>
            </div>
          </div>

          <div class="form-group">
            <div class="col-sm-12">
              <p> ภาพสินค้า </p>
              <input type="file" name="add_picture" id="add_picture" class="form-control">
            </div>
          </div>

          <div class="form-group">
            <div class="col-sm-12">
              <p>ระยะเวลาดำเนินการ</p>
              <input type="text" name="add_period" id="add_period" class="form-control">
            </div>
          </div>

          <div class="form-group">
            <div class="col-sm-12">
              <p>สถานที่จัด</p>
              <input type="text" name="add_locality" id="add_locality" class="form-control">
            </div>
          </div>

          <div class="form-group">
            <div class="col-sm-12">
              <p>จำนวนผู้อบรม</p>
              <input type="text" name="add_amount" id="add_amount" class="form-control" required
                placeholder="จำนวนผู้อบรม">
            </div>
          </div>

          <div class="form-group">
            <div class="col-sm-12">
              <p> ราคาคอร์สอบรม (บาท) </p>
              <input type="text" name="add_expense" id="add_expense" class="form-control">
            </div>
          </div>

          <button type="submit" class="btn btn-primary" name="btnadd">
            <span class="glyphicon glyphicon-plus"></span> เพิ่มคอร์ส </button>

          <a href="scheduling_course.php" class="btn btn-danger  active" role="button" aria-pressed="true"><span
              class="glyphicon glyphicon-backward" aria-hidden="true"></span> ย้อนกลับ</a>

        </form>
      </div>
    </div>
  </div>
  <p align="center"></p>

  <?php
  mysqli_close($conn);
  ?>

</body>

</html>