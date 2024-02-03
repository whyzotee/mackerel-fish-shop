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

$sql_order = "SELECT * FROM `order_fish` WHERE order_id = '" . $result["id"] . "'";
$query_order = mysqli_query($conn, $sql_order);

$all_cost = 0;

mysqli_close($conn);
?>

<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../../../assets/favicon.ico" />
    <link rel="stylesheet" href="../../../styles.css">
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>จัดการ
        <?php echo $result["role"]; ?>
    </title>
</head>

<body>
    <div id="modal001" class="absolute h-screen w-full bg-black bg-opacity-50 z-50 opacity-0 invisible transition-all">
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 flex flex-col bg-white p-4 rounded-lg">
            <span class="text-xl">คุณต้องการยกเลิกคำสั่งซื้อ?</span>
            <span id="product_name" class="text-gray-600">รายการที่ยกเลิก: </span>
            <span id="product_price" class="text-gray-600">ราคา: </span>
            <span id="order_date" class="text-gray-600">สั่งเมื่อ: </span>
            <span id="con_remove" class="text-gray-600">คุณต้องการยกเลิกรายการเลขที่ 1 ใช่หรือไม่</span>
            <br>
            <div class="flex gap-4 w-full">
                <button onclick="closeModal()"
                    class="closeBtn w-1/2 p-2 bg-gray-400 hover:bg-gray-500 transition-colors text-white rounded-lg">
                    ไม่
                </button>
                <button onclick="conDelete()"
                    class="w-1/2 p-1 bg-red-400 hover:bg-red-500 transition-colors text-white rounded-lg">
                    ใช่
                </button>
            </div>
        </div>
    </div>

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
    <main class="flex flex-col p-8 text-[#303030]">
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
        <div class="flex flex-col justify-center">
            <lable class="mt-12 mb-4 text-xl">รายการสั่งซื้อ</lable>
            <table class="w-full bg-red-50 rounded-xl">
                <thead class="text-white bg-red-400">
                    <tr class="justify-center items-center">
                        <th class="text-center rounded-l-xl p-2">ID</th>
                        <th class="text-center">Name</th>
                        <th class="text-center">Type</th>
                        <th class="text-center">Price</th>
                        <th class="text-center">Order Date</th>
                        <th class="text-center">Order By</th>
                        <th class="text-center">Order Address</th>
                        <th class="text-center">Order Email</th>
                        <th class="text-center">Status</th>
                        <th class="text-center rounded-r-xl">Cancel</th>
                    </tr>
                </thead>
                <tbody class="text-[#303030]">
                    <?php while ($row_showproduct = $query_order->fetch_assoc()): ?>
                        <tr>
                            <td class="text-center p-2">
                                <?php echo $row_showproduct['id']; ?>
                            </td>
                            <td class="text-center">
                                <?php echo $row_showproduct['fish_name']; ?>
                            </td>
                            <td class="text-center">
                                <?php echo $row_showproduct['fish_type']; ?>
                            </td>
                            <td class="text-center">
                                <?php $all_cost += $row_showproduct['fish_price'];
                                echo $row_showproduct['fish_price']; ?> บาท
                            </td>
                            <td class="text-center">
                                <?php echo $row_showproduct['order_date']; ?>
                            </td>
                            <td class="text-center">
                                <?php echo $row_showproduct['order_by']; ?>
                            </td>
                            <td class="text-center">
                                <?php echo $row_showproduct['order_addr']; ?>
                            </td>
                            <td class="text-center">
                                <?php echo $row_showproduct['order_email']; ?>
                            </td>
                            <td class="text-center">
                                <?php if ($row_showproduct['order_status'] == 0) {
                                    echo 'ยังไม่อนุมัติ';
                                } else {
                                    echo 'อนุมัติ';
                                } ?>
                            </td>
                            <td class="text-center">
                                <button
                                    onclick="showModal(`<?php echo $row_showproduct['fish_name']; ?>`, `<?php echo $row_showproduct['fish_price']; ?>`, `<?php echo $row_showproduct['order_date']; ?>`, `<?php echo $row_showproduct['id']; ?>`)"
                                    class="h-fit border-2 border-red-400 text-red-400 rounded-lg p-1 hover:bg-red-400 hover:text-white transition-colors">
                                    ยกเลิกรายการ
                                </button>
                            </td>
                        </tr>
                    <?php endwhile ?>
                    <tr>
                        <td class="text-center">
                            ยอดรวมทั้งหมด
                        </td>
                        <td class="text-center"></td>
                        <td class="text-center"></td>
                        <td class="text-center">
                            <?php echo $all_cost ?> บาท
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </main>

    <script>
        var deleteID;
        var modal = document.getElementById("modal001");
        var produtName = document.getElementById("product_name");
        var produtPrice = document.getElementById("product_price");
        var produtDate = document.getElementById("order_date");
        var confirmRemove = document.getElementById("con_remove");

        function showModal(product_name, product_price, product_date, product_id) {
            modal.classList.remove("opacity-0");
            modal.classList.remove("invisible");

            produtName.innerHTML = `รายการที่ยกเลิก: ${product_name}`;
            produtPrice.innerHTML = `ราคา: $ ${product_price}`;
            produtDate.innerHTML = `สั่งเมื่อ: ${product_date}`;
            confirmRemove.innerHTML = `คุณต้องการยกเลิกรายการเลขที่ ${product_id} ใช่หรือไม่`;

            deleteID = product_id;
        }

        function closeModal() {
            modal.classList.add("opacity-0");
            modal.classList.add("invisible");
        }

        function conDelete() {
            fetch(`./product_info/remove_product.php?id=${deleteID}`, {
                method: "DELETE"
            }).then(async (res) => {
                closeModal();
                let result = await res.json();
                if (result.message != null) {
                    Swal.fire({
                        title: "Good job!",
                        text: result.message,
                        icon: "success"
                    }).then((res) => location.reload());
                }
            });
        }
    </script>
</body>

</html>