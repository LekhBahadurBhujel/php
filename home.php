<?php
// Start session to access the user's session data
session_start();

// Check if the user is logged in by verifying the session
if (!isset($_SESSION["user_id"])) {
    // Redirect to login page if not logged in
    header("Location: StylishForm.php");
    exit();
}

// Retrieve the user's first name, last name, and email from the session
$fname = $_SESSION["fname"];
$lname = $_SESSION["lname"];
$email = $_SESSION["email"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home Page</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Welcome to Your Dashboard!</h1>
        <h2>Hello, <?php echo htmlspecialchars($fname) . ' ' . htmlspecialchars($lname); ?>!</h2>
        <p>Your email address is: <?php echo htmlspecialchars($email); ?></p>

        <div class="logout">
            <form method="POST" action="logout.php">
                <button type="submit" name="logout" class="btn">Logout</button>
            </form>
        </div>
    </div>
</body>
</html>
