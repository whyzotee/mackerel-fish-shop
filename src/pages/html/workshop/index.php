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
    <title>Workshop</title>
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
                <a href="#" class="bg-white text-[#252525] py-2 px-4 rounded-lg">บทเรียน</a>
                <a href="../docs/">ใบความรู้</a>
                <a href="../sticker_line/">ซื้อสติ๊กเกอร์ไลน์</a>
                <?php if (isset($result["username"])) {
                    echo '<a href="../../info/info.php">' . $result["username"] . '</a>';
                } else {
                    echo '<a href="../../auth/login.php">เข้าสู่ระบบ</a>';
                } ?>
            </div>
        </div>
    </nav>
    <main class="h-screen flex flex-col gap-12 justify-center items-center">
        <div class="text-4xl">
            <h1>List of บทเรียน</h1>
            <img src="https://media.tenor.com/P-8ZvqnS4AwAAAAM/dancing-cat-dancing-kitten.gif" alt="cat_dance"
                height="200" class="rounded-full" />
        </div>
        <div class="flex gap-12">
            <ul class="flex flex-col gap-6 list-disc">
                <h5 class="text-3xl">สัปดาห์ที่ 10</h5>
                <li>
                    <a href="sampal/"
                        class="border-2 border-red-400 text-red-400 rounded-lg p-2 hover:bg-red-400 hover:text-white transition-colors">
                        sampal.html
                    </a>
                </li>
                <li>
                    <a href="tagh/"
                        class="border-2 border-red-400 text-red-400 rounded-lg p-2 hover:bg-red-400 hover:text-white transition-colors">
                        tagH.html
                    </a>
                </li>
                <li>
                    <Link href="/pages/workshop/1_structuring">
                    <a color="danger" radius="sm" variant="ghost">
                        ใบงานที่ 1 (Structuring)
                    </a>
                    </Link>
                </li>
            </ul>
            <ul class="flex flex-col gap-6 list-disc">
                <h5 class="text-3xl">สัปดาห์ที่ 11</h5>
                <li>
                    <Link href="/pages/workshop/2_links_navigation">
                    <a color="danger" radius="sm" variant="ghost">
                        ใบงานที่ 2 (Links_Navigation)
                    </a>
                    </Link>
                </li>
                <li>
                    <Link href="/pages/workshop/3_images_audio_video">
                    <a color="danger" radius="sm" variant="ghost">
                        ใบงานที่ 3 (Images_Audio_Video)
                    </a>
                    </Link>
                </li>
            </ul>
            <ul class="flex flex-col gap-6 list-disc">
                <h5 class="text-3xl">สัปดาห์ที่ 12</h5>
                <li>
                    <Link href="/pages/workshop/4_tables">
                    <a color="danger" radius="sm" variant="ghost">
                        ใบงานที่ 4 (Tables)
                    </a>
                    </Link>
                </li>
                <li>
                    <Link href="/pages/workshop/5_forms">
                    <a color="danger" radius="sm" variant="ghost">
                        ใบงานที่ 5 (Forms)
                    </a>
                    </Link>
                </li>
                <li>
                    <Link href="/pages/workshop/6_frames">
                    <a color="danger" radius="sm" variant="ghost">
                        ใบงานที่ 6 (Frames)
                    </a>
                    </Link>
                </li>
            </ul>
            <ul class="flex flex-col gap-6 list-disc">
                <h5 class="text-3xl">สัปดาห์ที่ 14</h5>
                <li>
                    <Link href="/pages/workshop/test_html_b">
                    <a color="danger" radius="sm" variant="ghost">
                        testMid(ชุด B)
                    </a>
                    </Link>
                </li>
            </ul>
        </div>

        <a href="../../../../"
            class="w-fit mx-auto border-2 border-red-400 text-red-400 rounded-lg p-2 hover:bg-red-400 hover:text-white transition-colors">
            ย้อนกลับ
        </a>
    </main>
</body>

</html>