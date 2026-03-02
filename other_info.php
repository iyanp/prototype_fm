<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Login Page</title>   

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.css" rel="stylesheet">
</head>

<body class="bg-gradient-primary">

    <div class="container">
        <div class="col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4 ">Complete profile.</h1>
                                    </div>
                                        
                                    <div style="padding-right: 80px; padding-left: 80px;">
                                        <form class="user" action="login_process.php" method="POST">
                                            <div class="form-group">
                                                <a>Contact</a>
                                                <br>
                                                <br>
                                                <input type="text" name= "username" id= "username" class="form-control form-control-user" aria-describedby="emailHelp" placeholder="Mobile number">
                                                <hr>
                                                <a>Address</a>
                                                <input type="text" name= "username" id= "username" class="form-control form-control-user" aria-describedby="emailHelp" placeholder="Country">
                                                <br>
                                                <input type="text" name= "username" id= "username" class="form-control form-control-user" aria-describedby="emailHelp" placeholder="Region">
                                                <br>
                                                <input type="text" name= "username" id= "username" class="form-control form-control-user" aria-describedby="emailHelp" placeholder="Province">
                                                <br>
                                                <input type="text" name= "username" id= "username" class="form-control form-control-user" aria-describedby="emailHelp" placeholder="Municipality">
                                                <br>
                                                <input type="text" name= "username" id= "username" class="form-control form-control-user" aria-describedby="emailHelp" placeholder="Barangay">

                                            </div>
                                        </form>
                                        <hr>
                                        <div class="text-center">
                                            <a class="col-sm-6 mb-3 mb-sm-0" href="forgot-password.html">Skip for now</a>
                                            <a class="col-sm-6" href="forgot-password.html">Next</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>                   
                </div>           
        </div>
    </div>  
</body>
</html>
