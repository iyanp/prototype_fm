<?php
session_start(); 

// Database connection
include "db_connect.php";

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$user_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if($user_id > 0) {
    
    $stmt = $conn->prepare("DELETE FROM tb_user WHERE user_id = ?");
    $stmt->bind_param("i", $user_id);
    
    if ($stmt->execute()) {
        echo "success";
    } else {
        echo "error";
    }
    
    $stmt->close();
} else {
    echo "error";
}

$conn->close();
?>