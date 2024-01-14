<?php
session_start();

if ($_SESSION['local_id'] == "") {
  echo "login first!!!";
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
  <title>Edit profile</title>
</head>

<body>
  <nav class="flex justify-between p-4">
    <a href="#" class="flex gap-4 items-center cursor-pointer">
      <img src="../../../assets/images/logo/logo_1.0.png" alt="logo" class="h-12" />
      <h1 class="text-xl">Mackerel Fish Shop
        <?php echo $result["role"]; ?>
      </h1>
    </a>
    <div class="relative inline-block">
      <button onclick="myFunction()" class="dropbtn flex gap-2 items-center px-8">
        <img src="<?php echo $result["user_img"]; ?>" alt="profile_pic"
          onerror="this.onerror=null;this.src='../../../assets/images/error_profile.png';"
          class="h-10 w-10 rounded-full pointer-events-none">
        <span class="font-medium text-[#303030] pointer-events-none">
          <?php echo $result["username"]; ?>
        </span>
      </button>
      <div id="myDropdown"
        class="dropdown-content hidden absolute mt-4 bg-red-400 rounded-lg text-white flex-col w-full p-2 text-base">
        <a href="../info/info.php" class="hover:bg-white hover:text-red-400 rounded-lg p-2 transition-colors">
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
  <form name="form1" method="post" action="save_profile.php"
    class="h-[80vh] w-full flex flex-col gap-4 justify-center items-center text-[#303030]">
    <span class="text-xl">Edit profile</span>
    <div class="m-auto">
      <img src="<?php echo $result["user_img"]; ?>"
        onerror="this.onerror=null;this.src='../../../assets/images/error_profile.png';" alt="userProfile"
        class="h-32 rounded-full">
    </div>
    <div class="flex w-96">
      <h1 class="w-56">uid :</h1>
      <h1 class="w-full">
        <?php echo $result["id"]; ?>
      </h1>
    </div>
    <div class="flex w-96">
      <h1 class="w-56">username :</h1>
      <h1 class="w-full">
        <?php echo $result["username"]; ?>
      </h1>
    </div>
    <div class="flex w-96">
      <h1 class="w-[14.75rem]">password :</h1>
      <input name="txtPassword" type="password" id="txtPassword" class="w-full rounded-lg"
        value="<?php echo $result["password"]; ?>">
    </div>
    <div class="flex gap-2 w-96">
      <h1 class="w-56">confirm password :</h1>
      <input name="txtConPassword" type="password" id="txtConPassword" class="w-full rounded-lg"
        value="<?php echo $result["password"]; ?>">
    </div>
    <div class="flex w-96">
      <h1 class="w-56">name :</h1>
      <h1 class="w-full">
        <?php echo $result["name"]; ?>
      </h1>
    </div>
    <div class="flex w-96">
      <h1 class="w-56">lastname :</h1>
      <h1 class="w-full">
        <?php echo $result["lastname"]; ?>
      </h1>
    </div>

    <div class="flex w-96">
      <h1 class="w-56">role :</h1>
      <h1 class="w-full">
        <?php echo $result["role"]; ?>
      </h1>
    </div>
    <div class="flex gap-4">
      <input type="submit" name="Submit" value="บันทึก"
        class="bg-red-400 text-white hover:bg-red-500 rounded-lg p-2 transition-colors">
      <a href="../info/info.php"
        class="border-2 border-red-400 text-red-400 rounded-lg p-2 hover:bg-red-400 hover:text-white transition-colors">
        ย้อนกลับ
      </a>
    </div>
  </form>
</body>

</html>