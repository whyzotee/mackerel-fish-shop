<?php
if (!isset($_SESSION))
    session_start();
require_once('../../../core/config.php');

if (isset($_SESSION['local_id'])) {
    $sql = "SELECT * FROM member WHERE id = '" . $_SESSION['local_id'] . "' ";
    $query = mysqli_query($conn, $sql);
    $result = mysqli_fetch_array($query, MYSQLI_ASSOC);
}

$select_schedfish = "SELECT * FROM scheduling_fish WHERE id = '" . $_GET['id'] . "'";
$query_data = $conn->query($select_schedfish);
$fish_result = mysqli_fetch_array($query_data, MYSQLI_ASSOC);

if (isset($_POST['order_buy'])) {
    if (!isset($result)) {
        echo '<script language="javascript">';
        echo 'alert("Please login first!");';
        echo '</script>';
    } else {
        $sql = "INSERT INTO order_fish (fish_name, fish_type, fish_price, order_id, order_date, order_by, order_status) 
            VALUES ('" . $fish_result["fish_name"] . "',
                    '" . $_POST["fish_type"] . "',
                    '" . $fish_result["fish_price"] . "',
                    '" . $result["id"] . "',
                    '" . date("Y-m-d") . "',
                    '" . $result["name"] . " " . $result["lastname"] . "',
                    '0')";

        $query = mysqli_query($conn, $sql);

        if ($query) {
            echo '<script language="javascript">';
            echo 'alert("Finish buyed");window.location = "../info.php";';
            echo '</script>';
        }
    }
    unset($_POST['order_buy']);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../../../../assets/favicon.ico" />
    <link rel="stylesheet" href="../../../../styles.css">
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
    <title>Document</title>
</head>

<body>
    <nav class="fixed w-full bg-black bg-opacity-50 backdrop-blur-xl z-50">
        <div class="max-w-7xl w-full m-auto flex justify-between items-center p-4 text-white font-semibold">
            <a href="../../../../" class="flex gap-4 items-center cursor-pointer">
                <img src="../../../../assets/images/logo/logo_1.0.png" alt="logo" class="h-12" />
                <h1 class="text-xl">Mackerel Fish Shop</h1>
            </a>
            <div class="flex items-center gap-8 font-semibold">
                <a href="../../../../">หน้าหลัก</a>
                <a href="../shop.php" class="bg-white text-[#252525] py-2 px-4 rounded-lg">สินค้า</a>
                <a href="../../html/workshop/">บทเรียน</a>
                <a href="../../html/docs/">ใบความรู้</a>
                <a href="../../html/sticker_line/">ซื้อสติ๊กเกอร์ไลน์</a>
                <?php if (isset($result["username"])) {
                    echo '<a href="../../info/info.php">' . $result["username"] . '</a>';
                } else {
                    echo '<a href="../../auth/login.php">เข้าสู่ระบบ</a>';
                } ?>
            </div>
        </div>
    </nav>
    <main class="relative flex flex-col lg:flex-row gap-8 pt-32 p-8 m-auto max-w-7xl text-[#303030]">
        <div class=" w-full lg:w-1/2">
            <img src="../<?php echo $fish_result["fish_image"] ?>" alt="../<?php echo $fish_result["fish_image"] ?>"
                class="h-96 w-full object-cover rounded-xl shadow-lg">
            <div class="flex gap-4 mt-12 h-24">
                <div class="h-full w-full bg-white shadow-lg rounded-lg">img more</div>
                <div class="h-full w-full bg-white shadow-lg rounded-lg">img more</div>
                <div class="h-full w-full bg-white shadow-lg rounded-lg">img more</div>
                <div class="h-full w-full bg-white shadow-lg rounded-lg">img more</div>
            </div>
        </div>

        <div class="w-full lg:w-1/2 flex flex-col justify-between">
            <div class="flex flex-col">
                <span class="text-4xl tracking-widest">
                    <?php echo $fish_result["fish_name"] ?>
                </span>
                <hr class="my-2">
                <span class="text-xl">
                    ราคา: $
                    <?php echo $fish_result["fish_price"] ?> / ~
                    <?php echo number_format((float) $fish_result["fish_price"] * 35.59, 2, '.', '') ?> บาท
                </span><br>
                <span>
                    สายพันธ์:
                    <?php echo $fish_result["fish_familia"] ?>
                </span>
                <span class="text-gray-500">
                    รายละเอียด:
                    <?php echo $fish_result["fish_detail"] ?>
                </span>
            </div>
            <div class="flex flex-col w-full">
                <div class="flex items-center gap-4 my-4">
                    <p>เลือกชนิดของปลา:</p>
                    <button onclick="reply_click(this.id)" id="btn-0"
                        class="bg-red-400 text-white border-2 border-red-400 py-1 px-3 rounded-lg hover:text-white hover:bg-red-400 transition-colors">สด</button>
                    <button onclick="reply_click(this.id)" id="btn-1"
                        class="border-2 border-red-400 py-1 px-3 rounded-lg hover:text-white hover:bg-red-400 transition-colors">ต้ม</button>
                    <button onclick="reply_click(this.id)" id="btn-2"
                        class="border-2 border-red-400 py-1 px-3 rounded-lg hover:text-white hover:bg-red-400 transition-colors">นึ่ง</button>
                    <button onclick="reply_click(this.id)" id="btn-3"
                        class="border-2 border-red-400 py-1 px-3 rounded-lg hover:text-white hover:bg-red-400 transition-colors">ทอด</button>
                    <button onclick="reply_click(this.id)" id="btn-4"
                        class="border-2 border-red-400 py-1 px-3 rounded-lg hover:text-white hover:bg-red-400 transition-colors">ย่าง</button>
                </div>

                <form method="post">
                    <input type="hidden" name="fish_type" id="fish_type" value="สด" autocomplete="off" />
                    <input type="submit" name="order_buy" value="ซื้อเลย !!" autocomplete="off"
                        class="w-full text-xl rounded-xl bg-red-400 text-white p-2 text-center hover:bg-red-500 transition-colors">
                </form>

            </div>
        </div>
    </main>
    <p class="w-fit m-auto text-white bg-red-400 rounded-lg py-2 px-4 mt-24 mb-6 self-center">
        เย็นนี้กินไรดี, whyzotee © 2023 All Rights Reserved
    </p>

    <script type="text/javascript">
        let type = 0;

        function reply_click(id) {
            let activeButton = document.getElementById(id).classList;
            if (!activeButton.contains("text-white") && !activeButton.contains("bg-red-400")) {
                activeButton.add("text-white");
                activeButton.add("bg-red-400");
                type = id.split("-")[1];

                if (type == 0) {
                    document.getElementById("fish_type").value = "สด";
                } else if (type == 1) {
                    document.getElementById("fish_type").value = "ต้ม";

                } else if (type == 2) {
                    document.getElementById("fish_type").value = "นึ่ง";

                } else if (type == 3) {
                    document.getElementById("fish_type").value = "ทอด";

                } else if (type == 4) {
                    document.getElementById("fish_type").value = "ย่าง";
                }
            }

            for (let index = 0; index < 5; index++) {
                if (index == type) continue;

                let button = document.getElementById(`btn-${index}`);
                if (button.classList.contains("text-white")) {
                    button.classList.remove("text-white");
                }
                if (button.classList.contains("bg-red-400")) {
                    button.classList.remove("bg-red-400");
                }
            }

            console.log(type);
            let x = document.getElementById("fish_type").value;
            console.log(x);
        }
    </script>
</body>

</html>