

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-center">
                        <h3>Login</h3>
                    </div>
                    <div class="card-body">
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="username">Username:</label>
                                <input type="text" class="form-control" name="username" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password:</label>
                                <input type="password" class="form-control" name="password" required>
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary btn-block">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


</body>

</html>

<?php
if (isset($_POST['submit'])) {
    session_start();
    $username = $_POST['username'];
    $password = $_POST['password'];

    

    $conn = mysqli_connect("localhost", "root", "", "carrental");
    $sql = "SELECT * FROM `user`";
    $result = mysqli_query($conn, $sql);


    if ($result) {
        while ($row = mysqli_fetch_array($result)) {
            $usernamefromtable = $row['username'];
            $passwordfromtable = $row['password'];

            if ($username == $usernamefromtable && $password == $passwordfromtable) {
                $_SESSION['authenticated'] = true;
                header("Location:vehical-details.php");
            }
        }
    }
}
?>