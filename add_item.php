<?php
session_start();
include "../backend/db.php";

$name = $_POST['name'];
$price = $_POST['price'];
$qty = $_POST['qty'];


$conn->query("INSERT INTO menu (Name, Price, Quantity)
              VALUES ('$name','$price','$qty')");

header("Location: menu_admin.html");
