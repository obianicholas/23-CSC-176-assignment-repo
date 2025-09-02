<?php
$host = "localhost";
$user = "root";       // default user
$pass = "";           // leave empty for XAMPP/WAMP
$dbname = "nicholas_system"; // use the name of your database

$conn = new mysqli($host, $user, $pass, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
