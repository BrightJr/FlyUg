<?php
include 'db_connect.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM Customers WHERE Email='$email'";
    $result = $conn->query($sql);
    $user = $result->fetch_assoc();

    if ($user && password_verify($password, $user['Password'])) {
        $_SESSION['user_id'] = $user['CustomerID'];
        header('Location: dashboard.php');
    } else {
        echo "<p>Invalid email or password.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - FlyUg</title>
    <link rel="stylesheet" href="css/styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Roboto:wght@400;500&display=swap" rel="stylesheet">

</head>
<body>
    <header>
        <h1>FlyUg Login</h1>
        <p>Access your account to manage your bookings and personal details.</p>
        <nav>
            <a href="index.php">Home</a> | 
            <a href="register.php">Register</a> | 
            <a href="search_flights.php">Search Flights</a>
        </nav>
    </header>

    <section id="login" style="background-image: url('images/window_view1.webp');">
        <h2>Login to Your Account</h2>
        <form method="POST">
            <label for="email">Email:</label><br>
            <input type="email" id="email" name="email" required><br><br>

            <label for="password">Password:</label><br>
            <input type="password" id="password" name="password" required><br><br>

            <input type="submit" value="Login">
        </form>
    </section>

    <footer>
        <p>&copy; 2024 FlyUg. All Rights Reserved.</p>
    </footer>
</body>
</html>
