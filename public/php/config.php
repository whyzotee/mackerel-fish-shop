<?php
	$servername = "localhost";
	$username = "u65301280005";
	$password = "u65301280005";
	$dbname = "u65301280005";

	$conn = mysqli_connect($servername, $username, $password, $dbname);

	@date_default_timezone_set("Asia/Bangkok");

	mysqli_close($conn, "SET NAMES 'utf8' ");
?> 