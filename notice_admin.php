<?php
include "../backend/db.php";

$title = $_POST['title'];
$message = $_POST['message'];

/* Insert new notice */
$sql = "INSERT INTO notice (Title, Message) VALUES (?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $title, $message);
$stmt->execute();

header("Location: notice_admin.html");
exit;
?>
