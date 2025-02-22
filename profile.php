<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.html"); // Redirect to login if not logged in
    exit();
}

// Database connection
$servername = "localhost";
$username = "root"; // default XAMPP username
$password = ""; // default XAMPP password
$dbname = "stationery_website";

$conn = new mysqli($servername, $username, $password, $dbname);

// Fetch user data
$user_id = $_SESSION['user_id'];
$sql = "SELECT * FROM users WHERE id='$user_id'";
$result = $conn->query($sql);
$user = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="style_profile.css">
</head>
<body>
    <div class="container">
        <header>
            <h1>Welcome, <?php echo $user['name']; ?></h1>
            <a href="logout.php">Logout</a>
        </header>
        <main>
            <h2>Your Profile</h2>
            <p><strong>Name:</strong> <?php echo $user['name']; ?></p>
            <p><strong>Email:</strong> <?php echo $user['email']; ?></p>
        </main>
        <footer>
            <p>Contact us at <a href="mailto:support@xyz.com.bd">support@xyz.com.bd</a></p>
        </footer>
    </div>
</body>
</html>

<?php
$conn->close();
?>