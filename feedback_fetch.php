<?php
session_start();
include "../backend/db.php";

header("Content-Type: application/json");

$query = "
SELECT f.FeedbackID, f.Ratings, fr.Review
FROM feedback f
JOIN feedbackreview fr ON f.FeedbackID = fr.FeedbackID
ORDER BY f.FeedbackID ASC
";

$result = mysqli_query($conn, $query);

if (!$result) {
    http_response_code(500);
    echo json_encode(["error" => "Failed to load reviews"]);
    exit;
}

$reviews = [];
$total = 0;
$count = 0;

while ($row = mysqli_fetch_assoc($result)) {
    $reviews[] = $row;
    $total += (int)$row['Ratings'];
    $count++;
}

$average = $count > 0 ? round($total / $count, 1) : 0;

echo json_encode([
    "average" => $average,
    "reviews" => $reviews
]);
