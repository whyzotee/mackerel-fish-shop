<?php
session_start();

if ($_SESSION['test_id'] == "") {
  echo "กรุณากรอกเข้าสู่ระบบ!";
  exit();
}

require_once('../config/config.php');
$sql = "SELECT * FROM member WHERE test_id = '" . $_SESSION['test_id'] . "' ";
$query = mysqli_query($conn, $sql);
$result = mysqli_fetch_array($query, MYSQLI_ASSOC);
?>

<html>

<head>
  <title>ทดสอบ แก้ไขข้อมูลผู้ใช้</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>

<body>
  <form name="form1" method="post" action="save_profile.php">
    ฟอร์มแก้ไขข้อมูลผู้ใช้
    <br>
    <table width="400" border="1" style="width: 400px">
      <tbody>
        <tr>
          <td width="125"> &nbsp;ลำดับ :</td>
          <td width="180">
            <?php echo $result["test_id"]; ?>
          </td>
        </tr>
        <tr>
          <td> &nbsp;ชื่อผู้ใช้ :</td>
          <td>
            <?php echo $result["test_user"]; ?>
          </td>
        </tr>
        <tr>
          <td> &nbsp;รหัสผ่าน :</td>
          <td><input name="txtPassword" type="password" id="txtPassword" value="<?php echo $result["test_pass"]; ?>">
          </td>
        </tr>
        <tr>
          <td> &nbsp;ยืนยัน รหัสผ่าน :</td>
          <td><input name="txtConPassword" type="password" id="txtConPassword"
              value="<?php echo $result["test_pass"]; ?>"></td>
        </tr>
        <tr>
          <td>&nbsp;ชื่อ :</td>
          <td>
            <?php echo $result["test_name"]; ?>
          </td>
        </tr>
        <tr>
          <td>&nbsp;นามสกุล :</td>
          <td>
            <?php echo $result["test_lname"]; ?>
          </td>
        </tr>
        <tr>
          <td> &nbsp;สถานะ :</td>
          <td>
            <?php echo $result["test_status"]; ?>
          </td>
        </tr>
      </tbody>
    </table>
    <br>
    <input type="submit" name="Submit" value="บันทึก">
  </form>
</body>

</html>