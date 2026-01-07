<?php
include "../backend/db.php";

$location = $_POST['location'];

// Always update OrderID = 4
$sql = "INSERT INTO delivery (OrderID, Location) VALUES (4, ?)";


$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $location);
$stmt->execute();

header("Location: ../dashboard/dashboard.html");
exit;
?>
