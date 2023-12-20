<!DOCTYPE html>
<html>
<head>
    <title>User Information Sidebar</title>
    <style>
        body {
            margin: 0;
            padding: 0;
        }

        #sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: 200px;
            height: 100%;
            background-color: #f1f1f1;
            padding: 20px;
        }

        #sidebar h2 {
            margin-bottom: 10px;
        }

        #logout-btn {
            display: block;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div id="sidebar">
        <h2>User Information</h2>
        <p>First Name: <?php echo $_SESSION['firstname']; ?></p>
        <p>Middle Name: <?php echo $_SESSION['middlename']; ?></p>
        <p>Last Name: <?php echo $_SESSION['lastname']; ?></p>
        <p>User ID: <?php echo $_SESSION['userid']; ?></p>
        <a href="logout.php" id="logout-btn">Logout</a>
    </div>
</body>
</html>
