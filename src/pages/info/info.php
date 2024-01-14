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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../../../assets/favicon.ico" />
    <link rel="stylesheet" href="../../../styles.css">
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
    <title>จัดการ
        <?php echo $result["role"]; ?>
    </title>
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
                <img src="<?php echo $result["user_img"]; ?> " alt="profile_pic"
                    onerror="this.onerror=null;this.src='../../../assets/images/error_profile.png';"
                    class="h-10 w-10 rounded-full pointer-events-none bg-cover object-cover">
                <span class="font-medium text-[#303030] pointer-events-none">
                    <?php echo $result["username"]; ?>
                </span>
            </button>
            <div id="myDropdown"
                class="dropdown-content hidden absolute mt-4 bg-red-400 rounded-lg text-white flex-col w-full p-2 text-base">
                <a href="../../../" class="hover:bg-white hover:text-red-400 rounded-lg p-2 transition-colors">
                    กลับหน้าหลัก
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
    <main class="flex p-8 text-[#303030]">
        <div class="profile_card">
            <h1 class="text-xl">ยินดีต้อนรับคุณ
                <?php echo $result["name"]; ?>
            </h1>
            <div class="flex flex-col gap-4 items-center lg:flex-row">
                <img src="<?php echo $result["user_img"]; ?>"
                    onerror="this.onerror=null;this.src='../../../assets/images/error_profile.png';" alt="profile_pic"
                    class="h-24 w-24 rounded-full">
                <div class="flex flex-col">
                    <span class="w-f">Username:
                        <?php echo $result["username"]; ?>
                    </span>
                    <span>name:
                        <?php echo $result["name"]; ?>
                    </span>
                    <span>Lastname:
                        <?php echo $result["lastname"]; ?>
                    </span>
                </div>
            </div>


            <div class="flex gap-4 mt-4">
                <a href="../editprofile/edit_profile.php"
                    class="h-fit bg-red-400 rounded-lg p-2 hover:bg-red-500 text-white transition-colors">
                    แก้ไขข้อมูลผู้ใช้
                </a><br>
                <br>
                <a href="../auth/logout.php"
                    class="h-fit border-2 border-red-400 text-red-400 rounded-lg p-2 hover:bg-red-400 hover:text-white transition-colors">
                    ออกจากระบบ
                </a>
            </div>
        </div>
    </main>
</body>

</html>