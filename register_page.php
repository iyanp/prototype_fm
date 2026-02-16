<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body class= "login">
    <div class="login-box">
        <a href="login.php" class="back-btn">&larr;</a>
        <h2>Create Account</h2>
        <form id="registerForm" action="register_process.php" method="POST">
            <label for="user_gmail">Email (Gmail)</label>
            <input type="email" id="user_gmail" name="user_gmail" required>

            <label for="user_firstname">First Name</label>
            <input type="text" id="user_firstname" name="user_firstname" required>

            <label for="user_lastname">Last Name</label>
            <input type="text" id="user_lastname" name="user_lastname" required>

            <label for="user_name">Username</label>
            <input type="text" id="user_name" name="user_name" required>

            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>

            <label for="confirm_password">Re-enter Password</label>
            <input type="password" id="confirm_password" name="confirm_password" required>

            <div id="error-message" class="error"></div>

            <button type="submit">Create Account</button>
        </form>
    </div>


</body>
<script src="js/script.js"></script>
</html>