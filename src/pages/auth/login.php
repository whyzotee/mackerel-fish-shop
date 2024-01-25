<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	if (!isset($_SESSION))
		session_start();

	require_once('../../core/config.php');

	$sql = "SELECT * FROM member WHERE username = '" . mysqli_real_escape_string($conn, $_POST['username']) . "' and password = '" . mysqli_real_escape_string($conn, $_POST['password']) . "'";

	$query = mysqli_query($conn, $sql);
	$result = mysqli_fetch_array($query);

	if (!$result) {
		echo '<script language="javascript">';
		echo 'alert("ชื่อผู้ใช้ หรือ รหัสผ่าน ผิดพลาด!")';
		echo '</script>';
	} else {
		$_SESSION["local_id"] = $result["id"];
		$_SESSION["local_status"] = $result["role"];

		session_write_close();
		echo '<script language="javascript">';
		echo 'alert("Nice to see you!"); window.location = "../../../";';
		echo '</script>';
	}
	mysqli_close($conn);
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login</title>
	<link rel="stylesheet" href="../../../styles.css">
	<link rel="icon" href="../../../assets/favicon.ico" />
	<script src="https://cdn.tailwindcss.com"></script>

</head>

<body>
	<nav class="fixed w-full bg-black bg-opacity-50 backdrop-blur-xl z-50">
		<div class="max-w-7xl w-full m-auto flex justify-between items-center p-4 text-white font-semibold">
			<a href="../../" class="flex gap-4 items-center cursor-pointer">
				<img src="../../../assets/images/logo/logo_1.0.png" alt="logo" class="h-12" />
				<h1 class="text-xl">Mackerel Fish Shop</h1>
			</a>
			<div class="flex items-center gap-8 font-semibold">
				<a href="../../../">หน้าหลัก</a>
				<a href="../info/shop.php">สินค้า</a>
				<a href="../html/workshop/">บทเรียน</a>
				<a href="../html/docs/">ใบความรู้</a>
				<a href="../html/sticker_line/">ซื้อสติ๊กเกอร์ไลน์</a>
				<a href="#" class="bg-white text-[#252525] py-2 px-4 rounded-lg">เข้าสู่ระบบ</a>

			</div>
		</div>
	</nav>
	<main class="h-screen flex flex-col justify-center items-center">
		<h1 class="text-3xl">โปรดเข้าสู่ระบบ</h1>
		<br />
		<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>"
			class="bg-white shadow-md rounded-xl px-8 pt-6 pb-8 mb-4">
			<div class="mb-4">
				<label class="block text-gray-700 text-sm font-bold mb-2" htmlFor="username">
					ชื่อผู้ใช้งาน
				</label>
				<input
					class="shadow appearance-none border rounded-xl w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
					id="username" name="username" type="text" placeholder="Username" required />
			</div>
			<div class="mb-4">
				<label class="block text-gray-700 text-sm font-bold mb-2">
					Password
				</label>
				<input
					class="shadow appearance-none border rounded-xl w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
					id="password" name="password" type="password" placeholder="Password" required />
			</div>
			<div class="flex justify-end">
				<a class="font-bold text-sm text-red-400 hover:text-red-500" href="#">
					ลืมรหัสผ่าน?
				</a>
			</div>
			<div class="flex items-center justify-between mt-4">
				<button class="bg-red-400  rounded-lg p-2 hover:bg-red-500 text-white transition-colors"
					type="submit">เข้าสู่ระบบ</button>
				<a href="register.php"
					class="border-2 border-red-400 text-red-400 rounded-lg p-2 hover:bg-red-400 hover:text-white transition-colors">ลงทะเบียน</a>
			</div>
		</form>
	</main>

</body>

</html>