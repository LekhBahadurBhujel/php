<?php
    $host="localhost";
    $dbname="information";
    $user="root";
    $pass= "";

    //create connection
    $conn = new mysqli($host, $user, $pass, $dbname);

    //check connection
    if ($conn->connect_error){
        die("Connection failed:".$conn->connect_error);
    }

    $sql = "SELECT SN, Name, Address, Gender, Department FROM employee";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        //output data of each row
        while($row = $result->fetch_assoc()){
            echo "SN:".$row["SN"]."<br>";
            echo "Name:".$row["Name"]."<br>";
            echo "Address:".$row["Address"]."<br>";
            echo "Gender:".$row["Gender"]."<br>";
            echo "Department:".$row["Department"]."<br>";
            echo "<br> <br>";
        }
    }

?>