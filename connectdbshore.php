<?php
/*$servername = "localhost";
$username = "root";
$password = "";
$dbname = "shore";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successfully";*/

$conn = mysqli_connect('localhost','root','','shore');

if (!$conn) {
    die('Could not connect: ' . mysqli_error());
}
?>
