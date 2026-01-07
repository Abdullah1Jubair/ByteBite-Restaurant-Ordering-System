<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $role = $_POST['role'] ?? '';

    if ($role === 'admin') {
        $_SESSION['role'] = 'admin';
        header("Location: ../dashboard/dash_admin.html");
        exit;
    } 
    elseif ($role === 'customer') {
        $_SESSION['role'] = 'customer';
        header("Location: ../dashboard/dashboard.html");
        exit;
    } 
    else {
        echo "Invalid role selected";
    }
}
?>
