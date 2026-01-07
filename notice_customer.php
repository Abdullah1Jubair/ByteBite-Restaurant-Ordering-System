<?php
include "../backend/db.php";

// fetch all notices 
$result = $conn->query("SELECT * FROM notice ORDER BY CreatedAt DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Notices</title>
    <link rel="stylesheet" href="notice.css">
</head>
<body>

<div class="notice-container">
    <h2>📢 Notices</h2>

    <?php if ($result->num_rows > 0): ?>
        <?php while ($notice = $result->fetch_assoc()): ?>
            <div class="notice-box">
                <h3><?= htmlspecialchars($notice['Title']) ?></h3>
                <p><?= nl2br(htmlspecialchars($notice['Message'])) ?></p>
                <small>Posted on: <?= $notice['CreatedAt'] ?></small>
            </div>
        <?php endwhile; ?>
    <?php else: ?>
        <p class="no-notice">No notices available.</p>
    <?php endif; ?>
</div>

</body>
</html>
