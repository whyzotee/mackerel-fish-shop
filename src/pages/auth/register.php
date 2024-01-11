<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	require_once('../../core/config.php');

	if (!$conn) {
		header("Status: 404 Not Found");
		die("ไม่สามารถเชื่อมต่อฐานข้อมูลได้ " . mysqli_connect_error());
	}

	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$username = $_POST['username'];
	$password = $_POST['password'];

	$sql = "INSERT INTO `member`( `name`, `lastname`, `username`, `password`, `role`) VALUES ('" . $firstname . "','" . $lastname . "', '" . $username . "','" . $password . "', 'CUSTOMER');";

	if (mysqli_query($conn, $sql)) {
		echo '<script language="javascript">';
		echo 'alert("Register complete"); window.location = "login.php";';
		echo '</script>';
	} else {
		echo '<script language="javascript">';
		echo 'alert("Some error please try again");';
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
				<a href="#" class="bg-white text-[#252525] py-2 px-4 rounded-lg">สมัครสมาชิก</a>
				<a href="../html/workshop/">บทเรียน</a>
				<a href="../html/docs/">ใบความรู้</a>
				<a href="../html/sticker_line/">ซื้อสติ๊กเกอร์ไลน์</a>
			</div>
		</div>
	</nav>
	<main class="h-screen flex flex-col justify-center items-center pt-12">
		<h1 class="text-3xl">ลงทะเบียน</h1>
		<br />
		<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>"
			class="bg-white shadow-md rounded-xl px-8 pt-6 pb-8 mb-4">
			<div class="mb-4">
				<label class="block text-gray-700 text-sm font-bold mb-2">
					ชื่อผู้ใช้งาน
				</label>
				<input
					class="shadow appearance-none border rounded-xl w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
					id="username" name="username" type="text" placeholder="Username" required />
			</div>
			<div class="flex gap-4">
				<div class="mb-4">
					<label class="block text-gray-700 text-sm font-bold mb-2">
						Password
					</label>
					<input
						class="shadow appearance-none border rounded-xl w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
						id="password" name="password" type="password" placeholder="Password" required />
				</div>
				<div class="mb-4">
					<label class="block text-gray-700 text-sm font-bold mb-2">
						Confirm Password
					</label>
					<input
						class="shadow appearance-none border rounded-xl w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
						id="con_password" name="con_password" type="password" placeholder="Confirm Password" required />
				</div>
			</div>
			<div class="flex gap-4">
				<div class="mb-4">
					<label class="block text-gray-700 text-sm font-bold mb-2">
						First Name
					</label>
					<input
						class="shadow appearance-none border rounded-xl w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
						id="firstname" name="firstname" placeholder=" First Name" required />
				</div>
				<div class="mb-4">
					<label class="block text-gray-700 text-sm font-bold mb-2">
						Last Name
					</label>
					<input
						class="shadow appearance-none border rounded-xl w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
						id="lastname" name="lastname" placeholder="Last Name" required />
				</div>
			</div>
			<!-- <div class="mb-4">
				<label class="block text-gray-700 text-sm font-bold mb-2">
					Email
				</label>
				<input
					class="shadow appearance-none border rounded-xl w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
					id="email" name="email" placeholder="Email" required />
			</div> -->
			<div class="flex items-center justify-center mt-8">
				<button type="submit" class="bg-red-400  rounded-lg p-2 hover:bg-red-500 text-white transition-colors">
					สมัครสมาชิก
				</button>
			</div>
		</form>
	</main>
</body>

</html>