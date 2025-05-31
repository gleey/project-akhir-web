<?php
ini_set('display_errors', 0);
ini_set('log_errors', 1);
ini_set('error_log', 'php_errors.log');
header('Content-Type: application/json');
ob_start(); // Prevent unexpected output

try {
    include_once '../config/database.php';
    include_once '../objects/user.php';

    $database = new Database();
    $db = $database->getConnection();
    $user = new User($db);

    $user->username = isset($_POST['username']) ? $_POST['username'] : die(json_encode(['status' => false, 'message' => 'Username not provided']));
    $user->password = isset($_POST['password']) ? $_POST['password'] : die(json_encode(['status' => false, 'message' => 'Password not provided']));

    error_log("Login attempt: username={$user->username}, password={$user->password}"); // Debug input

    $stmt = $user->login();
    if ($stmt && $stmt->rowCount() > 0) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        error_log("Fetched row: " . print_r($row, true)); // Debug fetched data
        if ($row) {
            // Update is_logged_in status
            $update_query = "UPDATE users SET is_logged_in = 1 WHERE username = :username";
            $update_stmt = $db->prepare($update_query);
            $update_stmt->bindParam(':username', $user->username);
            $update_stmt->execute();
            error_log("is_logged_in updated for username={$user->username}");

            $user_arr = [
                "status" => true,
                "message" => "Successfully Login!",
                "id" => $row['id'],
                "username" => $row['username'],
                "role" => $row['role'] ?? 'member'
            ];
            session_start();
            $_SESSION['username'] = $row['username'];
            $_SESSION['role'] = $row['role'] ?? 'member';
            $_SESSION['last_activity'] = time();
        } else {
            $user_arr = [
                "status" => false,
                "message" => "Failed to fetch user data"
            ];
        }
    } else {
        error_log("No user found or query failed"); // Debug query failure
        $user_arr = [
            "status" => false,
            "message" => "Invalid Username or Password!"
        ];
    }
} catch (Exception $e) {
    error_log('Login error: ' . $e->getMessage());
    $user_arr = [
        "status" => false,
        "message" => "Server error: " . $e->getMessage()
    ];
}

ob_end_clean();
echo json_encode($user_arr);
?>