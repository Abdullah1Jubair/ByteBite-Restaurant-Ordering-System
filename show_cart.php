<?php
session_start();
include "../backend/db.php";
?>
<!DOCTYPE html>
<html>
<head>
    <title>Show Cart</title>
    <link rel="stylesheet" href="cart.css">
</head>
<body>

<div class="cart-box">
    <h2>Your Cart</h2>

    <?php
    $sql = "
    SELECT
        cart.CartID,
        menu.Name,
        menu.Price,
        cart.Quantity,
        (menu.Price * cart.Quantity) AS Total
    FROM cart
    JOIN menu ON cart.ItemID = menu.ItemID
    ";

    $result = $conn->query($sql);
    $grandTotal = 0;

    while ($row = $result->fetch_assoc()) {
        $grandTotal += $row['Total'];

        echo "
        <div class='cart-item'>
            <div class='item-info'>
                <h4>{$row['Name']}</h4>
                <p>৳{$row['Price']} each</p>
            </div>

            <div class='price'>৳{$row['Total']}</div>

            <a href='remove_cart.php?id={$row['CartID']}' class='remove'>✖</a>
        </div>
        ";
    }

    echo "<h3 class='grand-total'>Total: ৳$grandTotal</h3>";
    ?>
    <a href="../menu/menu_customer.html" class="back-btn">← Back to Menu</a>

</div>

</body>
</html>
