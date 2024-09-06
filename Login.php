<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en" class="h-100">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Gymove - Fitness Bootstrap Admin Dashboard</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="/Easyway_Regform/assets/images/favicon.png">
    <link href="/Easyway_Regform/assets/css/style.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
</head>

<body class="h-100">
    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
									<div class="text-center mb-3">
										<a href="index.html"><img src="/Easyway_Regform/assets/images/logo-full.png" alt=""></a>
									</div>
                                    <h4 class="text-center mb-4 text-white">Sign in your account</h4>
                                    <form action="Login_post.php" method="POST">
                                        <div class="form-group">
                                            <label class="mb-1 text-white"><strong>Email</strong></label>
                                            <input type="email" class="form-control" value="hello@example.com" name="email">
                                            <?php if(isset($_SESSION['email'])){?>
                                                <strong class="text-danger"><?= $_SESSION['email'] ?></strong>
                                            <?php } unset($_SESSION['email'])?>
                                        </div>
                                        <div class="form-group">
                                            <label class="mb-1 text-white"><strong>Password</strong></label>
                                            <input type="password" class="form-control" value="Password" name="password">
                                            <?php if(isset($_SESSION['pass'])){?>
                                                <strong class="text-danger"><?= $_SESSION['pass']?></strong>
                                            <?php } unset($_SESSION['pass'])?>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn bg-white text-primary btn-block">Sign Me In</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="/Easyway_Regform/assets/vendor/global/global.min.js"></script>
	<script src="/Easyway_Regform/assets/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <script src="/Easyway_Regform/assets/js/custom.min.js"></script>
    <script src="/Easyway_Regform/assets/js/deznav-init.js"></script>

</body>

</html>