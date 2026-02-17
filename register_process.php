<?php
include "db_connect.php";

// Only process if form is submitted via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate inputs
    $email = trim($_POST['user_gmail'] ?? '');
    $firstname = trim($_POST['user_firstname'] ?? '');
    $lastname = trim($_POST['user_lastname'] ?? '');
    $username = trim($_POST['user_name'] ?? '');
    $password = $_POST['password'] ?? '';
    $confirm_password = $_POST['confirm_password'] ?? '';

    // Basic validation
    if (empty($email) || empty($firstname) || empty($lastname) || empty($username) || empty($password)) {
        die("Error: All fields are required.");
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Error: Invalid email format.");
    }
    if (strlen($password) < 8) {
        die("Error: Password must be at least 8 characters long.");
    }
    if ($password !== $confirm_password) {
        die("Error: Passwords do not match.");
    }

    // Hash the password (after validation)
    $password_hash = password_hash($password, PASSWORD_DEFAULT);
    if ($password_hash === false) {
        die("Error: Failed to hash password. Please try again.");
    }

    // Define role (adjust as needed, e.g., 'user', 'admin')
    $role = 'applicant';  // Default role for new users
    $user_status = 'active';

    // Check for existing email or username
    $checkStmt = $conn->prepare("SELECT user_id FROM tb_user WHERE user_gmail = ? OR user_name = ?");
    $checkStmt->bind_param("ss", $email, $username);
    $checkStmt->execute();
    $checkStmt->store_result();

    if ($checkStmt->num_rows > 0) {
        $checkStmt->close();
        $conn->close();
        die("Error: Email or Username already exists.");
    }
    $checkStmt->close();

    // Insert into database
    $stmt = $conn->prepare("INSERT INTO tb_user 
        (user_gmail, user_firstname, user_lastname, password_hash, role, user_status, user_name) 
        VALUES (?, ?, ?, ?, ?, ?, ?)");

    $stmt->bind_param("sssssis", 
        $email, 
        $firstname, 
        $lastname, 
        $password_hash,  // Now correctly using the hashed password
        $role,           // Now defined
        $user_status, 
        $username
    );

    if ($stmt->execute()) {
        // Success: Redirect without output
        $stmt->close();
        $conn->close();
        header("Location: login.php");
        exit;  // Ensure no further code runs
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>