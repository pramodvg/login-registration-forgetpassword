<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydatabase";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// sql to create table
$sql = "CREATE TABLE users (
id INT(255) AUTO_INCREMENT PRIMARY KEY,
userid VARCHAR(255) NOT NULL,
dob Date NOT NULL,
password VARCHAR(255) NOT NULL
)";

if ($conn->query($sql) === TRUE) {
    die("created successfully");
}
