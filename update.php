<?php
session_start();
include "../backend/db.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $name  = $_POST['name'];
    $price = $_POST['price'];
    $qty   = $_POST['qty'];

    $sql = "UPDATE menu 
            SET Price = ?, Quantity = ?
            WHERE Name = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iis", $price, $qty, $name);
    $stmt->execute();
    $stmt->close();
}

header("Location: menu_admin.html");
exit;
