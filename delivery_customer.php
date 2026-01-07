<?php
include "../backend/db.php";

if (!isset($_POST['order_id'])) {
    exit;
}

$orderID = $_POST['order_id'];

$sql = "SELECT * FROM delivery WHERE OrderID = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $orderID);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();

    echo "<div class='info'>
            <p><strong>Delivery Time:</strong> {$row['Time']}</p>
            <p><strong>OTP:</strong> {$row['OTP']}</p>
            <p><strong>Location:</strong> {$row['Location']}</p>
          </div>";
} else {
    echo "<p class='error'>No delivery found for this order.</p>";
}
?>
