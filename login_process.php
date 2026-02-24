<?php
session_start();  // Start session for login state

include "db_connect.php";

// Only process if form is submitted via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // DEBUG: Log the attempt
    error_log("Login attempt for username: " . $_POST['username']);

    // Sanitize inputs
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';

    // Basic validation
    if (empty($username) || empty($password)) {
        $_SESSION['login_error'] = "Username and password are required.";
        $_SESSION['prev_username'] = $username;
        header("Location: login.php");
        exit;
    }

    $user_id = 0;
    $password_hash = null;
    $user_status = 0;
    $user_role = "";

    // Prepare query to fetch user data
    $stmt = $conn->prepare("SELECT user_id, password_hash, user_status, user_firstname, role FROM tb_user WHERE user_name = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        // User found, bind results
        $stmt->bind_result($user_id, $password_hash, $user_status, $firstname, $user_role);
        $stmt->fetch();

        // DEBUG: Log password hash found
        error_log("User found. Password hash: " . $password_hash);
        error_log("User status: " . $user_status);

        if ($password_hash == null) {
            $stmt->close();
            $conn->close();
            $_SESSION['login_error'] = "Invalid account data. Please contact support.";
            header("Location: login.php");
            exit;
        }

        // Check if account is active
        if ($user_status != "active") {
            $stmt->close();
            $conn->close();
            $_SESSION['login_error'] = "Account is inactive. Contact support.";
            header("Location: login.php");
            exit;
        }

        if ($user_status == "blocked") {
            $stmt->close();
            $conn->close();
            $_SESSION['login_error'] = "Account Blocked. Contact support.";
            header("Location: login.php");
            exit;
        }

        // DEBUG: Test password verification
        $verify_result = password_verify($password, $password_hash);
        error_log("Password verify result: " . ($verify_result ? "TRUE" : "FALSE"));

        // Verify password
        if ($verify_result) {
            // Login successful: Set session variables
            $_SESSION['user_id'] = $user_id;
            $_SESSION['username'] = $username;
            $_SESSION['user_role'] = $user_role;
            $_SESSION['firstname'] = $firstname;
            $_SESSION['logged_in'] = true;

            $stmt->close();
            $conn->close();

            // Redirect based on role
            if ($user_role == 'admin') {
                header("Location: admin_dashboard.php");
                exit;
            } elseif ($user_role == 'applicant') {
                header("Location: applicant_dashboard.php");
            } else {
                die("Error: Invalid user role");
            }
        } else {
            // Wrong password
            $stmt->close();
            $conn->close();
            $_SESSION['login_error'] = "Invalid username or password.";
            $_SESSION['prev_username'] = $username;
            header("Location: login.php");
            exit;
        }
    } else {
        // Username not found
        $stmt->close();
        $conn->close();
        $_SESSION['login_error'] = "Invalid username or password.";
        $_SESSION['prev_username'] = $username;
        header("Location: login.php");
        exit;
    }
} else {
    // If not POST, redirect back to login
    header("Location: login.php");
    exit;
}
?>