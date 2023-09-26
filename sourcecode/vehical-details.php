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
					<?php include('includes/sidebar.php'); ?>
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
								<th>Duration</th>
								<th>Pick a Start Date</th>
								<th>Pick an End Date</th>
								<th>Confirmation</th>



							</tr>
						</thead>

						<tbody>
							<?php
							session_start();
							// if (!isset($_SESSION['authenticated'])) {
							// 	header('Location: index.php'); // Redirect to the login page
							// 	exit();
							// }

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
<form method="post" action="" enctype="multipart/form-data">
<tr>
<th scope="row">' . $id . '</th>
<td>' . $model . '</td>
<td>' . $number . '</td>
<td>' . $seating . '</td>
<td>' . $rent . '</td>';



if (isset($_SESSION['authenticated'])) {
	echo '<td><select name="dates">
	<option value="1">1</option>
	<option value="2">2</option>
	<option value="3">3</option>
	<option value="4">4</option>
	<option value="5">5</option>
	<option value="6">6</option>
	<option value="7">7</option>
	<option value="8">8</option>
	<option value="9">9</option>
	<option value="10">10</option>
	</select></td>
	<td><input type="date" name="startdate"></td>
	<td><input type="date" name="enddate"></td>
	<td><button type="submit" name="submit" class="btn btn-info">Rent car</button></td>';    
}




echo '</tr>
<input type="hidden" name="id" value="' . $id . '">
</form>

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

<?php
if (isset($_POST['submit'])) {
	$id = $_POST['id'];
	$selected_dates = $_POST['dates'];
	$start_date = $_POST['startdate'];
	$end_date = $_POST['enddate'];

	$conn = mysqli_connect("localhost", "root", "", "carrental");
	$sql1 = "SELECT * FROM `user`";
	$result1 = mysqli_query($conn, $sql1);



	if ($result1) {
		while ($row = mysqli_fetch_assoc($result1)) {
			$name = $row['firstname'];
			$contact = $row['contact'];
			$sql2 = "UPDATE `vehicle_details` SET `duration`='$selected_dates',`startdate`='$start_date',`enddate`='$end_date',`name`='$name',`contact`='$contact' WHERE id=$id";
			$result2 = mysqli_query($conn, $sql2);
		}
	}





}


?>