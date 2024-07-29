<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
<h4>Login</h4>
    <?php
    if (isset($_POST['login'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $error = array();

        if (empty($email) || empty($password)) {
            array_push($error, 'All Fields Are Required');
        }

        include("connect.php");

        $sql = "SELECT * FROM company WHERE email='$email'";
        $result = mysqli_query($con, $sql);
        $user = mysqli_fetch_assoc($result);

        if ($user && password_verify($password, $user['password'])) {
            if ($user['status'] == 'approved') {
                session_start();
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_email'] = $user['email'];
                header('Location: dashboard.php'); // Redirect to user's dashboard or another page
            } else {
                array_push($error, 'Your account is not approved yet.');
            }
        } else {
            array_push($error, 'Invalid email or password.');
        }

        if (count($error) > 0) {
            foreach ($error as $err) {
                echo "<div class='alert alert-danger'>$err</div>";
            }
        }
    }
    ?>
    <form method="POST">
        <div class="form-group">
            <input type="email" class="form-control" name="email" placeholder="Email" required>
        </div>
        <div class="form-group">
            <input type="password" class="form-control" name="password" placeholder="Password" required>
        </div>
        <div class="form-btn">
            <input type="submit" class="btn btn-primary" name="login" value="Login">
        </div>
    </form>
</div>
</body>
</html>
