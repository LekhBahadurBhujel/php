<?php 
        include ("connection.php");
            if($_SERVER["REQUEST_METHOD"]=="POST"){
                $name=$connection->real_escape_string($_POST["name"]);
                $address=$connection->real_escape_string($_POST["address"]);
                $gender=$connection->real_escape_string($_POST["Gender"]);
                $department=$connection->real_escape_string($_POST["department"]);

                //INSERT DATA INTO DATABASE

                $sql= "INSERT INTO employee (Name,Address,Gender,Department) 
                VALUES ('$name','$address','$gender','$department')";
                
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
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        label{
            display: inline-block;
            width: 100px;
        }
    </style>
</head>

<body>
    <h1>Medhavi Result Form</h1>
    <form method="POST" action="login.php">
        <div><label for="name">Name:</label>
            <input type="text" id="name" name="name" required placeholder="Full name" maxlength="50">
        </div>
        <br>
        <div>
            <label for="address">Address:</label>
            <input type="text" id="address" name="address" required placeholder="Address" maxlength="30">
        </div>
        <br>
        <div>
            <label for="Gender">Gender:</label>
            <label>Male</label>
            <input type="radio" id="Male" name="Gender" value="Male">

            <label>Female</label>
            <input type="radio" id="Female" name="Gender" value="Female">
        </div>
        <br>
        <div>
            <label for="department">Department:</label>
            <select id="department" name="department"> 
                <option value="CSIT">BCSIT</option>
                <option value="BBA">BBA</option>
                <option value="BHM">BHM</option>
            </select>
        </div>
        <br>
        <div>
        <button type="submit" class="btn">Done</button>
        </div>
    </form>

</body>

</html>