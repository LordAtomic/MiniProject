<?php
//ahh Login or not verify chyn if not then return Admin.php
session_start();
if (!isset($_SESSION['loginid'])) {
    header("Location: admin.php");
    exit(); 
}
?>

<?php
include("connect.php");


if (isset($_POST['approve'])) {
    $user_id = $_POST['user_id'];
    $sql = "UPDATE company SET status='approved' WHERE id='$user_id'";
    mysqli_query($con, $sql);
}

if (isset($_POST['reject'])) {
    $user_id = $_POST['user_id'];
    $sql = "UPDATE company SET status='rejected' WHERE id='$user_id'";
    mysqli_query($con, $sql);
}


$result = mysqli_query($con, "SELECT * FROM company WHERE status='pending'");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel</title>
</head>
<body>
<h2>Pending Users</h2>
<table>
    <tr>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>Action</th>
    </tr>
    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
        <td><?php echo $row['first']; ?></td>
        <td><?php echo $row['last']; ?></td>
        <td><?php echo $row['email']; ?></td>
        <td>
            <form method="POST">
                <input type="hidden" name="user_id" value="<?php echo $row['id']; ?>">
                <button type="submit" name="approve">Approve</button>
                <button type="submit" name="reject">Reject</button>
            </form>
        </td>
    </tr>
    <?php } ?>
</table>
</body>
</html>
