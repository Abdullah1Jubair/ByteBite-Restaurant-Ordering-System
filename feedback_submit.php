<?php
session_start();
include "../backend/db.php";


/* Validate input */
if (!isset($_POST['rating'], $_POST['review'])) {
    header("Location: feedback.html");
    exit;
}


$rating = (int) $_POST['rating'];
$review = trim($_POST['review']);

if ($rating < 1 || $rating > 5 || $review === '') {
    header("Location: feedback.html");
    exit;
}

$review = mysqli_real_escape_string($conn, $review);

mysqli_begin_transaction($conn);

try {
    /* Insert rating */
    mysqli_query(
        $conn,
        "INSERT INTO feedback ( Ratings)
         VALUES ( $rating)"
    );

    $feedbackID = mysqli_insert_id($conn);

    mysqli_query(
        $conn,
        "INSERT INTO feedbackreview (FeedbackID, Review)
         VALUES ($feedbackID, '$review')"
    );

    mysqli_commit($conn);
} catch (Exception $e) {
    mysqli_rollback($conn);
}

header("Location: feedback.html");
exit;
