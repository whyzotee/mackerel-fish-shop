<?php
if (!isset($_SESSION))
    session_start();

if ($_SESSION['local_id'] == "") {
    echo "กรุณากรอกเข้าสู่ระบบ!";
    exit();
}

if ($_SESSION['local_status'] != "EMPLOYEE") {
    echo "You not employee";
    exit();
}

require_once('../../core/config.php');
$sql = "SELECT * FROM member WHERE id = '" . $_SESSION['local_id'] . "' ";
$query = mysqli_query($conn, $sql);
$result = mysqli_fetch_array($query, MYSQLI_ASSOC);

$select_schedfish = "SELECT * FROM scheduling_fish";
$query_data = $conn->query($select_schedfish);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
    <link rel="icon" href="../../../assets/favicon.ico" />
    <link rel="stylesheet" href="../../../styles.css">
    <title>Backend</title>
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
                    class="h-10 w-10 rounded-full pointer-events-none">
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
    <main class="flex flex-col p-8 text-[#303030]">
        <h1 class="text-xl">ยินดีต้อนรับคุณ
            <?php echo $result["name"]; ?>
        </h1>
        <div class="flex flex-col gap-4 items-center lg:flex-row">
            <img src="<?php echo $result["user_img"]; ?>" alt="profile_pic" class="h-24 w-24 rounded-full">
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
            <br>
            <div class="lg:ml-24 flex flex-col bg-red-400 p-4 text-white rounded-lg">
                <span class="text-xl font-semibold">ขายแล้ว : 0 ชิ้น</span>
                <span>รายได้ทั้งหมด : 0 บาท</span>
                <span>เป้าหมาย</span>
                <div class="flex justify-between">
                    <span>0%</span>
                    <span>50%</span>
                    <span>100%</span>
                </div>
                <div class="w-96 bg-gray-200 rounded-full h-2.5 dark:bg-gray-700">
                    <div class="bg-white h-2.5 rounded-full" style="width: 50%"></div>
                </div>
            </div>
        </div>
        </div>
        <div class="flex flex-col justify-center">
            <div class="flex justify-between py-8">
                <lable class="text-xl">Mackerel fish table</lable>
                <a href="add_fish.php" class="flex bg-blue-400 text-white p-2 rounded-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                    </svg>
                    เพิ่มข้อมูล
                </a>
            </div>
            <table class="w-full bg-red-50 rounded-xl">
                <thead class="text-white bg-red-400">
                    <tr class="justify-center items-center">
                        <th class="w-[5%] text-center rounded-l-xl p-2">ID</th>
                        <th class="w-[10%] text-center">Name</th>
                        <th class="w-[30%] text-center">Details</th>
                        <th class="w-[10%] text-center">Breed</th>
                        <th class="w-[10%] text-center">Preview</th>
                        <th class="w-[5%] text-center">Price</th>
                        <th class="w-[10%] text-center">เเก้ไข</th>
                        <th class="w-[10%] text-center rounded-r-xl">ลบ</th>
                    </tr>
                </thead>
                <tbody class="text-[#303030]">
                    <?php while ($row_showproduct = $query_data->fetch_assoc()): ?>
                        <tr>
                            <td class="text-center">
                                <?php echo $row_showproduct['id']; ?>
                            </td>

                            <td class="text-center">
                                <?php echo $row_showproduct['fish_name']; ?>
                            </td>

                            <td class="line-clamp-3">
                                <?php echo $row_showproduct['fish_detail']; ?>
                            </td>

                            <td class="text-center">
                                <?php echo $row_showproduct['fish_familia']; ?>
                            </td>

                            <td class="m-auto">
                                <img src="<?php echo $row_showproduct["fish_image"]; ?>" alt="img"
                                    class="h-24 w-full bg-cover object-cover rounded-lg bg-white">
                            </td>

                            <td class="text-center">
                                <?php echo $row_showproduct['fish_price']; ?>
                            </td>

                            <td class="text-center">
                                <a href="edit_fish.php?add_id=<?php echo $row_showproduct["id"]; ?>"
                                    class="w-fit bg-red-400 rounded-lg p-2 hover:bg-red-500 text-white transition-colors">
                                    แก้ไขข้อมูล
                                </a>
                            </td>

                            <td class="text-center">
                                <a href="JavaScript:if(confirm('คุณต้องการลบข้อมูลใช่หรือไม่...?')==true){window.location='delete_fish.php?add_id=<?php echo $row_showproduct["id"]; ?>';}"
                                    class="w-fit text-red-400 rounded-lg p-2 hover:bg-red-400 hover:text-white transition-colors">
                                    ลบข้อมูล
                                </a>
                            </td>
                        </tr>
                    <?php endwhile ?>
                </tbody>
            </table>
        </div>
    </main>
</body>

</html>