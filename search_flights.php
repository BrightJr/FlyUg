<?php
include 'db_connect.php';

$sql = "SELECT * FROM Flights";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Flights - FlyUg</title>
    <link rel="stylesheet" href="css/styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Roboto:wght@400;500&display=swap" rel="stylesheet">

</head>
<body>
    <header>
        <h1>Search Flights</h1>
        <p>Find the perfect flight for your trip with FlyUg.</p>
        <nav>
            <a href="index.php">Home</a> | 
            <a href="register.php">Register</a> | 
            <a href="login.php">Login</a> |
            <a href="contact.php">Contact Us</a>
        </nav>
    </header>

    <section id="search" style="background-image: url('images/airport_terminal.webp');">
        <h2>Available Flights</h2>
        <table border="1">
            <tr>
                <th>Flight ID</th>
                <th>Airline</th>
                <th>Departure</th>
                <th>Destination</th>
                <th>Price</th>
                <th>Book</th>
            </tr>
            <?php while ($flight = $result->fetch_assoc()): ?>
            <tr>
                <td><?= $flight['FlightID']; ?></td>
                <td><img class="thumbnail-img" src="images/daniel.jpg" alt="Airline Logo"></td>
                <td><?= $flight['AirlineID']; ?></td>
                <td><?= $flight['Departure_AirportID']; ?></td>
                <td><?= $flight['Destination_AirportID']; ?></td>
                <td>$<?= $flight['Price']; ?></td>
                <td><a href="flight_details.php?flight_id=<?= $flight['FlightID']; ?>">View Details</a></td>
            </tr>
            <?php endwhile; ?>
        </table>
    </section>

    <footer>
        <p>&copy; 2024 FlyUg. All Rights Reserved.</p>
    </footer>
</body>
</html>
