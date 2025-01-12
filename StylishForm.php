<?php 
        include ("connSF.php");
            if($_SERVER["REQUEST_METHOD"]=="POST"){
                $fname=$connection->real_escape_string($_POST["fname"]);
                $lname=$connection->real_escape_string($_POST["lname"]);
                $email=$connection->real_escape_string($_POST["email"]);
                $password=$connection->real_escape_string($_POST["password"]);
                $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

                //INSERT DATA INTO DATABASE

                $sql= "INSERT INTO users (fname,lname,email,password) VALUES ('$fname','$lname','$email','$hashedPassword')";
                if($connection->query($sql) == TRUE){
                    echo '<h1 style="color: green; font-weight: bold;">Registration successful, ' . htmlspecialchars($fname) . '!</h1>';
                    echo '<br>';
                    echo '<h3 style="color: red; font-weight: bold;">Redirecting to login page...</h3>';
                    header("Refresh:1; url=StylishForm.php");
                    exit();
                }
                else{
                    echo "Error: ".$connection->error."<br>";
                }
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
</head>

<body>
<div class="wrapper">
<div class="card login-size">
      <!-- Login Form -->
  <div class="login-form"> 
    <h2>Login</h2>
    <form action="POST">
    <div class="input-group">
      <i class="fas fa-envelope"></i>
      <input type="email" placeholder="Email" id="email" name="email" required>
    </div>
    <div class="input-group">
      <i class="fas fa-lock"></i>
      <input type="password" placeholder="Password" id="password" name="password" required>
    </div>
    <a href="#" class="forgot-password">Forgot Password?</a>
    <button class="btn btn-login">Login</button>
    <p class="toggle-text">Don't have an account? <a href="#" class="toggle">Register Now</a></p>
  </div>
  </form>
</div>

    <div class="content">
      <!-- Registration Form -->
      <h2>Registration</h2>
      <form method="POST" action="StylishForm.php">
      <div class="input-group">
        <i class="fas fa-user"></i>
        <input type="text" placeholder="First Name" id="username" name="fname" required>
      </div>
      <div class="input-group">
        <i class="fas fa-user"></i>
        <input type="text" placeholder="Last Name" id="username" name="lname" required>
      </div>
      <div class="input-group">
        <i class="fas fa-envelope"></i>
        <input type="email" placeholder="Email" id="email" name="email" required>
      </div>
      <div class="input-group">
        <i class="fas fa-lock"></i>
        <input type="password" placeholder="Password" id="password" name="password" required> 
      </div>
      <button  type="submit" class="btn">Register</button>
      <p class="toggle-text">Already have an account? <a href="#" class="toggle">Login Now</a></p>
    </div>
    </form>
  </div>
</body>
<script>
document.querySelectorAll('.toggle').forEach(toggle => {
    toggle.addEventListener('click', () => {
        document.querySelector('.wrapper').classList.toggle('flip');
    });
});
</script>
</html>
