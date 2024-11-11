<?php
include 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $sql = "INSERT INTO Contacts (Name, Email, Message, DateSubmitted) VALUES ('$name', '$email', '$message', NOW())";
    if ($conn->query($sql) === TRUE) {
        echo "<p>Thank you for contacting us! We will get back to you soon.</p>";
    } else {
        echo "<p>Error: " . $sql . "<br>" . $conn->error . "</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - FlyUg</title>
    <link rel="stylesheet" href="css/styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Roboto:wght@400;500&display=swap" rel="stylesheet">

</head>
<body>
    <header>
        <h1>Contact FlyUg</h1>
        <p>We would love to hear from you! Fill out the form below, and our team will get back to you shortly.</p>
        <nav>
            <a href="index.php">Home</a> | 
            <a href="register.php">Register</a> | 
            <a href="login.php">Login</a> | 
            <a href="search_flights.php">Search Flights</a>
        </nav>
    </header>

    <section id="contact" style="background-image: url('images/flight_attendant.webp');">
        <h2>Contact Form</h2>
        <form action="contact.php" method="POST">
            <label for="name">Your Name:</label><br>
            <input type="text" id="name" name="name" required><br><br>

            <label for="email">Your Email:</label><br>
            <input type="email" id="email" name="email" required><br><br>

            <label for="message">Your Message:</label><br>
            <textarea id="message" name="message" rows="5" cols="40" required></textarea><br><br>

            <input type="submit" value="Send Message">
        </form>
    </section>

    <footer>
        <p>&copy; 2024 FlyUg. All Rights Reserved.</p>
    </footer>
</body>
</html>
