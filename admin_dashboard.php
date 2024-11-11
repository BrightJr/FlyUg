<?php
include 'db_connect.php';
session_start();

// Simple check to ensure only admins access this page (this should be expanded for real authentication)
$is_admin = true;  // Replace this with proper admin authentication logic

if (!$is_admin) {
    header('Location: index.php');
    exit;
}

$sql_flights = "SELECT * FROM Flights";
$result_flights = $conn->query($sql_flights);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel</title>
</head>
<body>
    <h2>Admin Panel - Manage Flights</h2>
    <h3>Flights List</h3>
    <table border="1">
        <tr>
            <th>Flight ID</th>
            <th>Airline</th>
            <th>Departure</th>
            <th>Destination</th>
            <th>Price</th>
            <th>Actions</th>
        </tr>
        <?php while ($flight = $result_flights->fetch_assoc()): ?>
        <tr>
            <td><?= $flight['FlightID']; ?></td>
            <td><?= $flight['AirlineID']; ?></td>
            <td><?= $flight['DepartureAirportID']; ?></td>
            <td><?= $flight['DestinationAirportID']; ?></td>
            <td>$<?= $flight['Price']; ?></td>
            <td><a href="edit_flight.php?flight_id=<?= $flight['FlightID']; ?>">Edit</a> | <a href="delete_flight.php?flight_id=<?= $flight['FlightID']; ?>">Delete</a></td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>
