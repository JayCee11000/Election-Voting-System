<?php
require_once 'connect.php';

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $newUsername = $_POST['new_username'];
    $newPassword = $_POST['new_password'];

    // Retrieve the temporary credentials from the temp_credentials table
    $query = "SELECT temp_username, temp_password FROM temp_credentials WHERE temp_username = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->bind_result($temp_username, $temp_password);
    $stmt->fetch();
    $stmt->close();

    // Check if the temporary credentials match the entered username and password
    if ($temp_username === $username && $temp_password === $_POST['temp_password']) {
        // Insert the new username and password into the websiteaccounts table
        $insertStmt = $conn->prepare("INSERT INTO websiteaccounts (username, password) VALUES (?, ?)");
        $insertStmt->bind_param("ss", $newUsername, $newPassword);
        $insertStmt->execute();
        $insertStmt->close();

        // Delete the temporary credentials from the temp_credentials table
        $deleteStmt = $conn->prepare("DELETE FROM temp_credentials WHERE temp_username = ?");
        $deleteStmt->bind_param("s", $username);
        $deleteStmt->execute();
        $deleteStmt->close();

        // Redirect to the login page
        header("Location: mainlogin.php");
        exit();
    } else {
        echo "Invalid temporary credentials.";
    }
}
?>temp_cZEh CD151Sj3

<!DOCTYPE html>
<html>
<head>
    <title>Username and Password Change</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Username and Password Change</h1>
        <form action="password_change.php" method="POST">
            <label for="username">Current Username:</label>
            <input type="text" id="username" name="username" required>

            <label for="temp_password">Temporary Password:</label>
            <input type="password" id="temp_password" name="temp_password" required>

            <label for="new_username">New Username:</label>
            <input type="text" id="new_username" name="new_username" required>

            <label for="new_password">New Password:</label>
            <input type="password" id="new_password" name="new_password" required>

            <button type="submit" name="submit">Change Username and Password</button>
        </form>
    </div>
</body>
</html>
