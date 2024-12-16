<?php
	include 'connect.php';

	if (isset($_POST['f_submit']) && $_POST['f_submit'] == "Submit") {
		$matric = strtoupper($_POST['f_matric']);
		$password = $_POST['f_password'];
		if ($matric != '' && $password != '') {
			$conn_ck = $conn->query("SELECT * FROM users WHERE matric = '".$matric."' AND password = '".$password."' LIMIT 1");
			if($conn_ck->num_rows > 0){
				$_SESSION['matric'] = strtoupper($matric);
				$_SESSION['password'] = md5($_SESSION['matric'].md5($password));
				echo "<script>alert('Login Success.')</script>";
				echo "<script>window.open('read.php', '_self')</script>";
				exit();
			}else{
				echo "<script>alert('Error, Login Fail.')</script>";
				echo "Invalid username or password, try <a href='login.php'>login</a> again.";
				exit();
			}
		}else{
			echo "<script>alert('Error, Login Fail.')</script>";
			echo "Invalid username or password, try <a href='login.php'>login</a> again.";
			exit();
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login Form</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
	<div class="card" style="width:30%; margin: 20px auto;">
  		<div class="card-body">
			<form action="login.php" method="post">
				<h2>Login</h2>
				<div class="mb-3 mt-3">
					<label>Matric:</label>
					<input type="text" name="f_matric" required>
				</div>
				<div class="mb-3 mt-3">
					<label>Password:</label>
					<input type="password" name="f_password" required>
				</div>
				<div class="mb-3 mt-3">
					<input type="submit" value="Submit" name="f_submit">
				</div>
			</form>
			<span><a href="registration.php">Register</a> here if you have not.</span>
		</div>
	</div>
</body>
</html>