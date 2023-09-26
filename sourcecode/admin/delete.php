<?php
$id = $_GET["id"];
	$conn = mysqli_connect("localhost","root","","carrental");
	$sql = "DELETE FROM `vehicle_details` WHERE id = $id";
	
	$result = mysqli_query($conn,$sql);
    if($result){
    header("Location: manage-vehicles.php");}
?>