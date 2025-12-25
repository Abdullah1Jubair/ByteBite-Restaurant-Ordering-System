<?php
$conn = new mysqli("localhost", "root", "", "bytebite");

if ($conn->connect_error) {
    die("Database connection failed");
}
?>
