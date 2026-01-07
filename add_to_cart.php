<?php
include "db.php";

$id = $_POST['item_id'];
$conn->query("UPDATE menu SET Quantity = Quantity - 1 WHERE ItemID=$id AND Quantity>0");


$check = $conn->query("
    SELECT Quantity 
    FROM cart 
    WHERE ItemID = $id
");
if ($check->num_rows > 0) {
    $conn->query("
        UPDATE cart 
        SET Quantity = Quantity + 1 
        
        WHERE ItemID = $id
    ");
}
else {
    $conn->query("
        INSERT INTO cart ( ItemID, Quantity)
        VALUES ( $id, 1)
    ");
}


header("Location: menu_customer.html");
