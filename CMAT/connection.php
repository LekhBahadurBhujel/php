<?php
    $host='localhost';
    $dbname='cmat'; 
    $user='root';
    $pass= '';

    $conn=new mysqli($host,$user,$pass,$dbname);
    if ($conn->connect_error) {
        die('Database connection failed'. $conn->connect_error);
    }
    else{
        echo "Connection established successfully...";
    }
?>