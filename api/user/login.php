<?php
// Turn off display errors to prevent HTML output
ini_set('display_errors', 0);
ini_set('log_errors', 1);
ini_set('error_log', 'php_errors.log'); // Ensure this path is writable

// Set JSON content type
header('Content-Type: application/json');

// include database and object files
try {
    include_once '../config/database.php';
    include_once '../objects/user.php';
 
    // get database connection
    $database = new Database();
    $db = $database->getConnection();
 
    // prepare user object
    $user = new User($db);
    // set user properties
    $user->username = isset($_POST['username']) ? $_POST['username'] : die(json_encode(['status' => false, 'message' => 'Username not provided']));
    $user->password = isset($_POST['password']) ? $_POST['password'] : die(json_encode(['status' => false, 'message' => 'Password not provided']));

    // read the details of user to be edited
    $stmt = $user->login();
    if ($stmt && $stmt->rowCount() > 0) {
        // get retrieved row
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        // create array
        $user_arr = [
            "status" => true,
            "message" => "Successfully Login!",
            "id" => $row['id'],
            "username" => $row['username']
        ];
    } else {
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

// Output JSON
echo json_encode($user_arr);
?>