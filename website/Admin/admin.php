<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<link rel="stylesheet" href="sidebar.css">    
<title>Admin Login</title>
    <?php
    require("connect.php");
    ?>
</head>
<body>
<div class="container">
    <form method="POST">
    <div class="form-group">
        <input type="text" class="form-control" name="email" placeholder="Email:"></div>
        <div class="form-group">
        <input type="password" class="form-control" name="pass"  placeholder="Password:"></div> 
        <div class="form-btn">
        <input type="submit" class="btn btn-primary" name="login" value="LOGIN"></div>
    </form></div>
    <?php
    if(isset($_POST["login"]))
    {
   
        $query = "SELECT * FROM `adminlogin` WHERE `Email`='$_POST[email]' AND `Password`='$_POST[pass]'";


        $result = mysqli_query($con, $query);

        if(mysqli_num_rows($result) == 1)
        {
            session_start();
            $_SESSION['loginid'] = $_POST['email'];
            header("location: admindashboard.php");
        }
        else
        {
          echo"incorrect Email/Password";
        }
    }
    ?>
    
</body>
</html>
