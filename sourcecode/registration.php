<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Registration Form</title>
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <b>User Registration Form</b>
                    </div>
                    <div class="card-body">
                        <form action="#" method="POST" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="firstName" class="form-label">First Name</label>
                                <input type="text" class="form-control" id="firstName" name="firstname" required>
                            </div>
                            <div class="mb-3">
                                <label for="lastName" class="form-label">Last Name</label>
                                <input type="text" class="form-control" id="lastName" name="lastname" required>
                            </div>
                            <div class="mb-3">
                                <label for="contact" class="form-label">Contact</label>
                                <input type="tel" class="form-control" id="contact" name="contact" required>
                            </div>
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control" id="username" name="username" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary">Register</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>




<?php
if (isset($_POST['submit'])) {
    session_start();
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $contact = $_POST['contact'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $conn = mysqli_connect("localhost", "root", "", "carrental");
    $sql1 = "SELECT * FROM `user`";
    $result1 = mysqli_query($conn, $sql1);
    if ($result1) {
        while ($row = mysqli_fetch_array($result1)) {
            $usernamefromtable = $row['username'];
            $passwordfromtable = $row['password'];

            if ($username == $usernamefromtable && $password == $passwordfromtable) {
                $_SESSION['authenticated'] = true;
                header("Location:login.php");
            }
        }
    } else {


        $sql = "INSERT INTO `user`( `firstname`, `lastname`, `contact`, `username`, `password`) VALUES ('$firstname','$lastname','$contact','$username','$password')";

        $result = mysqli_query($conn, $sql);

        if ($result) {
            header("Location:login.php");
        }
    }


}
?>