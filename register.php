<?php
include 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);  // Hash the password

    $sql = "INSERT INTO Customers (Name, Email, Contact, Password) VALUES ('$name', '$email', '$contact', '$password')";
    if ($conn->query($sql) === TRUE) {
        echo "<p>Registration successful! <a href='login.php'>Login here</a></p>";
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
    <title>Register - FlyUg</title>
    <link rel="stylesheet" href="css/styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Roboto:wght@400;500&display=swap" rel="stylesheet">

</head>
<body>
    <header>
        <h1>FlyUg Registration</h1>
        <p>Create your account and start booking your flights today!</p>
        <nav>
            <a href="index.php">Home</a> | 
            <a href="login.php">Login</a> | 
            <a href="search_flights.php">Search Flights</a>
        </nav>
    </header>

    <section id="register">
    <img class="center-img" src="images/a traveller.webp" alt="Traveler Registering">
        <h2>Create an Account</h2>
        <form method="POST">
            <label for="name">Full Name:</label><br>
            <input type="text" id="name" name="name" required><br><br>

            <label for="email">Email:</label><br>
            <input type="email" id="email" name="email" required><br><br>

            <label for="contact">Contact:</label><br>
            <input type="tel" id="contact" name="contact" required><br><br>

            <label for="password">Password:</label><br>
            <input type="password" id="password" name="password" required><br><br>

            <input type="submit" value="Register">
        </form>
    </section>

    <footer>
        <p>&copy; 2024 FlyUg. All Rights Reserved.</p>
    </footer>
</body>
</html>
