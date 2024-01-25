<?php
if (!isset($_SESSION))
    session_start();
require_once('../../core/config.php');

if (isset($_SESSION['local_id'])) {
    $sql = "SELECT * FROM member WHERE id = '" . $_SESSION['local_id'] . "' ";
    $query = mysqli_query($conn, $sql);
    $result = mysqli_fetch_array($query, MYSQLI_ASSOC);
}
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
    <title>Shop</title>
</head>

<body>
    <nav class="fixed w-full bg-black bg-opacity-50 backdrop-blur-xl z-50">
        <div class="max-w-7xl w-full m-auto flex justify-between items-center p-4 text-white font-semibold">
            <a href="../../../" class="flex gap-4 items-center cursor-pointer">
                <img src="../../../assets/images/logo/logo_1.0.png" alt="logo" class="h-12" />
                <h1 class="text-xl">Mackerel Fish Shop</h1>
            </a>
            <div class="flex items-center gap-8 font-semibold">
                <a href="../../../">หน้าหลัก</a>
                <a href="#" class="bg-white text-[#252525] py-2 px-4 rounded-lg">สินค้า</a>
                <a href="../html/workshop/">บทเรียน</a>
                <a href="../html/docs/">ใบความรู้</a>
                <a href="../html/sticker_line/">ซื้อสติ๊กเกอร์ไลน์</a>
                <?php if (isset($result["username"])) {
                    echo '<a href="../info/info.php">' . $result["username"] . '</a>';
                } else {
                    echo '<a href="../auth/login.php">เข้าสู่ระบบ</a>';
                } ?>
            </div>
        </div>
    </nav>
    <main class="flex pt-24 p-8 m-auto max-w-7xl text-[#303030]">
        <div class="w-1/3">
            <span class="text-xl">Filter</span>
        </div>
        <div class="w-full flex flex-col justify-center">
            <lable class="text-xl">สินค้า</lable>
            <br>
            <div class="grid grid-cols-3 gap-4">
                <?php while ($row_showproduct = $query_data->fetch_assoc()): ?>
                    <a href="./product_info?id=<?php echo $row_showproduct['id']; ?>">
                        <div class="relative mb-4 hover:scale-105 transition-all rounded-xl shadow-lg">
                            <div
                                class="absolute h-64 w-full bg-gradient-to-b from-transparent from-90% to-[#1f1f1f] to-100% opacity-10 z-10">
                            </div>
                            <img src="<?php echo $row_showproduct["fish_image"]; ?>" alt="img"
                                class="h-64 w-full bg-cover object-cover rounded-t  -lg bg-white">
                            <!-- <?php echo $row_showproduct['id']; ?> -->
                            <div class="details mt-4 p-4">
                                <span class="text-xl">
                                    <?php echo $row_showproduct['fish_name']; ?>
                                </span>
                                <span class="text-gray-400 line-clamp-2">
                                    <?php echo $row_showproduct['fish_detail']; ?>
                                </span>
                                <div class="mt-4 flex justify-between">
                                    <span>
                                        <?php echo $row_showproduct['fish_familia']; ?>
                                    </span>
                                    <span>
                                        $
                                        <?php echo $row_showproduct['fish_price']; ?>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </a>
                <?php endwhile ?>
            </div>
        </div>
    </main>
    <p class="w-fit m-auto text-white bg-red-400 rounded-lg py-2 px-4 mb-6 self-center">
        เย็นนี้กินไรดี, whyzotee © 2023 All Rights Reserved
    </p>
</body>

</html>