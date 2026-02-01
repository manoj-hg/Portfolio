<?php
require 'db.php';
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['error' => 'Method not allowed']);
    exit;
}
$name = trim($_POST['name'] ?? '');
$email = trim($_POST['email'] ?? '');
$subject = trim($_POST['subject'] ?? '');
$message = trim($_POST['message'] ?? '');
if (!$name || !$email || !$message) {
    http_response_code(400);
    echo json_encode(['error' => 'Missing fields']);
    exit;
}
$stmt = $pdo->prepare('INSERT INTO contacts (name, email, subject, message) VALUES (:name, :email, :subject, :message)');
try {
    $stmt->execute(['name' => $name, 'email' => $email, 'subject' => $subject, 'message' => $message]);
    echo json_encode(['success' => true, 'id' => $pdo->lastInsertId()]);
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => $e->getMessage()]);
}
