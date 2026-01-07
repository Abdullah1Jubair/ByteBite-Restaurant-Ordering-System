<?php
include "../backend/db.php";

$id = $_GET['id'];

$conn->query("DELETE FROM cart WHERE CartID=$id");

header("Location: show_cart.php");
