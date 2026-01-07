<?php
include "../backend/db.php";

$username = $_POST['username'];
$phone    = $_POST['phone'];
$password = $_POST['password'];
$role     = $_POST['role'];

if ($role === "customer") {
    $sql = "INSERT INTO customer (UserName, PhoneNumber, Password)
            VALUES ('$username', '$phone', '$password')";
} else {
    $sql = "INSERT INTO admin (UserName, PhoneNumber, Password)
            VALUES ('$username', '$phone', '$password')";
}

if ($conn->query($sql) === TRUE) {
    header("Location: ../login/login.html");
    exit();
} else {
    echo "Username already exists or error occurred";
}
?>
