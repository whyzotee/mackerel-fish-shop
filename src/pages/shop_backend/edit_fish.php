<html>

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title>Edit Data</title>
  <link rel="stylesheet" href="../../../styles.css">
  <link rel="icon" href="../../../assets/favicon.ico" />
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>

  <?php
  require_once('../../config/config.php');
  $editAddid = null;
  if (isset($_GET["add_id"])) {
    $editAddid = $_GET["add_id"];
  }
  $sql = "SELECT * FROM scheduling_fish WHERE add_id = '" . $editAddid . "' ";
  $query = mysqli_query($conn, $sql);
  $row_edit = mysqli_fetch_array($query, MYSQLI_ASSOC);
  ?>

  <div class="container">
    <div class="row">
      <div class="col-md-3"></div>
      <div class="col-md-6"> <br>
        <h1 class="text-3xl p-8"> ฟอร์ม แก้ไขรายละเอียดปลา</h1>
        <hr>
        <form action="save_fish.php" enctype="multipart/form-data" name="formedit" method="POST"
          class="flex flex-col p-8">
          <div class="flex items-center gap-4">
            <p class="w-16">ID</p>
            <input type="text" name="add_id" class="border-2 rounded-md border-gray-500 p-2"
              value="<?php echo $row_edit['add_id']; ?>">
          </div>
          <br>
          <div class="flex items-center gap-4">
            <p class="w-16">Name</p>
            <input type="text" name="fish_name" class="border-2 rounded-md border-gray-500 p-2"
              value="<?php echo $row_edit['fish_name']; ?>">
          </div>
          <br>
          <div class="flex items-center gap-4">
            <p class="w-16">Details</p>
            <input type="text" name="fish_detail" class="border-2 rounded-md border-gray-500 p-2"
              value="<?php echo $row_edit['fish_detail']; ?>">
          </div>

          <br>
          <div class="flex items-center gap-4">
            <p class="w-16">Image</p>
            <input type="file" id="fish_image" name="fish_image" class="border-2 rounded-md border-gray-500 p-2">
          </div>

          <br>
          <div class="flex items-center gap-4">
            <p class="w-16">Breed</p>
            <input type="text" name="fish_familia" class="border-2 rounded-md border-gray-500 p-2"
              value="<?php echo $row_edit['fish_familia']; ?>">
          </div>
          <br>
          <div class="flex items-center gap-4">
            <p class="w-16">Price</p>
            <input type="text" name="fish_price" class="border-2 rounded-md border-gray-500 p-2"
              value="<?php echo $row_edit['fish_price']; ?>">
          </div>

          <br>
          <br>
          <div class="flex gap-4">
            <button type="submit" name="submit"
              class="bg-blue-400 hover:bg-blue-500 text-white p-2 rounded-lg">แก้ไขคอร์ส</button>
            <a href="scheduling_fish.php"
              class="bg-red-400 rounded-lg p-2 hover:bg-red-500 text-white transition-colors">ย้อนกลับ </a>
          </div>
        </form>
      </div>
    </div>
  </div>
  <?php mysqli_close($conn); ?>
</body>

</html>