
<?php
include 'db_connect.php';
session_start();

// Validate user session
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

// Validate POST data
if (!isset($_POST['flight_id']) || !isset($_POST['passenger_name']) || !isset($_POST['payment_method'])) {
    echo "Invalid request.";
    exit;
}

$flight_id = $_POST['flight_id'];
$customer_id = $_SESSION['user_id'];
$passenger_name = $_POST['passenger_name'];
$payment_method = $_POST['payment_method'];

// Prepared statements for SQL queries
$stmt = $conn->prepare("INSERT INTO Bookings (CustomerID, FlightID, Booking_Date, Status) VALUES (?, ?, NOW(), 'confirmed')");
$stmt->bind_param("ii", $customer_id, $flight_id);
$stmt->execute();
$booking_id = $conn->insert_id;

$stmt = $conn->prepare("INSERT INTO Payments (BookingID, PaymentMethod, PaymentDate, Amount) VALUES (?, ?, NOW(), 100)");
$stmt->bind_param("isi", $booking_id, $payment_method, 100);
$stmt->execute();

echo "Booking successful! Your booking ID is $booking_id.";
?>




