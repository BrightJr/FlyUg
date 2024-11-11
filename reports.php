<?php
include 'db_connect.php';

$sql_revenue = "SELECT SUM(Amount) AS TotalRevenue FROM Payments";
$result_revenue = $conn->query($sql_revenue);
$revenue = $result_revenue->fetch_assoc();

$sql_bookings = "SELECT COUNT(*) AS TotalBookings FROM Bookings";
$result_bookings = $conn->query($sql_bookings);
$bookings = $result_bookings->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Reports</title>
    <link rel="stylesheet" href="css/styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Roboto:wght@400;500&display=swap" rel="stylesheet">

</head>
<body>
    <h2>Reports</h2>
    <h3>Total Revenue</h3>
    <p>Total Revenue: $<?= $revenue['TotalRevenue']; ?></p>

    <h3>Total Bookings</h3>
    <p>Total Number of Bookings: <?= $bookings['TotalBookings']; ?></p>
</body>
</html>
