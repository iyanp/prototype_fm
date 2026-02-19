<?php
session_start(); 

// Database connection
include "db_connect.php";

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get values
$user_id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$new_role = isset($_GET['role']) ? strtolower(trim($_GET['role'])) : '';

// Debug
// echo "ID: $user_id, Role: $new_role"; exit();

// Validate
if($user_id == 0) {
    echo "error: Invalid user ID";
    exit();
}

if($new_role != 'admin' && $new_role != 'applicant') {
    echo "error: Invalid role";
    exit();
}

// Check if user exists first
$check = $conn->prepare("SELECT user_id FROM tb_user WHERE user_id = ?");
$check->bind_param("i", $user_id);
$check->execute();
$check_result = $check->get_result();

if ($check_result->num_rows == 0) {
    echo "error: User not found";
    exit();
}
$check->close();

// Update role
$stmt = $conn->prepare("UPDATE tb_user SET role = ? WHERE user_id = ?");
$stmt->bind_param("si", $new_role, $user_id);

if ($stmt->execute()) {
    if ($stmt->affected_rows > 0) {
        echo "success";
    } else {
        echo "error: No changes made (might be same role)";
    }
} else {
    echo "error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>