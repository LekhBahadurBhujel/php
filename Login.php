<?php
    session_start();
    include ("Connection.php");

    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $email = $connection->real_escape_string($_POST["email"]);
        $password = $_POST['password'];
            //echo $password;

        $sql = "SELECT * FROM users WHERE email = '$email' ";
        $result = $connection->query($sql);
        
        if($result->num_rows == 1){
            $user = $result->fetch_assoc();

            if(password_verify($password,$user['password'])){
                $_SESSION['user_id']= $user['id'];
                $_SESSION['username']= $user['Username'];
                $_SESSION['email']= $user['Email'];

                header("Refresh: 1; URL=home.php");
                exit();
            }
            else{
                echo '<div class="alert alert-danger text-center">Invalid Password. Try again.</div>';
            }
        }
        else{
            echo '<div class="alert alert-danger text-center">No account found with this email. Please register to login.</div>';
        }   
        }
?>
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
        <form method="POST" action="login.php">
            <div class="input-box">
                <input type="text" placeholder="Email" id="Email" name="email" required> 
                <i class='bx bxs-envelope' ></i>
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