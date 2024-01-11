<html>

<head>
  <title>Data Edit</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf8">
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <section class="w-fit m-8 p-4 bg-blue-300 rounded-lg flex flex-col items-end">
    <span class="self-left">ร้านขายปลาแมคเคอเรล (Mackerel Fish Shop)</span>
    <div class="flex gap-4 items-center">
      <img src="https://avatars.githubusercontent.com/u/53619535?v=4" alt="profile" class="rounded-full h-24">
      <div>
        <p>ยินดีต้อนรับ <span class="text-red-400">ผู้ดูแลระบบ</span></p>
        <p>
          คุณ
          <?php echo $result["test_name"]; ?>&nbsp;
          <?php echo $result["test_lname"]; ?>&nbsp;
        </p>
      </div>
    </div>
    <a href="logout.php" class="bg-red-400  rounded-lg p-2 hover:bg-red-500 text-white transition-colors">ออกจากระบบ</a>
  </section>
</body>

</html>