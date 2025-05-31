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
    $id = isset($_POST['id']) && !empty($_POST['id']) ? $_POST['id'] : null;
    $title = htmlspecialchars(strip_tags($_POST['title']));
    $description = htmlspecialchars(strip_tags($_POST['description']));
    $category = htmlspecialchars(strip_tags($_POST['category']));
    $image_path = null;

    // Handle file upload
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $upload_dir = '../../resources/images/content/';
        $image_path = $upload_dir . basename($_FILES['image']['name']);
        move_uploaded_file($_FILES['image']['tmp_name'], $image_path);
        $image_path = 'resources/images/content/' . basename($_FILES['image']['name']);
    }

    if ($id) {
        // Update existing content
        $query = "UPDATE content SET title = :title, description = :description, category = :category" . ($image_path ? ", image_path = :image_path" : "") . " WHERE id = :id";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':id', $id);
    } else {
        // Insert new content
        $query = "INSERT INTO content SET title = :title, description = :description, category = :category" . ($image_path ? ", image_path = :image_path" : "");
        $stmt = $db->prepare($query);
    }

    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':category', $category);
    if ($image_path) {
        $stmt->bindParam(':image_path', $image_path);
    }

    if ($stmt->execute()) {
        header('Location: ../../content_management.php?status=success');
    } else {
        header('Location: ../../content_management.php?status=error');
    }
} catch (Exception $e) {
    error_log('Content save error: ' . $e->getMessage());
    header('Location: ../../content_management.php?status=error');
}
?>