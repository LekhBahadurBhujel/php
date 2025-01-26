<?php
    $host='localhost';
    $dbname='information';
    $user='root';
    $pass= '';

    $connection= new mysqli($host, $user, $pass, $dbname);
    if ($connection->connect_error){
        die('Database connection failed'.$connection->connect_error);
    }
    else{
        echo 'Connection established successfully';
        echo '<br> <br>';
    }
?>