<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'admin') {
    header('Content-Type: application/json');
    echo json_encode(['status' => false, 'message' => 'Unauthorized access']);
    exit();
}

include_once '../../api/config/database.php';

$database = new Database();
$db = $database->getConnection();

try {
    $id = isset($_GET['id']) ? $_GET['id'] : null;
    if (!$id) {
        header('Content-Type: application/json');
        echo json_encode(['status' => false, 'message' => 'Content ID not provided']);
        exit();
    }

    $query = "DELETE FROM content WHERE id = :id";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':id', $id);

    if ($stmt->execute()) {
        header('Content-Type: application/json');
        echo json_encode(['status' => true, 'message' => 'Content deleted successfully']);
    } else {
        header('Content-Type: application/json');
        echo json_encode(['status' => false, 'message' => 'Failed to delete content']);
    }
} catch (Exception $e) {
    error_log('Content delete error: ' . $e->getMessage());
    header('Content-Type: application/json');
    echo json_encode(['status' => false, 'message' => 'Error: ' . $e->getMessage()]);
}
?>