<?php
session_start();
if ($_SESSION['local_id'] == "") {
  echo "login first!!!";
  exit();
}

if ($_SESSION['local_status'] != "EMPLOYEE") {
  echo "you not employee";
  exit();
}


require_once('../../core/config.php');
$member = "SELECT * FROM member WHERE id = '" . $_SESSION['local_id'] . "' ";
$queryMem = mysqli_query($conn, $member);
$memberData = mysqli_fetch_array($queryMem, MYSQLI_ASSOC);

$editAddid = null;
if (isset($_GET["add_id"])) {
  $editAddid = $_GET["add_id"];
}
$sql = "SELECT * FROM scheduling_fish WHERE id = '" . $editAddid . "' ";
$query = mysqli_query($conn, $sql);
$row_edit = mysqli_fetch_array($query, MYSQLI_ASSOC);
?>

<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
  <link rel="icon" href="../../../assets/favicon.ico" />
  <link rel="stylesheet" href="../../../styles.css">
  <title>Add fish</title>
</head>

<body>
  <main>
    <nav class="flex justify-between p-4">
      <a href="dashboard.php" class="flex gap-4 items-center cursor-pointer">
        <img src="../../../assets/images/logo/logo_1.0.png" alt="logo" class="h-12" />
        <h1 class="text-xl">Mackerel Fish Shop
          <?php echo $memberData["role"]; ?>
        </h1>
      </a>
      <div class="relative inline-block">
        <button onclick="myFunction()" class="dropbtn flex gap-2 items-center px-8">
          <img src="<?php echo $memberData["user_img"]; ?>" alt="profile_pic"
            onerror="this.onerror=null;this.src='../../../assets/images/error_profile.png';"
            class="h-10 w-10 rounded-full pointer-events-none">
          <span class="font-medium text-[#303030] pointer-events-none">
            <?php echo $memberData["username"]; ?>
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

    <form action="add_fish_db.php" enctype="multipart/form-data" name="formedit" method="POST"
      class="h-[80vh] w-full flex flex-col gap-4 justify-center items-center text-[#303030]">
      <span class="text-xl">Add fish</span>
      <hr>
      <div class="flex w-96">
        <p class="w-48">Name</p>
        <input type="text" name="fish_name" class="w-full border-2 rounded-lg p-2">
      </div>
      <div class="flex w-96">
        <p class="w-48">Details</p>
        <textarea type="text" name="fish_detail" class="w-full border-2 rounded-lg p-2" rows="3"></textarea>
      </div>

      <div class="flex w-96">
        <p class="w-48">Image</p>
        <input type="file" id="fish_image" name="fish_image" class="border-2 border-gray-600 rounded-lg p-2">
      </div>
      <div class="flex w-96">
        <p class="w-48">Breed</p>
        <input type="text" name="fish_familia" class="w-full border-2 rounded-lg p-2">
      </div>
      <div class="flex w-96">
        <p class="w-48">Price</p>
        <input type="text" name="fish_price" class="w-full border-2 rounded-lg p-2">
      </div>
      <div class="flex gap-4">
        <button type="submit" name="submit"
          class="bg-red-400 text-white hover:bg-red-500 rounded-lg p-2 transition-colors">เพิ่มสินค้า</button>
        <a href="dashboard.php"
          class="border-2 border-red-400 text-red-400 rounded-lg p-2 hover:bg-red-400 hover:text-white transition-colors">ย้อนกลับ
        </a>
      </div>
    </form>
  </main>
</body>

</html>