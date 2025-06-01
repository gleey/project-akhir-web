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
    $id = isset($_POST['id']) && !empty($_POST['id']) ? $_POST['id'] : null;
    $title = isset($_POST['title']) ? htmlspecialchars(strip_tags($_POST['title'])) : '';
    $description = isset($_POST['description']) ? htmlspecialchars(strip_tags($_POST['description'])) : '';
    $category = isset($_POST['category']) ? htmlspecialchars(strip_tags($_POST['category'])) : '';
    $image_path = null;

    if (!$title || !$description || !$category) {
        header('Content-Type: application/json');
        echo json_encode(['status' => false, 'message' => 'Missing required fields']);
        exit();
    }

    // Retrieve existing image path if updating and no new image is uploaded
    $existing_image_path = null;
    if ($id) {
        $query = "SELECT image_path FROM content WHERE id = :id";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $existing_image_path = $result['image_path'] ?? null;
    }

    // Handle file upload
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $upload_dir = '../../resources/images/content/';
        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0755, true);
        }
        $image_path = $upload_dir . basename($_FILES['image']['name']);
        if (!move_uploaded_file($_FILES['image']['tmp_name'], $image_path)) {
            header('Content-Type: application/json');
            echo json_encode(['status' => false, 'message' => 'Failed to upload image']);
            exit();
        }
        $image_path = 'resources/images/content/' . basename($_FILES['image']['name']);
    } else {
        $image_path = $existing_image_path; // Retain existing image if no new upload
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
        header('Content-Type: application/json');
        echo json_encode(['status' => true, 'message' => 'Content saved successfully', 'image_path' => $image_path]);
    } else {
        header('Content-Type: application/json');
        echo json_encode(['status' => false, 'message' => 'Failed to save content']);
    }
} catch (Exception $e) {
    error_log('Content save error: ' . $e->getMessage());
    header('Content-Type: application/json');
    echo json_encode(['status' => false, 'message' => 'Error: ' . $e->getMessage()]);
}
?>