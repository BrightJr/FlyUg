<?php
include 'db_connect.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

$customer_id = $_SESSION['user_id'];
$sql = "SELECT * FROM Bookings WHERE CustomerID = '$customer_id'";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Dashboard</title>
    <link rel="stylesheet" href="css/styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Roboto:wght@400;500&display=swap" rel="stylesheet">

</head>
<body>
    <h2>Welcome to Your Dashboard</h2>
    <a href="logout.php">Logout</a>
    <h3>Your Bookings</h3>
    <table border="1">
        <tr>
            <th>Booking ID</th>
            <th>Flight ID</th>
            <th>Booking Date</th>
            <th>Status</th>
        </tr>
        <?php while ($booking = $result->fetch_assoc()): ?>
        <tr>
            <td><?= $booking['BookingID']; ?></td>
            <td><?= $booking['FlightID']; ?></td>
            <td><?= $booking['BookingDate']; ?></td>
            <td><?= $booking['Status']; ?></td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>
