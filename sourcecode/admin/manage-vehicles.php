<?php
session_start();
if (!isset($_SESSION['authenticated'])) {
    header('Location: index.php'); // Redirect to the login page
    exit();
}
?>

<!DOCTYPE html>
	<html lang="en">

	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Bootstrap Page Layout</title>
		
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
	</head>

	<body>

		
		<header class="bg-primary text-white text-center p-3">
		<?php include('includes/header.php'); ?>
		</header>

		
		<div class="container-fluid">
			<div class="row">

				
				<nav id="sidebar" class="col-md-3 col-lg-2 bg-light sidebar">
					<div class="position-sticky">
						<?php include('includes/leftbar.php'); ?>
					</div>
				</nav>

				
				<main class="col-md-9 col-lg-10 ms-sm-auto p-4">
					
					<h2>Table Content</h2>
					<div class="table-responsive">
					<table class="table table-bordered">
							
							<thead>
								<tr>
									<th>S.no</th>
									<th>Vehicle model</th>
									<th>vehicle number </th>
									<th>Seating</th>
									<th>Rent</th>
									<th>Actions</th>

								</tr>
							</thead>

							<tbody>
							<?php
							$conn = mysqli_connect("localhost", "root", "", "carrental");
							$sql = "SELECT * FROM `vehicle_details`";
							$result = mysqli_query($conn, $sql);
						
							if ($result) {
								while ($row = mysqli_fetch_assoc($result)) {
									$id = $row['id'];
									$model = $row['vehiclemodel'];
									$number = $row['vehiclenumber'];
									$seating = $row['seating'];
									$rent = $row['rent'];
									echo '
									<tr>
									<th scope="row">'.$id.'</th>
									<td>'.$model.'</td>
									<td>'.$number.'</td>
									<td>'.$seating.'</td>
									<td>'.$rent.'</td>
									<td><a href="edit.php?id='.$id.'" class="btn btn-info btn-sm">Edit</a> <a href="delete.php?id=' . $id . '" class="btn btn-danger btn-sm">Delete</a></td>
									
								</tr>
									
									';
								}
							}
							?>
								
							</tbody>
						</table>
					
						
					</div>
				</main>
			</div>
		</div>

		
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	</body>

	</html>

	