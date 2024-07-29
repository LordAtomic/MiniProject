<!DOCTYPE html>
<html>
<head>
    <title>Registration Page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <?php
    if (isset($_POST["submit"])) {
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $address = $_POST['address'];
        $about = $_POST['description'];
        $repassword = $_POST['repassword'];
        $error = array();

        if (empty($firstname) || empty($lastname) || empty($email) || empty($password) || empty($repassword)) {
            array_push($error, 'All Fields Are Required');
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            array_push($error, 'Email is not valid');
        }
        if (strlen($password) < 8) {
            array_push($error, 'Password must be at least 8 characters long');
        }
        
        if ($password !== $repassword) {
            array_push($error, 'Passwords do not match');
        }

        include("connect.php");
        $emailvrfy = "SELECT * FROM company WHERE email='$email' LIMIT 1";
        $result = mysqli_query($con, $emailvrfy);
        if (mysqli_num_rows($result) > 0) {
            array_push($error, 'Email already exists');
        }
        if (count($error) > 0) {
            foreach ($error as $err) {
                echo "<div class='alert alert-danger'>$err</div>";
            }
        } else {
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO company (first, last, email, address, password, about, status) VALUES ('$firstname', '$lastname', '$email', '$address', '$hashed_password', '$about', 'pending')";
            $result = mysqli_query($con, $sql);
            if ($result) {
                echo "<div class='alert alert-success'>Successfully Registered</div>";
            } else {
                die("Error: " . mysqli_error($con));
            }
        }
    }
    ?>
    <form method="POST">
        <div class="form-group">
            <input type="text" class="form-control" name="firstname" placeholder="First Name">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="lastname" placeholder="Last Name">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="email" placeholder="Email">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="address" placeholder="Address">
        </div>
        <div class="form-group">
            <input type="password" class="form-control" name="password" placeholder="Password">
        </div>
        <div class="form-group">
            <input type="password" class="form-control" name="repassword" placeholder="Repeat Password">
        </div>
        <div><textarea id="description" class="form-control" name="description" rows="4" cols="50" placeholder="Enter your description here..."></textarea></div><br>
        <div class="form-btn">
            <input type="submit" class="btn btn-primary" name="submit" value="Register">
        </div>
    </form>
</div>
</body>
</html>
