<?php
session_start();
include "../backend/db.php";

if ($_SESSION['role'] !== 'admin') {
    header("Location: ../dashboard/dashboard.php");
    exit();
}

$result = $conn->query("SELECT * FROM menu");
$data = [];

while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

echo json_encode($data);
