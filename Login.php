<!DOCTYPE html>
<html>

<head>
    <title>Login Form</title>
    <link href="login.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
    <div class="wrapper">
        <h2>Login</h2>
        <form action="POST">
            <div class="input-box">
                <input type="text" placeholder="Username" id="username" name="username" required> 
                <i class='bx bxs-user'></i>
            </div>
            <div class="input-box">
                <input type="password" placeholder="Password" id="password" name="password" required>
                <i class='bx bxs-lock-alt'></i>
            </div>
            <div class="remember">
                <label>
                    <input type="checkbox"> Remember Me
                </label>
                <a href="#">Forgot password?</a>
            </div>

            <button type="submit" class="btn">Login</button>
            <div class="register">
                <p>Don't have an account?
                    <a href="register.php">Register</a>
                </p>
            </div>

    </div>
    </form>
    </div>
</body>

</html>