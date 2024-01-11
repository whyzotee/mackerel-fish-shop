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

if ($result["role"] == "EMPLOYEE") {
    header("location:../shop_backend/dashboard.php");
}
mysqli_close($conn);
?>

<html>

<head>
    <link rel="icon" href="../../../assets/favicon.ico" />
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
    <title>ทดสอบระบบ
        <?php echo $result["local_status"]; ?>
    </title>
</head>

<body>
    <nav class="flex justify-between p-4">
        <a href="#" class="flex gap-4 items-center cursor-pointer">
            <img src="../../../assets/images/logo/logo_1.0.png" alt="logo" class="h-12" />
            <h1 class="text-xl">Mackerel Fish Shop Bankend</h1>
        </a>
        <a href="src/pages/info/shop.php"
            class="border-2 border-red-400 text-red-400 rounded-lg p-2 hover:bg-red-400 hover:text-white transition-colors">
            Home
        </a>
    </nav>
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
    <a href="src/pages/info/shop.php" class="bg-red-400  rounded-lg p-2 hover:bg-red-500 text-white transition-colors">
        แก้ไขข้อมูลผู้ใช้
    </a>
    <br>
    <a href="../../editprofile/edit_profile.php"></a><br>
    <br>
    <a href="src/pages/info/shop.php"
        class="border-2 border-red-400 text-red-400 rounded-lg p-2 hover:bg-red-400 hover:text-white transition-colors">
        ออกจากระบบ
    </a>
</body>

</html>