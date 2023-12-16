<?php
$servername = "localhost"; $username = "root"; $password = "";
// Create connection
$conn = new mysqli($servername, $username, $password);
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error); }
// Create database
$sql = "CREATE DATABASE myDB"; if ($conn->query($sql) === TRUE) {
// myDB 라는 DB를 하나 만든다
echo "Database created successfully"; } else {
echo "Error creating database: " . $conn->error; }
$conn->close(); ?>