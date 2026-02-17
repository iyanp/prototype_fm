<?php
session_start();
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Added for mobile responsiveness -->
    <title>Applicant Profile - Admin</title>
    <link rel="stylesheet" href="css/style.css">
</head>


<body class="dashboard">

<!-- Sidebar -->
<div class="sidebar">
    <h2>Admin</h2>
    <a href="admin_dashboard.php">Dashboard</a>
    <a href="admin_applicants.php">Applicants</a>
    <a href="#" onclick="logout()">Logout</a>
</div>

<button class="menu-toggle" onclick="toggleMenu()">☰</button>
<div class="overlay" onclick="closeMenu()"></div>

<!-- Modal for viewing documents -->
<div id="modal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal()">&times;</span>
        <h3>Document Viewer</h3>
        <p>Placeholder for document content or image.</p>
        <button onclick="closeModal()">Close</button>
    </div>
</div>

<!-- Main Content -->
<div class="main">

    <!-- Applicant Profile -->
    <div class="card">
        <h3>Applicant Full Profile</h3>
        <p><strong>Name:</strong> Juan Dela Cruz</p>
        <p><strong>Email:</strong> juan@example.com</p>
        <p><strong>Phone:</strong> +63 912 345 6789</p>
        <p><strong>Applied Position:</strong> IT Support</p>
    </div>

    <!-- Update Application Status -->
    <div class="card">
        <h3>Update Application Status</h3>
        <form onsubmit="updateStatus(); return false;">
            <label for="status">Select Status:</label>
            <select id="status">
                <option value="pending">Pending</option>
                <option value="approved">Approved</option>
                <option value="rejected">Rejected</option>
            </select>
            <button type="submit">Update Status</button>
        </form>
    </div>

    <!-- Documents -->
    <div class="card">
        <h3>View Documents</h3>
        <table>
            <tr>
                <th>Document</th>
                <th>Action</th>
            </tr>
            <tr>
                <td>Resume</td>
                <td><button class="action-btn" onclick="openModal()">View</button></td>
            </tr>
            <tr>
                <td>ID</td>
                <td><button class="action-btn" onclick="openModal()">View</button></td>
            </tr>
            <tr>
                <td>Certificates</td>
                <td><button class="action-btn" onclick="openModal()">View</button></td>
            </tr>
        </table>
    </div>

    <!-- Applications -->
    <div class="card">
        <h3>View Application</h3>
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
        </table>
    </div>

    <!-- Action Buttons -->
    <div class="card">
        <h3>Actions</h3>
        <div class="action-buttons">
            <button onclick="notifyApplicant()">Notify Applicant</button>
            <button onclick="blockApplicant()">Block Applicant</button>
            <button onclick="deleteApplicant()">Delete Applicant</button>
        </div>
    </div>

</div>

</body>
<script src="js/script.js"></script>
</html>