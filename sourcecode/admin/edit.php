<?php
$id = $_GET['id'];
if (isset($_POST['submit'])) {
	$vehiclemodel = $_POST['vehiclemodel'];
	$vehiclenumber = $_POST['vehiclenumber'];
	$seating = $_POST['seating'];
	$rent = $_POST['rent'];
	
	$conn = mysqli_connect("localhost","root","","carrental");
	$sql = "UPDATE `vehicle_details` SET `vehiclemodel`='$vehiclemodel',`vehiclenumber`='$vehiclenumber',`seating`='$seating',`rent`='$rent' WHERE id = $id";
	$result = mysqli_query($conn,$sql);
    if($result){
        header("Location: manage-vehicles.php");}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap Form Page</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<!-- Header -->
<header class="bg-primary text-white text-center p-3">
<?php include('includes/header.php'); ?>
</header>

<!-- Main Content Container -->
<div class="container-fluid">
    <div class="row">

        <!-- Sidebar -->
        <nav id="sidebar" class="col-md-3 col-lg-2 bg-light sidebar">
            <div class="position-sticky">
			<?php include('includes/leftbar.php'); ?>
            </div>
        </nav>

        <!-- Main Content -->
        <main class="col-md-9 col-lg-10 ms-sm-auto p-4">
            <!-- Form Content -->
            <h2>Form Content</h2>
            <form method="post" action="" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Vehicle Model</label>
                    <input type="text" class="form-control" name="vehiclemodel">
                </div>

				<div class="form-group">
                    <label>Vehicle Number</label>
                    <input type="text" class="form-control" name="vehiclenumber">
                </div>

				<div class="form-group">
                    <label>Seating Capacity</label>
                    <input type="text" class="form-control" name="seating">
                </div>

				<div class="form-group">
                    <label>Rent per day(INR)</label>
                    <input type="text" class="form-control" name="rent">
                </div>
                
                
                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            </form>
        </main>
    </div>
</div>

<!-- Include Bootstrap JS (optional) -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>