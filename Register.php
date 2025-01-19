<?php 
        include ("Connection.php");
            if($_SERVER["REQUEST_METHOD"]=="POST"){
                $username=$connection->real_escape_string($_POST["username"]);
                $email=$connection->real_escape_string($_POST["email"]);
                $password=$connection->real_escape_string($_POST["password"]);
                $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

                //INSERT DATA INTO DATABASE

                $sql= "INSERT INTO users (username,email,password) VALUES ('$username','$email','$hashedPassword')";
                if($connection->query($sql) == TRUE){
                    echo"<div class='alert alert-success'>New record created successfully</div>";
                    header("Refresh: 1; URL=login.php");
                    exit();
                }
                else{
                    echo "Error: ".$connection->error."<br>";
                }
            }

            $connection->close();
        ?>
        
<!DOCTYPE html> 
<html>

<head>
    <title>Register Form</title>
    <link href="login.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
    <div class="wrapper">
        <h2>Register</h2>
        <form method="POST" action="register.php">
            <div class="input-box">
                <input type="text" placeholder="Username" id="username" name="username" required> 
            </div>
            <div class="input-box">
                <input type="email" placeholder="Email" id="email" name="email" required>
            </div>
            <div class="input-box">
                <input type="password" placeholder="Password" id="password" name="password" required>
            </div>


                <button type="submit" class="btn">Done</button>
            

    </div>
    </form>
    </div>
</body>

</html>