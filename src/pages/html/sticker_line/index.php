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
    <title>Sticker Line</title>
    <link rel="stylesheet" href="../../../../styles.css">
    <link rel="icon" href="../../../../assets/favicon.ico" />
    <script src="https://cdn.tailwindcss.com"></script>
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
                <a href="../../info/shop.php">สินค้า</a>
                <a href="../workshop/">บทเรียน</a>
                <a href="../docs/">ใบความรู้</a>
                <a href="#" class="bg-white text-[#252525] py-2 px-4 rounded-lg">ซื้อสติ๊กเกอร์ไลน์</a>
                <?php if (isset($result["username"])) {
                    echo '<a href="../../info/info.php">' . $result["username"] . '</a>';
                } else {
                    echo '<a href="../../auth/login.php">เข้าสู่ระบบ</a>';
                } ?>
            </div>
        </div>
    </nav>
    <main class="max-w-7xl w-full pt-32 px-24 m-auto flex flex-col gap-12 ">
        <p>
            ออกแบบชิ้นงานสติกเกอร์ภาพนิ่ง&ensp;
            <span class="text-[#f20b26]">[สร้างอาชีพได้ด้วย Line Studio]</span>
        </p>
        <div class="grid grid-cols-4 gap-4">
            <div class="p-4 flex flex-col items-center bg-white shadow-xl rounded-xl">
                <img src="../../../../assets/images/line_stickers/1.png" alt="1.png" class="h-40" />
                <h1>1.พิซซ่ามาส่งครับ</h1>
                <p class="text-[#777]">ฉัตรนรินทร บุญแสง</p>
            </div>
            <div class="p-4 flex flex-col items-center bg-white shadow-xl rounded-xl">
                <img src="../../../../assets/images/line_stickers/2.png" alt="2.png" class="h-40" />
                <h1>2.20 ครับพี่</h1>
                <p class="text-[#777]">ฉัตรนรินทร บุญแสง</p>
            </div>
            <div class="p-4 flex flex-col items-center bg-white shadow-xl rounded-xl">
                <img src="../../../../assets/images/line_stickers/3.png" alt="3.png" class="h-40" />
                <h1>3.very good</h1>
                <p class="text-[#777]">ฉัตรนรินทร บุญแสง</p>
            </div>
            <div class="p-4 flex flex-col items-center bg-white shadow-xl rounded-xl">
                <img src="../../../../assets/images/line_stickers/4.png" alt="4.png" class="h-40" />
                <h1>4.น่าสงสัย</h1>
                <p class="text-[#777]">ฉัตรนรินทร บุญแสง</p>
            </div>
            <div class="p-4 flex flex-col items-center bg-white shadow-xl rounded-xl">
                <img src="../../../../assets/images/line_stickers/5.png" alt="5.png" class="h-40" />
                <h1>5.ขอโทษครับ</h1>
                <p class="text-[#777]">ฉัตรนรินทร บุญแสง</p>
            </div>
            <div class="p-4 flex flex-col items-center bg-white shadow-xl rounded-xl">
                <img src="../../../../assets/images/line_stickers/6.png" alt="6.png" class="h-40" />
                <h1>6.โคตรฉลาด</h1>
                <p class="text-[#777]">ฉัตรนรินทร บุญแสง</p>
            </div>
            <div class="p-4 flex flex-col items-center bg-white shadow-xl rounded-xl">
                <img src="../../../../assets/images/line_stickers/7.png" alt="7.png" class="h-40" />
                <h1>7.เหล่ท่อ</h1>
                <p class="text-[#777]">ฉัตรนรินทร บุญแสง</p>
            </div>
            <div class="p-4 flex flex-col items-center bg-white shadow-xl rounded-xl">
                <img src="../../../../assets/images/line_stickers/8.png" alt="8.png" class="h-40" />
                <h1>8.หยิกแก้ม</h1>
                <p class="text-[#777]">ฉัตรนรินทร บุญแสง</p>
            </div>
        </div>
        <p>
            งานแต่งภาพสติกเกอร์ภาพเคลื่อนไหว&ensp;
            <span class="text-[#f20b26]">[สร้างอาชีพได้ด้วย Line Studio]</span>
        </p>
        <div class="grid grid-cols-4 gap-4">
            <div class="p-4 flex flex-col items-center bg-white shadow-xl rounded-xl">
                <img src="../../../../assets/images/line_stickers/1.png" alt="1.png" class="h-40" />
                <h1>1.พิซซ่ามาส่งครับ</h1>
                <p class="text-[#777]">ฉัตรนรินทร บุญแสง</p>
            </div>
            <div class="p-4 flex flex-col items-center bg-white shadow-xl rounded-xl">
                <img src="../../../../assets/images/line_stickers/2.png" alt="2.png" class="h-40" />
                <h1>2.20 ครับพี่</h1>
                <p class="text-[#777]">ฉัตรนรินทร บุญแสง</p>
            </div>
            <div class="p-4 flex flex-col items-center bg-white shadow-xl rounded-xl">
                <img src="../../../../assets/images/line_stickers/3.png" alt="3.png" class="h-40" />
                <h1>3.very good</h1>
                <p class="text-[#777]">ฉัตรนรินทร บุญแสง</p>
            </div>
            <div class="p-4 flex flex-col items-center bg-white shadow-xl rounded-xl">
                <img src="../../../../assets/images/line_stickers/4.png" alt="4.png" class="h-40" />
                <h1>4.น่าสงสัย</h1>
                <p class="text-[#777]">ฉัตรนรินทร บุญแสง</p>
            </div>
            <div class="p-4 flex flex-col items-center bg-white shadow-xl rounded-xl">
                <img src="../../../../assets/images/line_stickers/5.png" alt="5.png" class="h-40" />
                <h1>5.ขอโทษครับ</h1>
                <p class="text-[#777]">ฉัตรนรินทร บุญแสง</p>
            </div>
            <div class="p-4 flex flex-col items-center bg-white shadow-xl rounded-xl">
                <img src="../../../../assets/images/line_stickers/6.png" alt="6.png" class="h-40" />
                <h1>6.โคตรฉลาด</h1>
                <p class="text-[#777]">ฉัตรนรินทร บุญแสง</p>
            </div>
            <div class="p-4 flex flex-col items-center bg-white shadow-xl rounded-xl">
                <img src="../../../../assets/images/line_stickers/7.png" alt="7.png" class="h-40" />
                <h1>7.เหล่ท่อ</h1>
                <p class="text-[#777]">ฉัตรนรินทร บุญแสง</p>
            </div>
            <div class="p-4 flex flex-col items-center bg-white shadow-xl rounded-xl">
                <img src="../../../../assets/images/line_stickers/8.png" alt="8.png" class="h-40" />
                <h1>8.หยิกแก้ม</h1>
                <p class="text-[#777]">ฉัตรนรินทร บุญแสง</p>
            </div>
        </div>
        <p class="w-fit text-white bg-red-400 rounded-lg py-2 px-4 m-8 self-center">
            เย็นนี้กินไรดี, whyzotee © 2023 All Rights Reserved
        </p>
    </main>
</body>

</html>