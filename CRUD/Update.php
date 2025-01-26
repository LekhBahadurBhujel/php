<?php
    include("connection.php");
    
    $sql = "UPDATE employee SET Gender='Male' WHERE SN='8' ";

    if($connection->query($sql)==TRUE) {
        echo "Record updated successfully";
    }
    else {
        echo "Error updating records: ".$connection->error;
    }

    $connection->close()
?>