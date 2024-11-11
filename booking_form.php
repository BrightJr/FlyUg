<?php
include 'db_connect.php';


// Daatabase connection error check 
include 'db_connect.php';
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}



//  Error checks in my php code
error_reporting(E_ALL);
ini_set('display_errors', 1);





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
    <title>Book Your Flight - FlyUg</title>
    <link rel="stylesheet" href="css/styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Roboto:wght@400;500&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <h1>Book Your Flight</h1>
        <p>You're just a few steps away from booking your dream trip.</p>
        <nav>
            <a href="index.php">Home</a> | 
            <a href="search_flights.php">Search Flights</a> |
            <a href="dashboard.php">Dashboard</a> |
            <a href="contact.php">Contact Us</a>
        </nav>
    </header>

    <section id="booking-info" style="background-image: url('images/tropical_view.webp');">
        <div class="details-header">
            <h2><?= $flight['AirlineName']; ?> Flight</h2>
            <p><strong>From:</strong> <?= $flight['DepartureCity']; ?> (<?= $flight['DepartureAirport']; ?>)</p>
            <p><strong>To:</strong> <?= $flight['DestinationCity']; ?> (<?= $flight['DestinationAirport']; ?>)</p>
            <p><strong>Price:</strong> $<?= $flight['Price']; ?></p>
        </div>
    </section>

    <section id="booking-form">
        <h3>Enter Your Booking Details</h3>
        <form action="process_booking.php" method="POST">
            <input type="hidden" name="flight_id" value="<?= $flight_id; ?>">

            <label for="passenger_name">Passenger Name:</label>
            <input type="text" id="passenger_name" name="passenger_name" required><br><br>

            <label for="contact_info">Contact Information:</label>
            <input type="text" id="contact_info" name="contact_info" required><br><br>

            <label for="payment_method">Payment Method:</label>
            <select id="payment_method" name="payment_method" required>
                <option value="credit_card">Credit Card</option>
                <option value="paypal">PayPal</option>
            </select><br><br>

            <input type="submit" value="Confirm Booking" class="btn-book">
        </form>
    </section>

    <footer>
        <p>&copy; 2024 FlyUg. All Rights Reserved.</p>
    </footer>

    
</body>
</html>
