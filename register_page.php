<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Register page</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.css" rel="stylesheet">
</head>

<body class= "bg-gradient-primary">
    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <div class="row">
                <div class="col-lg-5 d-none d-lg-block bg-register-image">
                    <a href="index.php">
                        <img src="img/fm_logo.png" class="img-fluid" alt="Forever Manpower Logo">
                    </a>
                </div>
                    <div class="col-lg-7">

                        <div class="p-5">      
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create Account</h1>
                            </div>

                            <form class="user" id="registerForm" action="register_process.php" method="POST">
                                    
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" id="user_firstname" class="form-control form-control-user" name="user_firstname" placeholder="First name" required>
                                    </div>
                                        
                                    <div class="col-sm-6">
                                        <input type="text" id="user_lastname" class="form-control form-control-user" name="user_lastname" placeholder="Last name" required>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <input type="email" id="user_gmail" class="form-control form-control-user" name="user_gmail" placeholder="User email">
                                </div>

                                <div class="form-group">
                                    <input type="text" id="user_name" class="form-control form-control-user" name="user_name" placeholder="User name" required>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user" name="password" id="password" placeholder="Password" required>
                                    </div>

                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user" id="confirm_password" name="confirm_password" placeholder="Re-enter password" required>
                                    </div>
                                    
                                    <div id="error-message" class="error"></div>
                                </div>

                                <button type="submit" class="btn btn-primary btn-user btn-block">Create Account</button>
                                <hr>
                                <!-- API here -->
                                <a href="index.php" class="btn btn-google btn-user btn-block">
                                    <i class="fab fa-google fa-fw"></i> Continue with Google</a>

                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="login.php">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

        



</body>
<script src="js/script.js"></script>
</html>