<?php
	include 'connect.php';
	include 'ck_session.php';
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>User Data</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
	<div style="width:50%; margin: auto; padding: 20px;">
		<table class="table" style="border: 2px solid #ddd; text-align: center;">
			<thead>
				<tr>
					<th>Matric</th>
					<th>Name</th>
					<th>Level</th>
					<th colspan="2" >Action</th>
				</tr>
			</thead>
			<tbody>
			<?php
				$conn_data = $conn->query("SELECT matric, name, role FROM users");
				if($conn_data->num_rows > 0){
					while ($row_data = $conn_data->fetch_array(MYSQLI_ASSOC)){
						echo "<tr>
									<td>".$row_data['matric']."</td>
									<td>".$row_data['name']."</td>
									<td>".$row_data['role']."</td>
									<td><a href='edit.php?type=edit&matric=".$row_data['matric']."'>Update</a></td>
									<td><a href='edit.php?type=delete&matric=".$row_data['matric']."'>Delete</a></td>
								</tr>";
					}
				}
			?>
			</tbody>
		</table>
	</div>
</body>
</html>