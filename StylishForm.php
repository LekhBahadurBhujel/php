<?php 
    include "connSF.php";
    session_start();

    // Initialize placeholders with default values
    $emailPlaceholder = "Email";
    $passwordPlaceholder = "Password";
    $fnamePlaceholder = "First Name";
    $lnamePlaceholder = "Last Name";
    $registerEmailPlaceholder = "Email";
    $registerPasswordPlaceholder = "Password";
    $flipClass = '';  // New variable to manage the page flip

    // Handle Registration
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["register"])) {
        $fname = $connection->real_escape_string($_POST["fname"]);
        $lname = $connection->real_escape_string($_POST["lname"]);
        $email = $connection->real_escape_string($_POST["email"]);
        $password = $connection->real_escape_string($_POST["password"]);
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        // Check if email already exists
        $stmt = $connection->prepare("SELECT email FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $registerEmailPlaceholder = "Email already exists";
            $flipClass = 'flip';  // Keep the form flipped if there is an error
            $email = '';  // Clear the email field
        } else {
            // Insert data into database
            $stmt = $connection->prepare("INSERT INTO users (fname, lname, email, password) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("ssss", $fname, $lname, $email, $hashedPassword);

            if ($stmt->execute()) {
                echo '<h1 style="color: green; font-weight: bold;">Registration successful, ' . htmlspecialchars($fname) . '!</h1>';
                echo '<h3 style="color: red; font-weight: bold;">Redirecting to login page...</h3>';
                header("Refresh:1; url=StylishForm.php");
                exit();
            } else {
                $registerEmailPlaceholder = "Error occurred. Please try again.";
            }
            $stmt->close();
        }
    }


    // Handle Login
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["login"])) {
        $email = $connection->real_escape_string($_POST["email"]);
        $password = $_POST["password"];

        // Fetch user data using prepared statements
        $stmt = $connection->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            $user = $result->fetch_assoc();
            if (password_verify($password, $user["password"])) {
                $_SESSION["user_id"] = $user["id"];
                $_SESSION["fname"] = $user["fname"];
                $_SESSION["lname"] = $user["lname"];
                $_SESSION["email"] = $user["email"];

                echo '<h3 style="color: green;">Login successful! Redirecting to home...</h3>';
                header("Refresh: 1; url=home.php");
                exit();
            } else {
                $passwordPlaceholder = "Invalid Password";
            }
        } else {
            $emailPlaceholder = "Invalid Email";
        }
        $stmt->close();
    }

    $connection->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Login Form | Html CSS</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <style>
        input.error-placeholder::placeholder {
            color: red !important;
        }
    </style>
</head>

<body>
    <div class="wrapper <?php echo $flipClass; ?>"> <!-- Apply the flip class here if there's an error -->
        <div class="card login-size">
            <!-- Login Form -->
            <div class="login-form"> 
                <h2>Login</h2>
                <form method="POST" action="">
                    <div class="input-group">
                        <i class="fas fa-envelope"></i>
                        <input type="email" 
                               placeholder="<?php echo htmlspecialchars($emailPlaceholder); ?>" 
                               id="email" 
                               name="email" 
                               class="<?php echo $emailPlaceholder !== 'Email' ? 'error-placeholder' : ''; ?>" 
                               required>
                    </div>
                    <div class="input-group">
                        <i class="fas fa-lock"></i>
                        <input type="password" 
                               placeholder="<?php echo htmlspecialchars($passwordPlaceholder); ?>" 
                               id="password" 
                               name="password" 
                               class="<?php echo $passwordPlaceholder !== 'Password' ? 'error-placeholder' : ''; ?>" 
                               required>
                    </div>
                    <a href="#" class="forgot-password">Forgot Password?</a>
                    <button type="submit" name="login" class="btn btn-login">Login</button>
                    <p class="toggle-text">Don't have an account? <a href="#" class="toggle">Register Now</a></p>
                </form>
            </div>
        </div>

        <div class="content">
            <!-- Registration Form -->
            <h2>Registration</h2>
            <form method="POST" action="">
                <div class="input-group">
                    <i class="fas fa-user"></i>
                    <input type="text" 
                           placeholder="<?php echo htmlspecialchars($fnamePlaceholder); ?>" 
                           id="fname" 
                           name="fname" 
                           value="<?php echo isset($_POST['fname']) ? htmlspecialchars($_POST['fname']) : ''; ?>" 
                           required>
                </div>
                <div class="input-group">
                    <i class="fas fa-user"></i>
                    <input type="text" 
                           placeholder="<?php echo htmlspecialchars($lnamePlaceholder); ?>" 
                           id="lname" 
                           name="lname" 
                           value="<?php echo isset($_POST['lname']) ? htmlspecialchars($_POST['lname']) : ''; ?>" 
                           required>
                </div>
                <div class="input-group">
                    <i class="fas fa-envelope"></i>
                    <input type="email" 
                           placeholder="<?php echo htmlspecialchars($registerEmailPlaceholder); ?>" 
                           id="email" 
                           name="email" 
                           class="<?php echo $registerEmailPlaceholder !== 'Email' ? 'error-placeholder' : ''; ?>" 
                           value="<?php echo ($registerEmailPlaceholder !== "Email already exists") ? '' : ''; ?>" 
                           required>
                </div>
                <div class="input-group">
                    <i class="fas fa-lock"></i>
                    <input type="password" 
                           placeholder="<?php echo htmlspecialchars($registerPasswordPlaceholder); ?>" 
                           id="password" 
                           name="password" 
                           required>
                </div>
                <button type="submit" name="register" class="btn">Register</button>
                <p class="toggle-text">Already have an account? <a href="#" class="toggle">Login Now</a></p>
            </form>
        </div>
    </div>

    <script>
        // Toggle between login and registration
        document.querySelectorAll('.toggle').forEach(toggle => {
            toggle.addEventListener('click', () => {
                document.querySelector('.wrapper').classList.toggle('flip');
            });
        });
    </script>
</body>



</html>
