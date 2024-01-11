<?php
if (!isset($_SESSION))
    session_start();
require_once('../../../core/config.php');
if (isset($_SESSION['local_id'])) {
    $sql = "SELECT * FROM member WHERE id = '" . $_SESSION['local_id'] . "' ";
    $query = mysqli_query($conn, $sql);
    $result = mysqli_fetch_array($query, MYSQLI_ASSOC);
}
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Docs</title>
    <link rel="stylesheet" href="../../../../styles.css">
    <link rel="icon" href="../../../../assets/favicon.ico" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <nav class=" w-full bg-black bg-opacity-50 backdrop-blur-xl z-50">
        <div class="max-w-7xl w-full m-auto flex justify-between items-center p-4 text-white font-semibold">
            <a href="../../../../" class="flex gap-4 items-center cursor-pointer">
                <img src="../../../../assets/images/logo/logo_1.0.png" alt="logo" class="h-12" />
                <h1 class="text-xl">Mackerel Fish Shop</h1>
            </a>
            <div class="flex items-center gap-8 font-semibold">
                <a href="../../../../">หน้าหลัก</a>
                <?php if (!isset($result["username"])) {
                    echo '<a href="../../auth/login.php">เข้าสู่ระบบ</a>';
                } ?>
                <a href="../workshop/">บทเรียน</a>
                <a href="#" class="bg-white text-[#252525] py-2 px-4 rounded-lg">ใบความรู้</a>
                <a href="../sticker_line/">ซื้อสติ๊กเกอร์ไลน์</a>
                <?php if (isset($result["username"])) {
                    echo '<a href="../../info/info.php">' . $result["username"] . '</a>';
                } ?>
            </div>
        </div>
    </nav>
    <main class="h-screen flex flex-col gap-12 items-center justify-center">
        <div class="flex flex-col">
            <h1 class="text-3xl">List of ใบความรู้</h1>
            <img src="https://media.tenor.com/P-8ZvqnS4AwAAAAM/dancing-cat-dancing-kitten.gif" alt="cat_dance"
                height="200" class="rounded-full" />
        </div>

        <div class="flex gap-12">
            <a href="../../../../assets/pdf/Mackerel_fish_shop 1.0.pdf" target="_blank">
                <img src="../../../../assets/images/docs/img1.0.jpg" alt="img1"
                    class="h-[300px] shadow-xl hover:scale-105 transition-all rounded-lg" />
                </Link>
                <a href="../../../../assets/pdf/Mackerel_fish_shop 2.0.pdf" target="_blank">
                    <img src="../../../../assets/images/docs/img2.0.jpg" alt="img1"
                        class="h-[300px] shadow-xl hover:scale-105 transition-all rounded-lg" />
                </a>
                <a href="../../../../assets/pdf/Mackerel_fish_shop 3.0.pdf" target="_blank">
                    <img src="../../../../assets/images/docs/img3.0.jpg" alt="img1"
                        class="h-[300px] shadow-xl hover:scale-105 transition-all rounded-lg" />
                </a>
                <a href="../../../../assets/pdf/Mackerel_fish_shop 4.0.pdf" target="_blank">
                    <img src="../../../../assets/images/docs/img4.0.jpg" alt="img1"
                        class="h-[300px] shadow-xl hover:scale-105 transition-all rounded-lg" />
                </a>
        </div>


        <a href="../../../../"
            class="w-fit mx-auto border-2 border-red-400 text-red-400 rounded-lg p-2 hover:bg-red-400 hover:text-white transition-colors">
            ย้อนกลับ
        </a>
    </main>
</body>

</html>