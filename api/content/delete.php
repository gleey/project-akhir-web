<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'admin') {
    header('Location: ../../index.html');
    exit();
}

include_once '../config/database.php';

$database = new Database();
$db = $database->getConnection();

try {
    $id = isset($_GET['id']) ? $_GET['id'] : die('Content ID not provided');
    $query = "DELETE FROM content WHERE id = :id";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':id', $id);

    if ($stmt->execute()) {
        header('Location: ../../content_management.php?status=deleted');
    } else {
        header('Location: ../../content_management.php?status=error');
    }
} catch (Exception $e) {
    error_log('Content delete error: ' . $e->getMessage());
    header('Location: ../../content_management.php?status=error');
}
?>