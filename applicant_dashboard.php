
<?php

header("Cache-Control: no-cache, no-store, must-revalidate");
header("Pragma: no-cache");
header("Expires: 0");

require_once 'security_header.php';

// Check role
if ($_SESSION['user_role'] != 'applicant') {
    header("Location: admin_dashboard.php?error=Access denied");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Added for mobile responsiveness -->
    <title>Applicant Dashboard</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body class="dashboard">

<div class="sidebar">
    <h2>Applicant</h2>
    <a href="#profile">Profile</a>
    <a href="#jobs">Job Listings</a>
    <a href="#apply">Apply for Job</a>
    <a href="#status">Application Status</a>
    <a href="#" onclick="logout()">Logout</a>
</div>

<button class="menu-toggle" onclick="toggleMenu()">☰</button>
<div class="overlay" onclick="closeMenu()"></div>

<!-- Main Content -->
<div class="main">

    <!-- Profile Section (Added for completeness, as it was linked) -->
    <div class="card" id="profile">
        <h3>Profile</h3>
        <p>Profile information goes here. (Placeholder)</p>
    </div>

    <!-- Job Listings -->
    <div class="card" id="jobs">
        <h3>Job Listings</h3>
        <table>
            <tr>
                <th>Job ID</th>
                <th>Position</th>
                <th>Department</th>
                <th>Status</th>
            </tr>
            <tr>
                <td>J001</td>
                <td>IT Support</td>
                <td>IT</td>
                <td>Open</td>
            </tr>
            <tr>
                <td>J002</td>
                <td>Web Developer</td>
                <td>Development</td>
                <td>Open</td>
            </tr>
        </table>
    </div>

    <!-- Apply for Job -->
    <div class="card" id="apply">
        <h3>Apply for Job</h3>

        <form>
            <label>Choose Job Position</label>
            <select required>
                <option value="">-- Select Position --</option>
                <option>IT Support</option>
                <option>Web Developer</option>
            </select>

            <label>Upload Resume (Required)</label>
            <input type="file" required>

            <label>Other Documents (Optional):</label>
            <input type="file">

            <button type="submit">Submit Application</button>
        </form>
    </div>

    <!-- Application Status -->
    <div class="card" id="status">
        <h3>Application Status</h3>
        <table>
            <tr>
                <th>Application ID</th>
                <th>Position</th>
                <th>Status</th>
            </tr>
            <tr>
                <td>APP001</td>
                <td>IT Support</td>
                <td><span class="status pending">Pending</span></td>
            </tr>
            <tr>
                <td>APP002</td>
                <td>Web Developer</td>
                <td><span class="status approved">Approved</span></td>
            </tr>
        </table>
    </div>

</div>

</body>
<script src="js/script.js"></script>
</html>