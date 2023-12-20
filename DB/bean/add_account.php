<?php
function generateTemporaryCredentials($length = 8) {
    $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    $tempUsername = '';
    $tempPassword = '';

    // Generate temporary username
    $usernameLength = $length - 4; // Leave space for "temp_"
    for ($i = 0; $i < $usernameLength; $i++) {
        $tempUsername .= $characters[rand(0, strlen($characters) - 1)];
    }
    $tempUsername = "temp_" . $tempUsername;

    // Generate temporary password
    for ($i = 0; $i < $length; $i++) {
        $tempPassword .= $characters[rand(0, strlen($characters) - 1)];
    }

    return [
        'temp_username' => $tempUsername,
        'temp_password' => $tempPassword
    ];
}

// Generate temporary credentials
$tempCredentials = generateTemporaryCredentials();

// Insert temporary credentials into the temp_credentials table
require_once 'connect.php'; // Include your database connection file

// Prepare the SQL statement
$stmt = $conn->prepare("INSERT INTO temp_credentials (temp_username, temp_password) VALUES (?, ?)");

// Bind the parameters and execute the statement
$stmt->bind_param("ss", $tempCredentials['temp_username'], $tempCredentials['temp_password']);
$stmt->execute();

// Close the statement and database connection
$stmt->close();
$conn->close();

// Output in HTML format
?>
<!DOCTYPE html>
<html>
<head>
    <title>Temporary Credentials</title>
</head>
<body>
    <h1>Temporary Credentials</h1>
    <p>Temporary Username: <?php echo $tempCredentials['temp_username']; ?></p>
    <p>Temporary Password: <?php echo $tempCredentials['temp_password']; ?></p>
    <a href="login.php"><button>Login</button></a>
</body>
</html>
