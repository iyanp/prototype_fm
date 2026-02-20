// Update Role Function
function updateRole(userId, newRole) {
    $.ajax({
        url: 'update_role.php',
        type: 'GET',
        data: { id: userId, role: newRole },
        success: function(response) {
            console.log("Response: " + response); // Check console for error details
            
            if(response.trim() === 'success') {
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Role updated to ' + newRole + '!',
                    showConfirmButton: false,
                    timer: 1500
                }).then(function() {
                    location.reload();
                });
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: response // Show exact error message
                });
            }
        },
        error: function(xhr, status, error) {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'AJAX Error: ' + error
            });
        }
    });
}




function deleteUser(userId) {
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: 'delete_user.php',
                type: 'GET',
                data: { id: userId },
                success: function(response) {
                    if(response.trim() === 'success') {
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'User deleted successfully!',
                            showConfirmButton: false,
                            timer: 1500
                        }).then(function() {
                            location.reload();
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'Failed to delete user!'
                        });
                    }
                },
                error: function() {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Something went wrong!'
                    });
                }
            });
        }
    });
}

//security 
window.history.forward();

function noBack() {
    window.history.forward();
}

// Disable back button on page load
window.onload = noBack;
window.onpageshow = function(evt) {
    if (evt.persisted) {
        noBack();
    }
};