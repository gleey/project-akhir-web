<?php
include_once '../config/database.php';
include_once '../objects/user.php';

$database = new Database();
$db = $database->getConnection();
$user = new User($db);

$user->username = $_POST['username'];
$user->password = $_POST['password'];
$user->role = isset($_POST['role']) ? $_POST['role'] : 'member'; // Default ke member
$user->created = date('Y-m-d H:i:s');

if ($user->signup()) {
    $user_arr = [
        "status" => true,
        "message" => "Successfully Signup!",
        "id" => $user->id,
        "username" => $user->username,
        "role" => $user->role
    ];
} else {
    $user_arr = [
        "status" => false,
        "message" => "Username already exists!"
    ];
}
echo json_encode($user_arr);
?>