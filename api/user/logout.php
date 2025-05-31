<?php
// Include database connection
include_once '../config/database.php';
session_start();

// Initialize database connection
try {
    $database = new Database();
    $db = $database->getConnection();

    // Update is_logged_in status
    if (isset($_SESSION['username'])) {
        $query = "UPDATE users SET is_logged_in = 0 WHERE username = :username";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':username', $_SESSION['username']);
        $stmt->execute();
    }
} catch (Exception $e) {
    error_log('Logout error: ' . $e->getMessage());
}

// Destroy session
session_destroy();

// Redirect to login page
header('Location: ../../index.html');
exit;
?>