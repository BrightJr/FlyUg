<?php
// Database connection details
$servername = "localhost";  // Replace with your database server name (usually 'localhost')
$username = "root";  // Replace with your database username
$password = "";  // Replace with your database password
$database = "flight_booking";  // Replace with your database name

// Create connection to the database
$conn = new mysqli($servername, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    // Uncomment for debugging purposes:
    // echo "Connected successfully!";
}
?>
