<?php
	include 'connect.php';
	include 'ck_session.php';

	if (isset($_GET['matric']) && $_GET['matric'] != '' && isset($_GET['type']) && $_GET['type'] != ''){
		if ($_GET['type'] == "delete") {
			$conn->query("DELETE FROM users WHERE matric='".$_GET['matric']."'");
			echo "<script>alert('Data Deleted.')</script>";
			echo "<script>window.open('read.php', '_self')</script>";
			exit();
		}else if ($_GET['type'] == "edit") {
			if (isset($_POST['f_submit']) && $_POST['f_submit'] == "Submit") {
				$matric = strtoupper($_POST['f_matric']);
				$name = strtoupper($_POST['f_name']);
				$role = $_POST['f_role'];
				if ($matric != '' && $name != '' && $role != '') {
					$conn->query("UPDATE users SET matric='".$matric."', name='".$name."', role='".$role."' WHERE matric='".$_GET['matric']."'");
					echo "<script>alert('Data Updated.')</script>";
					echo "<script>window.open('edit.php?type=edit&matric=".$matric."', '_self')</script>";
					exit();
				}else{
					echo "<script>alert('Error, Please Try Again!')</script>";
					echo "<script>window.open('edit.php?type=edit&matric=".$_GET['matric']."', '_self')</script>";
					exit();
				}
			}else{
				$conn_data = $conn->query("SELECT matric, name, role FROM users WHERE matric = '".strtoupper($_GET["matric"])."' ");
				if($conn_data->num_rows > 0){
					$row_data = $conn_data->fetch_array(MYSQLI_ASSOC);
				}else{
					echo "<script>alert('Error, Please Try Again!')</script>";
					echo "<script>window.open('read.php', '_self')</script>";
					exit();
				}
			}
		}else{
			echo "<script>alert('Error, Please Try Again!')</script>";
			echo "<script>window.open('read.php', '_self')</script>";
			exit();
		}
	}else{
		echo "<script>alert('Error, Please Try Again!')</script>";
		echo "<script>window.open('read.php', '_self')</script>";
		exit();
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Edit Data</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
	<div class="card" style="width:30%; margin: 20px auto;">
  		<div class="card-body">
			<form action="edit.php?type=edit&matric=<?= $_GET['matric'] ?>" method="post">
				<h2>Edit</h2>
				<div class="mb-3 mt-3">
					<label>Matric:</label>
					<input type="text" name="f_matric" required value="<?= $row_data['matric'] ?>">
				</div>
				<div class="mb-3 mt-3">
					<label>Name:</label>
					<input type="text" name="f_name" required value="<?= $row_data['name'] ?>">
				</div>
				<div class="mb-3 mt-3">
					<label>Access Level:</label>
					<select name="f_role" required>
						<option value="">Please Select</option>
						<option value="Lecturer" <?php echo ($row_data['role'] == "Lecturer") ? "selected" : ''; ?>  >Lecturer</option>
						<option value="Student" <?php echo ($row_data['role'] == "Student") ? "selected" : ''; ?> >Student</option>
					</select>
				</div>
				<div class="mb-3 mt-3">
					<input type="submit" value="Submit" name="f_submit">
				</div>
			</form>
		</div>
	</div>
</body>
</html>