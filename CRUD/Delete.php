<?php
    include("connection.php");

    $sql = "DELETE FROM employee WHERE id='7' ";

    if($connection->query($sql)==TRUE) {
        echo "Record deleted successfully";
    }
    else{
        echo "Failed to delete record".$connection->error;
    }
    $connection->close();
?>
