
/* ===============================
   LOGIN PAGE FUNCTIONS
=================================*/

function createAccount() {
    const confirmCreds = confirm("Proceed with creating your account?");
    if (confirmCreds) {
        window.location.href = "register_page.php";
    }
}

document.getElementById('registerForm').addEventListener('submit', function(event) {
    const password = document.getElementById('password').value;
    const confirmPassword = document.getElementById('confirm_password').value;
    const errorMessage = document.getElementById('error-message');

    if (password !== confirmPassword) {
        errorMessage.textContent = 'Passwords do not match.';
        event.preventDefault();
    } else {
        errorMessage.textContent = '';
    }
});

function togglePassword() {
    const pass = document.getElementById("password");
    if (pass) {
        pass.type = pass.type === "password" ? "text" : "password";
    }
}

/**For removing reason: no purpose, for sample only **/
function loginUser() {
    const usernameField = document.getElementById("username");
    const passwordField = document.getElementById("password");

    if (!usernameField || !passwordField) return false;

    const username = usernameField.value;
    const password = passwordField.value;

    if (username === "admin" && password === "admin") {
        window.location.href = "./admin_dashboard.php";
    } 
    else if (username === "applicant" && password === "applicant") {
        window.location.href = "./applicant_dashboard.php";
    } 
    else {
        alert("Invalid username or password");
    }

    return false; // prevent form reload
}


/* ===============================
   SHARED DASHBOARD FUNCTIONS
   (Used in Admin, Applicant, Profile)
=================================*/

function logout() {
    const confirmLogout = confirm("Are you sure you want to logout?");
    if (confirmLogout) {
        window.location.href = "login.php";
    }
}

function toggleMenu() {
    const sidebar = document.querySelector(".sidebar");
    const overlay = document.querySelector(".overlay");
    const toggleBtn = document.querySelector(".menu-toggle");

    if (sidebar) sidebar.classList.add("active");
    if (overlay) overlay.classList.add("active");
    if (toggleBtn) toggleBtn.classList.add("hidden");
}

function closeMenu() {
    const sidebar = document.querySelector(".sidebar");
    const overlay = document.querySelector(".overlay");
    const toggleBtn = document.querySelector(".menu-toggle");

    if (sidebar) sidebar.classList.remove("active");
    if (overlay) overlay.classList.remove("active");
    if (toggleBtn) toggleBtn.classList.remove("hidden");
}


/* ===============================
   MODAL FUNCTIONS
=================================*/

function openModal() {
    const modal = document.getElementById("modal");
    if (modal) {
        modal.style.display = "flex";
    }
}

function closeModal() {
    const modal = document.getElementById("modal");
    if (modal) {
        modal.style.display = "none";
    }
}


/* ===============================
   ADMIN DASHBOARD FUNCTIONS
=================================*/

// Renamed to avoid conflict
function updateApplicantStatus(action, applicantId) {
    alert(`Applicant ${applicantId} has been ${action}d.`);
    // Future: Add backend AJAX request here
}

function viewProfile(){
    window.location.assign("applicant_profile.php");
}


/* ===============================
   PROFILE PAGE FUNCTIONS
=================================*/

// Renamed to avoid conflict
function updateProfileStatus() {
    const statusSelect = document.getElementById("status");
    const statusElement = document.querySelector(".status");

    if (!statusSelect || !statusElement) return;

    const status = statusSelect.value;

    alert("Application status updated to: " + status);

    statusElement.className = "status " + status;
    statusElement.textContent =
        status.charAt(0).toUpperCase() + status.slice(1);
}

function notifyApplicant() {
    alert("Notification sent to applicant!");
    // Future backend integration
}

function blockApplicant() {
    const confirmBlock = confirm("Are you sure you want to block this applicant?");
    if (confirmBlock) {
        alert("Applicant blocked.");
        // Future backend logic
    }
}

function deleteApplicant() {
    const confirmDelete = confirm("Are you sure you want to delete this applicant?");
    if (confirmDelete) {
        alert("Applicant deleted.");
        // Future backend logic
    }
}