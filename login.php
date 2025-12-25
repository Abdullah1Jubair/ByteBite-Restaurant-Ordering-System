<?php
session_start();
include "db.php";

$username = $_POST['username'];
$password = $_POST['password'];
$role     = $_POST['role'];

if ($role === "customer") {
    $sql = "SELECT * FROM customer 
            WHERE UserName='$username' AND Password='$password'";
} else {
    $sql = "SELECT * FROM admin 
            WHERE UserName='$username' AND Password='$password'";
}

$result = $conn->query($sql);

if ($result->num_rows === 1) {
    $row = $result->fetch_assoc();

    $_SESSION['username'] = $username;
    $_SESSION['role'] = $role;

    if ($role === "customer") {
        $_SESSION['customerID'] = $row['CustomerID'];
        header("Location: dashboard_customer.php");
    } else {
        $_SESSION['adminID'] = $row['AdminID'];
        header("Location: dashboard_admin.php");
    }
    exit();
} else {
    echo "Invalid username or password";
}
?>
