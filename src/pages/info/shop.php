<?php
require_once('../../core/config.php');

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

<body class="bg-red-50">
    <nav class="flex justify-between items-center p-4 bg-white">
        <a href="../../../" class="flex gap-4 items-center cursor-pointer">
            <img src="../../../assets/images/logo/logo_1.0.png" alt="logo" class="h-12" />
            <h1 class="text-xl">Mackerel Fish Shop</h1>
        </a>

        <a href="" class="mr-4">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
            </svg>
        </a>
    </nav>
    <main class="flex p-8 m-auto max-w-7xl text-[#303030]">
        <div class="w-1/3">
            <span class="text-xl">Filter</span>
        </div>
        <div class="w-full flex flex-col justify-center">
            <lable class="text-xl">สินค้า</lable>
            <br>
            <div class="grid grid-cols-3 gap-4">
                <?php while ($row_showproduct = $query_data->fetch_assoc()): ?>
                    <a href="">
                        <div class="mb-4 hover:scale-105 transition-all">
                            <img src="<?php echo $row_showproduct["fish_image"]; ?>" alt="img"
                                class="h-64 w-full bg-cover object-cover rounded-lg bg-white">
                            <!-- <?php echo $row_showproduct['id']; ?> -->
                            <div class="details mt-4">
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
</body>

</html>