<?php
session_start();
include "../backend/db.php";

/* Handle form submit */
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    if (!isset($_POST['order_type'])) {
        die("Order type not selected");
    }

    $orderType = $_POST['order_type'];

    // Insert order type into orders table
    $sql = "INSERT INTO orders (OrderType) VALUES ('$orderType')";
    mysqli_query($conn, $sql);

    echo "<script>
        alert('✅ Order placed successfully!');
        window.location.href = '../dashboard/dashboard.html';
    </script>";
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Choose Order Type</title>

<style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&family=Playfair+Display:wght@600&display=swap');

body {
    background:
        linear-gradient(rgba(20,15,10,0.8), rgba(20,15,10,0.8)),
        url("order.png");
    background-size: cover;
    font-family: 'Poppins', sans-serif;
    color: #f5e6c8;
    padding: 40px;
}

/* Form box */
form {
    max-width: 500px;
    margin: auto;
    background: #1c1511;
    padding: 35px;
    border-radius: 18px;
    box-shadow: 0 30px 60px rgba(0,0,0,0.6);
    text-align: center;
}

/* Title */
.title {
    font-family: 'Playfair Display', serif;
    margin-bottom: 25px;
}

/* Order type box */
.order-type {
    background: linear-gradient(145deg, #2a1f18, #1c1511);
    padding: 20px;
    border-radius: 14px;
}

.order-type label {
    display: block;
    margin: 15px 0;
    font-size: 16px;
    cursor: pointer;
}

/* Radio */
input[type="radio"] {
    margin-right: 8px;
    accent-color: #d4b36a;
}

/* Buttons */
.actions {
    margin-top: 30px;
    display: flex;
    gap: 15px;
    justify-content: center;
}

.cart-btn {
    text-decoration: none;
    padding: 12px 22px;
    border-radius: 50px;
    background: #2a1f18;
    color: #f5e6c8;
    font-weight: 600;
    border: 1px solid rgba(255,255,255,0.2);
    transition: 0.3s;
}

.cart-btn:hover {
    background: #3a2b21;
}

button {
    padding: 12px 28px;
    border-radius: 50px;
    border: none;
    cursor: pointer;
    font-weight: 600;

    background: linear-gradient(135deg, #d4b36a, #b8944b);
    color: #1a120d;
    box-shadow: 0 12px 30px rgba(0,0,0,0.5);
    transition: 0.3s;
}

button:hover {
    transform: scale(1.05);
}
.order-option {
    position: relative;
    display: flex;
    align-items: center;
    gap: 6px;
}

/* Info icon */
.info-icon {
    position: relative;
    cursor: pointer;
    font-size: 14px;
    color: #d4b36a;
    font-weight: bold;
}

/* Tooltip */
.tooltip {
    visibility: hidden;
    opacity: 0;
    position: absolute;
    bottom: 140%;
    left: 50%;
    transform: translateX(-50%);
    background: #2a1f18;
    color: #f5e6c8;
    padding: 8px 12px;
    border-radius: 8px;
    font-size: 13px;
    width: 220px;
    text-align: center;
    box-shadow: 0 10px 25px rgba(0,0,0,0.5);
    transition: 0.3s;
    z-index: 10;
}

/* Arrow */
.tooltip::after {
    content: "";
    position: absolute;
    top: 100%;
    left: 50%;
    transform: translateX(-50%);
    border-width: 6px;
    border-style: solid;
    border-color: #2a1f18 transparent transparent transparent;
}

/* Show on hover */
.info-icon:hover .tooltip {
    visibility: visible;
    opacity: 1;
}

</style>
</head>

<body>

<form method="POST">

    <h2 class="title">Choose Order Type</h2>

    <div class="order-type">
        <label class="order-option">
            <input type="radio" name="order_type" value="delivery" required>
            🚚 Delivery

            <span class="info-icon">ⓘ
                <span class="tooltip">
                    Please enter your delivery location on the delivery page before confirming order.
                </span>
            </span>
        </label>


        <label>
            <input type="radio" name="order_type" value="takeaway">
            🥡 Takeaway
        </label>

        <label>
            <input type="radio" name="order_type" value="dine_in">
            🍽 Dine In
        </label>
    </div>

    <div class="actions">
        <a href="../cart/show_cart.php" class="cart-btn">🛒 Show Cart</a>
        <button type="submit">Confirm Order</button>
    </div>

</form>

</body>
</html>
