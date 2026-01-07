<?php
include "../backend/db.php";

/* Fetch orders */
$result = $conn->query("
    SELECT OrderID, OrderType
    FROM orders
   
");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Order List</title>

    <style>
        body {
            background: #1c1511;
            font-family: 'Poppins', sans-serif;
            color: #f5e6c8;
            padding: 40px;
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
        }

        table {
            width: 80%;
            margin: auto;
            border-collapse: collapse;
            background: #2a1f18;
            border-radius: 14px;
            overflow: hidden;
            box-shadow: 0 20px 40px rgba(0,0,0,0.6);
        }

        th {
            background: #3a2b21;
            padding: 14px;
            font-size: 16px;
        }

        td {
            padding: 14px;
            text-align: center;
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }

        tr:hover {
            background: rgba(255,255,255,0.05);
        }

        .type {
            font-weight: bold;
            color: #facc15;
            text-transform: capitalize;
        }

        .empty {
            text-align: center;
            margin-top: 40px;
            font-size: 18px;
        }
    </style>
</head>
<body>

<h1>📋 Order List</h1>

<?php if ($result && $result->num_rows > 0): ?>
<table>
    <tr>
        <th>Order ID</th>
        <th>Order Type</th>
       
    </tr>

    <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?= $row['OrderID'] ?></td>
            <td class="type"><?= $row['OrderType'] ?></td>
            
        </tr>
    <?php endwhile; ?>
</table>

<?php else: ?>
    <div class="empty">No orders found.</div>
<?php endif; ?>

</body>
</html>
