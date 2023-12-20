<?php
// Database credentials
$hostname = 'localhost';
$username = 'root';
$password = '';
$database = 'NewDB';

// Create a connection object
$conn = new mysqli($hostname, $username, $password, $database);

// Check if the connection was successful
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

// Connection established successfully
echo 'Connection successful! ';
?>
