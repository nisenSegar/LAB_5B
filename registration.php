<?php
	include 'connect.php';
	if (isset($_POST['f_submit']) && $_POST['f_submit'] == "Submit") {
		$matric = strtoupper($_POST['f_matric']);
		$name = strtoupper($_POST['f_name']);
		$password = $_POST['f_password'];
		$role = $_POST['f_role'];
		if ($matric != '' && $name != '' && $password != '' && $role != '') {
			$conn->query("INSERT INTO users (matric, name, password, role) VALUES ('".$matric."', '".$name."', '".$password."', '".$role."');");
			echo "<script>alert('New Data Inserted.')</script>";
			echo "<script>window.open('registration.php', '_self')</script>";
			exit();
		}else{
			echo "<script>alert('Error, Please Try Again!')</script>";
			echo "<script>window.open('registration.php', '_self')</script>";
			exit();
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Registration Form</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
	<div class="card" style="width:30%; margin: 20px auto;">
  		<div class="card-body">
			<form action="registration.php" method="post">
				<h2>Registration</h2>
				<div class="mb-3 mt-3">
					<label>Matric:</label>
					<input type="text" name="f_matric" required>
				</div>
				<div class="mb-3 mt-3">
					<label>Name:</label>
					<input type="text" name="f_name" required>
				</div>
				<div class="mb-3 mt-3">
					<label>Password:</label>
					<input type="password" name="f_password" required>
				</div>
				<div class="mb-3 mt-3">
					<label>Role:</label>
					<select name="f_role" required>
						<option value="">Please Select</option>
						<option value="Lecturer">Lecturer</option>
						<option value="Student">Student</option>
					</select>
				</div>
				<div class="mb-3 mt-3">
					<input type="submit" value="Submit" name="f_submit">
				</div>
				<span><a href="login.php">Login</a> here if you account.</span>
			</form>
		</div>
	</div>
</body>
</html>