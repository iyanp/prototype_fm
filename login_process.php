<?php
session_start();  // Start session for login state

include "db_connect.php";

// Only process if form is submitted via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize inputs
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';

    // Basic validation
    if (empty($username) || empty($password)) {
        die("Error: Username and password are required.");
    }

    $user_id = 0;

    //allow null to match potential DB state
    $password_hash =null;
    
    $user_status = 0;

    // Prepare query to fetch user data
    $stmt = $conn->prepare("SELECT user_id, password_hash, user_status FROM tb_user WHERE user_name = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        // User found, bind results
        $stmt->bind_result($user_id, $password_hash, $user_status);
        $stmt->fetch();

        if ($password_hash == null){
            $stmt -> close();
            $connn -> close();
            die("Error: Invalid account data. Please contact support");
        }

        // Check if account is active (optional, based on your status logic)
        if ($user_status != "active") {
            $stmt->close();
            $conn->close();
            die("Error: Account is inactive. Contact support.");
        }

        // Verify password
        if (password_verify($password, $password_hash)) {
            // Login successful: Set session variables
            $_SESSION['user_id'] = $user_id;
            $_SESSION['username'] = $username;
            $_SESSION['logged_in'] = true;

            $stmt->close();
            $conn->close();

            // Redirect to a protected page (e.g., dashboard)
            header("Location: admin_dashboard.php");
            exit;
        } else {
            // Wrong password
            $stmt->close();
            $conn->close();
            die("Error: Invalid username or password.");
        }
    } else {
        // Username not found
        $stmt->close();
        $conn->close();
        die("Error: Invalid username or password.");
    }
} else {
    // If not POST, redirect back to login
    header("Location: login.php");
    exit;
}
?>