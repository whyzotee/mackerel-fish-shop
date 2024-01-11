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

// แสดงรายการคอร์สอบรม
$sql2 = "SELECT * FROM scheduling_fish";
$result2 = $conn->query($sql2);
?>


<html>

<head>
  <title>Data Edit</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf8">
  <link rel="stylesheet" href="../../../styles.css">
  <link rel="icon" href="../../../assets/favicon.ico" />
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
  <?php include('Employee.php'); ?>
  <main class="flex flex-col justify-center">
    <div class="flex justify-between px-8 pb-8">
      <lable class="text-3xl ">Table จัดการฐานข้อมูล</lable>
      <a href="add_fish.php" class="flex bg-blue-400 text-white p-2 rounded-lg">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
          class="w-6 h-6">
          <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
        </svg>
        เพิ่มข้อมูล
      </a>
    </div>
    <table class="w-full">
      <thead class="text-[#252525]">
        <tr class="justify-center items-center">
          <td class="w-[5%] text-center">ID</td>
          <td class="w-[10%] text-center">Name</td>
          <td class="w-[30%] text-center">Details</td>
          <td class="w-[10%] text-center">Breed</td>
          <td class="w-[10%] text-center">Preview</td>
          <td class="w-[5%] text-center">Price</td>
          <td class="w-[10%] text-center">เเก้ไข</td>
          <td class="w-[10%] text-center">ลบ</td>
        </tr>
      </thead>
      <tbody class="text-[#303030]">
        <?php while ($row_showproduct = $result2->fetch_assoc()): ?>
          <tr>
            <td class="text-center">
              <?php echo $row_showproduct['add_id']; ?>
            </td>

            <td align="center">
              <?php echo $row_showproduct['fish_name']; ?>
            </td>

            <td class="line-clamp-3">
              <?php echo $row_showproduct['fish_detail']; ?>
            </td>

            <td align="center">
              <?php echo $row_showproduct['fish_familia']; ?>
            </td>

            <td align="center">
              <img src="<?php echo $row_showproduct["fish_image"]; ?>" alt="img"
                class="h-24 bg-cover object-cover rounded-lg">
            </td>

            <td align="center">
              <?php echo $row_showproduct['fish_price']; ?>
            </td>

            <td align="center">
              <a href="edit_fish.php?add_id=<?php echo $row_showproduct["add_id"]; ?>"
                class="bg-blue-400 p-2 rounded-lg text-white">
                แก้ไขข้อมูล
              </a>
            </td>

            <td align="center">
              <a href="JavaScript:if(confirm('คุณต้องการลบข้อมูลใช่หรือไม่...?')==true){window.location='delete_fish.php?add_id=<?php echo $row_showproduct["add_id"]; ?>';}"
                class="bg-red-400 p-2 rounded-lg text-white">
                ลบข้อมูล
              </a>
            </td>
          </tr>
        <?php endwhile ?>
      </tbody>
    </table>
  </main>
</body>

</html>