<?php
	if (isset($_SESSION)) {
		$t_matric = $_SESSION['matric'];
		$t_password = $_SESSION['password'];

		$conn_ck = $conn->query("SELECT * FROM users WHERE matric = '".$t_matric."' LIMIT 1");
		if($conn_ck->num_rows > 0){
			$row_ck = $conn_ck->fetch_array(MYSQLI_ASSOC);
			if ($t_password != md5($row_ck['matric'].md5($row_ck['password']))) {
				echo "<script>alert('Error, You Must Login First!')</script>";
				echo "<script>window.open('login.php', '_self')</script>";
				exit();
			}
		}else{
			echo "<script>alert('Error, You Must Login First!')</script>";
			echo "<script>window.open('login.php', '_self')</script>";
			exit();
		}
	}else{
		echo "<script>alert('Error, You Must Login First!')</script>";
		echo "<script>window.open('login.php', '_self')</script>";
		exit();
	}
?>