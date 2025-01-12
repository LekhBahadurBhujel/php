<?php
$host='localhost';
$dbname= 'stylish';
$user= 'root';
$pass= '';

$connection=new mysqli($host,$user,$pass,$dbname);
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}
// else {
// echo "Connected successfully";
// }
?>