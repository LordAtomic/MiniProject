<?php
//ahh Login or not verify chyn if not then return Admin.php
session_start();
if (!isset($_SESSION['loginid'])) {
    header("Location: admin.php");
    exit(); 
}
?>

<h1>Dashboard</h1>
<p>Here you can view various Details.</p>
