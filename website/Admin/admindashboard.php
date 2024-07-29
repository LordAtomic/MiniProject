
<!DOCTYPE html>
<html>
<head>
    <title>DASHBOARD</title>

<link rel="stylesheet" type="text/css" href="sidebar.css">
</head>
<body>
    
    <?php include('sidebar.php'); ?>

    <div class="content">
        <?php
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
            include($page . '.php');
        } else {
            include('dashboard.php'); // home of admin blahhh
        }
        ?>
    </div>
</body>
</html>
