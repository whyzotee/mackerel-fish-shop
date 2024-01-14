<?php
if (!isset($_SESSION))
    session_start();
require_once('src/core/config.php');
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
    <title>Mackerel Fish Shop</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="icon" href="assets/favicon.ico" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <nav class="fixed w-full bg-black bg-opacity-50 backdrop-blur-xl z-50">
        <div class="max-w-7xl w-full m-auto flex justify-between items-center p-4 text-white font-semibold">
            <a href="/" class="flex gap-4 items-center cursor-pointer">
                <img src="assets/images/logo/logo_1.0.png" alt="logo" class="h-12" />
                <h1 class="text-xl">Mackerel Fish Shop</h1>
            </a>
            <div class="flex items-center gap-8 font-semibold">
                <a href="#" class="bg-white text-[#252525] py-2 px-4 rounded-lg">หน้าหลัก</a>
                <?php if (!isset($result["username"])) {
                    echo '<a href="src/pages/auth/login.php">เข้าสู่ระบบ</a>';
                } ?>
                <a href="src/pages/html/workshop/">บทเรียน</a>
                <a href="src/pages/html/docs/">ใบความรู้</a>
                <a href="src/pages/html/sticker_line/">ซื้อสติ๊กเกอร์ไลน์</a>
                <?php if (isset($result["username"])) {
                    echo '<a href="src/pages/info/info.php">' . $result["username"] . '</a>';
                } ?>
            </div>

        </div>
    </nav>
    <main class="flex min-h-screen flex-col items-center justify-between bg-[#252525]">
        <div class="relative h-screen w-full">
            <img src="./assets/images/about-bg.png" alt="about-bg" class="absolute h-full w-full" />
            <div
                class="absolute h-full w-full bg-gradient-to-b from-transparent from-0% to-[#252525] to-100% flex flex-col gap-4 items-center justify-center">
                <img src="./assets/images/logo/logo_1.0.png" alt="logo" class="h-36" />
                <h1 class="text-7xl text-white">Mackerel Fish Shop</h1>
                <h5 class="text-3xl text-white">เรื่องปลา ไว้ใจเรา</h5>
                <div class="flex items-center gap-4">
                    <a href="src/pages/info/shop.php"
                        class="border-2 border-red-400 text-red-400 rounded-lg p-2 hover:bg-red-400 hover:text-white transition-colors">
                        ซื้อเลย!!!
                    </a>
                    <span class="text-white text-xl">และเรามี</span>
                    <a href="src/pages/html/sticker_line/"
                        class="border-2 border-green-400 text-green-400 rounded-lg p-2 hover:bg-green-400 hover:text-white transition-colors">
                        สติ๊กเกอร์ไลน์
                    </a>
                    <span class="text-white text-xl">ขายอยู่นะ!!</span>
                </div>
            </div>
        </div>
        <div class="max-w-7xl w-full py-24 text-center text-white">
            <div class="text-3xl font-semibold flex flex-col items-center">
                <h1>สุดยอดการคัดสรร</h1>
                <h1>สู่ความอร่อย</h1>
                <hr class="rounded border-red-400 w-24 mt-4" />
            </div>
            <div class="grid grid-cols-3 gap-4 my-12">
                <div class="p-4 rounded-3xl transition-colors hover:bg-red-400 ">
                    <div class="flex items-center gap-4">
                        <img src="./assets/images/logo/fish-bone.png" alt="fish" class="h-16" />
                        <h1 class="text-xl font-semibold">ก้างน้อย</h1>
                    </div>
                    <p class="mt-2 text-left">
                        ปลาแมกเคอเรลที่เราใช้มีหลายสายพันธ์ทั้ง Short mackerel, Island
                        mackerel, Indian mackerel, Atlantic mackerel และ
                        สายพันธ์อื่นๆอีกมากมาย ซึ่งก้างน้อย แต่ความอร่อย 100%
                    </p>
                </div>
                <div class="p-4 rounded-3xl transition-colors hover:bg-red-400 ">
                    <div class="flex items-center gap-4">
                        <img src="./assets/images/logo/fish.png" alt="fish" class="h-16" />
                        <h1 class="text-xl font-semibold">อร่อยแน่</h1>
                    </div>
                    <p class="mt-2 text-left">
                        ปลาแมกเคอเรลจากร้านเรารับประกันความอร่อย สามารถทำกินเองได้
                        โดยมีหลากหลายเมนูให้เลือกทำ ไม่ว่าจะทำไปใส่ ขนมจีนน้ำยาป่า
                        ผัดปลากระป๋องใส่ไข่ราดข้าว ปลาทอดหนังกรอบ และ อื่นๆ
                    </p>
                </div>
                <div class="p-4 rounded-3xl transition-colors hover:bg-red-400">
                    <div class="flex items-center gap-4">
                        <img src="./assets/images/logo/journal-book.png" alt="fish" class="h-16" />
                        <h1 class="text-xl font-semibold">คู่มือและเมนู</h1>
                    </div>
                    <p class="mt-2 text-left">
                        เรามีคู่มือสำหรับการใช้ปลาแมกเคอเรล อย่างถูกวิธีและวิธีทำเมนูต่างๆ
                        เพื่อให้ลูกค้าสามารถสรรสร้างเมนู
                        อันยอดเยื่ยมเพื่อให้ผู้บริโภครับประสบการณ์ใหม่ๆ ที่คุณอาจไม่เคยลอง
                    </p>
                </div>
            </div>
            <div class="container">
                <div class="text-3xl font-semibold flex flex-col items-center">
                    <h1>คอมเม้นจากลูกค้าทางบ้าน</h1>
                    <hr class="rounded border-red-400 w-24 mt-4" />
                </div>

                <div class="flex gap-4">
                    <img src="./assets/images/cat.jpg" alt="cat" class="rounded-full -scale-x-100 h-20" />
                    <div class="name flex flex-col items-start">
                        <div class="flex gap-2 items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" height="40" fill="none" viewBox="0 0 24 24"
                                strokeWidth="1.5" stroke="currentColor" class="w-12 h-12 text-red-400">
                                <path strokeLinecap="round" strokeLinejoin="round"
                                    d="M8.625 12a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H8.25m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H12m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0h-.375M21 12c0 4.556-4.03 8.25-9 8.25a9.764 9.764 0 01-2.555-.337A5.972 5.972 0 015.41 20.97a5.969 5.969 0 01-.474-.065 4.48 4.48 0 00.978-2.025c.09-.457-.133-.901-.467-1.226C3.93 16.178 3 14.189 3 12c0-4.556 4.03-8.25 9-8.25s9 3.694 9 8.25z">
                                </path>
                            </svg>
                            <h1 class="text-xl text-red-400">Nyan Cat</h1>
                        </div>
                        <p>ลูกค้าใหม่</p>
                    </div>
                </div>
                <p class="mt-4 text-left">
                    ปลาอร่อยมากเมี๊ยว อยากซื้อมาสัก 10ล้านตัวเมี๊ยว ขอการันตีนะเมี๋ยว
                    ว่าร้านนี้อร่อยจริงไม่โม้เมี๊ยว กินดิบก็ได้เพราะปลาสดมากเมี๊ยว
                    แนะนำให้ซื้อตอนมีสินค้านะเมี๊ยว เพราะสินค้าหมดไวมากเลยเมี๊ยว
                    ไว้เติมสต๊อกเดี๋ยวจะมาเหมานะเมี๊ยว
                </p>

                <div class="flex gap-4 items-end justify-end">
                    <div class="flex flex-col items-end">
                        <div class="flex items-center gap-2">
                            <h1 class="text-xl text-red-400">Anya Forger</h1>
                            <svg xmlns="http://www.w3.org/2000/svg" height="40" viewBox="0 0 24 24" fill="currentColor"
                                class="w-12 h-12 text-red-400 -scale-x-100">
                                <path fillRule="evenodd"
                                    d="M4.804 21.644A6.707 6.707 0 006 21.75a6.721 6.721 0 003.583-1.029c.774.182 1.584.279 2.417.279 5.322 0 9.75-3.97 9.75-9 0-5.03-4.428-9-9.75-9s-9.75 3.97-9.75 9c0 2.409 1.025 4.587 2.674 6.192.232.226.277.428.254.543a3.73 3.73 0 01-.814 1.686.75.75 0 00.44 1.223zM8.25 10.875a1.125 1.125 0 100 2.25 1.125 1.125 0 000-2.25zM10.875 12a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0zm4.875-1.125a1.125 1.125 0 100 2.25 1.125 1.125 0 000-2.25z"
                                    clipRule="evenodd"></path>
                            </svg>
                        </div>
                        <p>ลูกค้าประจำ</p>
                    </div>
                    <img src="./assets/images/client.jpg" alt="anya" class="rounded-full h-20" />
                </div>
                <p class="text-right mt-4">
                    อาเนีย มีความสุขมักๆ ที่ได้กินปลาจากร้านนี้ก่ะ อาเนียแนะนำให้
                    ซื้อไปทำอาหารโดยให้คุมแม่ยอร์ ทำปลาทอดน้ำปลาให้กิน
                    ทำให้ฝีมือคุมแม่อร่อยขึ้นจากปกติมากเลยก่ะ
                </p>
                <div class="flex justify-end mt-12">
                    <button class="bg-red-400  rounded-lg p-2 hover:bg-red-500 text-white transition-colors">
                        อ่านเพิ่มเติม
                    </button>
                </div>
            </div>
        </div>
        <p class="w-fit bg-white rounded-lg py-2 px-4 m-8">
            เย็นนี้กินไรดี, whyzotee © 2023 All Rights Reserved
        </p>
    </main>
</body>

</html>