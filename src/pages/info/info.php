<?php
if (!isset($_SESSION))
    session_start();

if ($_SESSION['local_id'] == "") {
    echo "กรุณากรอกเข้าสู่ระบบ!";
    exit();
}

require_once('../../core/config.php');
$sql = "SELECT * FROM member WHERE id = '" . $_SESSION['local_id'] . "' ";
$query = mysqli_query($conn, $sql);
$result = mysqli_fetch_array($query, MYSQLI_ASSOC);
?>

<html>

<head>
    <title>ทดสอบระบบ
        <?php echo $result["local_status"]; ?>
    </title>
</head>

<body>
    ยินดีต้อนรับ สมาชิก
    <?php echo $result["role"]; ?><br><br>
    <table border="1" style="width: 300px">
        <tbody>
            <tr>
                <td width="85"> &nbsp;ชื่อผู้ใช้ :</td>
                <td width="195">
                    <?php echo $result["username"]; ?>
                </td>
            </tr>
            <tr>
                <td> &nbsp;ชื่อ :</td>
                <td>
                    <?php echo $result["name"]; ?>
                </td>
            </tr>
            <tr>
                <td> &nbsp;นามสกุล :</td>
                <td>
                    <?php echo $result["lastname"]; ?>
                </td>
            </tr>
        </tbody>
    </table>
    <br>
    <a href="../../editprofile/edit_profile.php">แก้ไขข้อมูลผู้ใช้</a><br>
    <br>
    <a href="../auth/logout.php">ออกจากระบบ</a>
</body>

</html>