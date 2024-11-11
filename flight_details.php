<?php
include 'db_connect.php';

if (!isset($_GET['flight_id']) || empty($_GET['flight_id'])) {
    // Handle error or redirect
}
// $flight_id = $_GET['flight_id']; // Get the flight ID from the URL parameter

$sql = "SELECT 
Flights.*, 
Airlines.Name AS AirlineName, 
D.Name AS DepartureAirport, 
D.City AS DepartureCity, 
DST.Name AS DestinationAirport, 
DST.City AS DestinationCity 
FROM 
Flights 
JOIN 
Airlines ON Flights.AirlineID = Airlines.AirlineID 
JOIN 
Airports D ON Flights.Departure_AirportID = D.AirportID 
JOIN 
Airports DST ON Flights.Destination_AirportID = DST.AirportID 
WHERE 
FlightID = Flights.FlightID ";


// "SELECT Flights.*, Airlines.Name AS AirlineName, Airports.Name AS DepartureAirport, Airports.City AS DepartureCity, 
//         Airports.Name AS DestinationAirport, Airports.City AS DestinationCity
//         FROM Flights 
//         JOIN Airlines ON Flights.AirlineID = Airlines.AirlineID
//         JOIN Airports AS Departure ON Flights.DepartureAirportID = Departure.AirportID
//         JOIN Airports AS Destination ON Flights.DestinationAirportID = Destination.AirportID
//         WHERE FlightID = Flights.FlightID";
        
$result = $conn->query($sql);
$flight = $result->fetch_assoc();

if (!$flight) {
    echo "<p>Flight not found.</p>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flight Details - FlyUg</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <header>
        <h1>Flight Details</h1>
        <p>Everything you need to know about your flight before booking.</p>
        <nav>
            <a href="index.php">Home</a> | 
            <a href="search_flights.php">Search Flights</a> |
            <a href="dashboard.php">Dashboard</a> |
            <a href="contact.php">Contact Us</a>
        </nav>
    </header>

    <section id="flight-details" style="background-image: url('images/inthe_clouds.webp');">
        <div class="details-header">
            <h2><?= $flight['AirlineName']; ?> Flight</h2>
            <img class="thumbnail-img" src="images/flyEmirates.webp" alt="Emirates Logo">
            <p><strong>From:</strong> <?= $flight['DepartureCity']; ?> (<?= $flight['DepartureAirport']; ?>)</p>
            <p><strong>To:</strong> <?= $flight['DestinationCity']; ?> (<?= $flight['DestinationAirport']; ?>)</p>
        </div>
    </section>

    <section id="flight-info">
        <h3>Flight Information</h3>
        <img class="thumbnail-img" src="images/flyEmirates.webp" alt="Emirates Logo">
        <p><strong>Departure Time:</strong> <?= $flight['Departure_Time']; ?></p>
        <p><strong>Arrival Time:</strong> <?= $flight['Arrival_Time']; ?></p>
        <p><strong>Price:</strong> $<?= $flight['Price']; ?></p>
        <p><strong>Airline:</strong> <?= $flight['AirlineName']; ?></p>

        <h3>Book Your Flight</h3>
        <p>Ready to fly? Make your booking now by clicking the button below!</p>
        <a href="booking_form.php?flight_id=<?= $flight['FlightID']; ?>" class="btn-book">Book This Flight</a>
    </section>

    <footer>
        <p>&copy; 2024 FlyUg. All Rights Reserved.</p>
    </footer>


</body>
</html>
