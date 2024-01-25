<?php
session_start();

if ($_SESSION['local_id'] == "") {
  echo "กรุณากรอกชื่อผู้ใช้!";
  exit();
}

if ($_SESSION['local_status'] != "EMPLOYEE") {
  echo "หน้านี้สำหรับ ผู้ดูแลระบบ เท่านั้น!";
  exit();
}
require_once('../../core/config.php');
$sql = "SELECT * FROM member WHERE id = '" . $_SESSION['local_id'] . "' ";
$query = mysqli_query($conn, $sql);
$result = mysqli_fetch_array($query, MYSQLI_ASSOC);
?>

<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
  <link rel="icon" href="../../../assets/favicon.ico" />
  <link rel="stylesheet" href="../../../styles.css">
  <title>Order to review</title>
</head>

<body>

  <nav class="flex justify-between p-4">
    <a href="dashboard.php" class="flex gap-4 items-center cursor-pointer">
      <img src="../../../assets/images/logo/logo_1.0.png" alt="logo" class="h-12" />
      <h1 class="text-xl">Mackerel Fish Shop
        <?php echo $result["role"]; ?>
      </h1>
    </a>
    <div class="relative inline-block">
      <button onclick="myFunction()" class="dropbtn flex gap-2 items-center px-8">
        <img src="<?php echo $result["user_img"]; ?>" alt="profile_pic"
          class="h-10 w-10 rounded-full pointer-events-none">
        <span class="font-medium text-[#303030] pointer-events-none">
          <?php echo $result["username"]; ?>
        </span>
      </button>
      <div id="myDropdown"
        class="dropdown-content hidden absolute mt-4 bg-red-400 rounded-lg text-white flex-col w-full p-2 text-base">
        <a href="dashboard.php" class="hover:bg-white hover:text-red-400 rounded-lg p-2 transition-colors">
          ย้อนกลับ
        </a>
        <a href="../editprofile/edit_profile.php"
          class="hover:bg-white hover:text-red-400 rounded-lg p-2 transition-colors">
          แก้ไขข้อมูล
        </a>
        <a href="../auth/logout.php" class="hover:bg-white hover:text-red-400 rounded-lg p-2 transition-colors">
          ออกจากระบบ
        </a>
      </div>
    </div>

    <script>
      function myFunction() {
        document.getElementById("myDropdown").classList.toggle("hidden");
        document.getElementById("myDropdown").classList.toggle("flex");
      }
      window.onclick = function (event) {
        if (!event.target.matches('.dropbtn')) {
          var dropdowns = document.getElementsByClassName("dropdown-content");
          var i;
          for (i = 0; i < dropdowns.length; i++) {
            var openDropdown = dropdowns[i];
            if (!openDropdown.classList.contains('hidden')) {
              openDropdown.classList.remove('flex');
              openDropdown.classList.add('hidden');
            }
          }
        }
      }
    </script>
  </nav>

  <main class="max-w-7xl flex flex-col justify-center items-center m-auto">
    <?php
    require_once('../../core/config.php');
    $sql = "SELECT * FROM order_fish";
    $result = $conn->query($sql);
    ?>

    <span class="w-full text-xl text-right">Order waiting for review</span>
    <form action="save_order.php" method="POST" name="form1" class="w-full mt-4 flex flex-col justify-center">
      <table class="w-full bg-red-50 rounded-xl">
        <thead class="text-white bg-red-400">
          <tr class="justify-center items-center">
            <th class="text-center rounded-l-xl p-2">ID</th>
            <th class="text-center">Name</th>
            <th class="text-center">Price</th>
            <th class="text-center">Order Date</th>
            <th class="text-center">Order by</th>
            <th class="text-center rounded-r-xl">Is Sale</th>
          </tr>
        </thead>
        <tbody class="text-[#303030]">
          <?php while ($row_showproduct = $result->fetch_assoc()): ?>
            <tr>
              <td class="text-center">
                <input type="hidden" name="id[]" value="<?php echo $row_showproduct['id']; ?>" />
                <?php echo $row_showproduct['id']; ?>
              </td>

              <td class="text-center">
                <?php echo $row_showproduct['fish_name']; ?>
              </td>

              <td class="text-center">
                <?php echo $row_showproduct['fish_price']; ?>
              </td>

              <td class="text-center">
                <?php echo $row_showproduct['order_date']; ?>
              </td>

              <td class="text-center">
                <?php echo $row_showproduct['order_by']; ?>
              </td>

              <td class="flex justify-center items-center p-3">
                <input type="hidden" name="order_status[<?php echo $row_showproduct['id']; ?>]" value="0">
                <input
                  class="easycheckbox w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                  name="order_status[<?php echo $row_showproduct['id']; ?>]" type="checkbox" value="1" <?php if ($row_showproduct['order_status'])
                       echo "checked" ?>>
                </td>
              </tr>
          <?php endwhile ?>
        </tbody>
      </table>

      <div class="flex gap-4 mt-8 self-center">
        <button type="submit" class="w-fit bg-red-400 rounded-lg p-2 hover:bg-red-500 text-white transition-colors">
          อัพเดทออเดอร์
        </button>
        <a href="dashboard.php"
          class="w-fit border-2 border-red-400 text-red-400 rounded-lg p-2 hover:bg-red-400 hover:text-white transition-colors">
          ย้อนกลับ
        </a>
      </div>
    </form>
  </main>
</body>

</html>

<?php
mysqli_close($conn);
?>