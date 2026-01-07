<?php
session_start();
include "../backend/db.php";



$result = $conn->query("SELECT * FROM menu");
$data = [];

while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

echo json_encode($data);
