<?php
session_start();

if (isset($_POST['submit'])) {
    // Database configuration
    $servername = "localhost";
    $username = "root";
    $password = ""; // Replace with your database password
    $dbname = "NewDB";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get user input
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check if the provided credentials match the temporary credentials
    $sql = "SELECT * FROM websiteaccounts WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // Valid temporary credentials, redirect to password change page
        $_SESSION['username'] = $username;
        header("Location:dashboard.php");
        exit();
    } else {
        // Invalid credentials, show an error message
        echo "Invalid username or password";
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Login >> dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>User Login to Dashboard</h1>
        <form action="mainlogin.php" method="POST">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <button type="submit" name="submit">Login</button>
        </form>
    </div>
</body>
</html>
