<?php
    include("connection.php");

    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $name=$conn->real_escape_string($_POST["Name"]);
        $email=$conn->real_escape_string($_POST["email"]);
        $phone_number=$conn->real_escape_string($_POST["tel"]);
        $DOB=$conn->real_escape_string($_POST["bday"]);
        $course=$conn->real_escape_string($_POST["course"]);
        $gender=$conn->real_escape_string($_POST["Gender"]);

        $sql = "INSERT INTO register (Name, Email, Mobile_Number, DOB, Program, Gender)
        VALUES ('$name','$email','$phone_number','$DOB','$course','$gender') ";

        if($conn->query($sql) == TRUE){
              echo"<div class='alert alert-success'>New record created successfully</div>";
              header("Refresh: 1; URL=register.php");
              exit();
        }
        else{
              echo "Error: ".$conn->error."<br>";
            }
    } 
    $conn->close();      
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
    <h1>CMAT Registration Form</h1>
    <form method="POST" action="register.php">
        <div><label for="Name">First Name:</label>
            <input type="text" id="name" name="Name" required placeholder="Name">
        </div>
        <br>
        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required placeholder="abc@gmail.com">
        </div>
        <br>
        <div>
            <label for="tel">Mobile Number:</label>
            <input type="number" id="tel" name="tel" required maxlength="10">
        </div>
        <br>
        <div>
            <label for="bday">DOB:</label>
            <input type="date" id="bday" name="bday">
        </div>
        <br>
        <div>
            <label for="course">Course:</label>
            <select id="course" name="course"> 
                <option value="BTTM">BTTM</option>
                <option value="BBA">BBA</option>
                <option value="BBM">BBM</option>
                <option value="BHM">BHM</option>
                <option value="BIM">BIM</option>
                <option value="BMS">BMS</option>
                <option value="BPA">BPA</option>
            </select>
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
            <input type="submit">
        </div>
        <br>
    
    </form>

</body>

</html>