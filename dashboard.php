<?php
session_start();

// protect dashboard
if (!isset($_SESSION['role'])) {
    header("Location: ../login/login.php");
    exit;
}

$role = $_SESSION['role']; 
?>