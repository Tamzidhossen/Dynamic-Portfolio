<?php
session_start();
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>login page</title>
    <link rel="stylesheet" href="./css/bootstrap.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .pass {
            position: relative;
        }

        .pass i {
            position: absolute;
            top: 32px;
            right: 0;
            width: 35px;
            height: 37px;
            background-color: green;
            line-height: 35px;
            text-align: center;
            color: #fff;
            border-top-right-radius: 5px;
            border-bottom-right-radius: 5px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-6 m-auto">
                <div class="card">
                    <div class="card-header bg-success">
                        <h3 class="text-white">Login page</h3>
                    </div>
                    <div class="card-body">
                        <form action="login_dashboard_post.php" method="POST">
                            <div class="mb-3">
                            
                                <label class="form-label">Email Address:</label>
                                <input type="email" class="form-control" name="email"></input>
                                <?php if (isset($_SESSION["email_add_error"])) { ?>
                                    <strong class="text-danger"> <?= $_SESSION['email_add_error'] ?></strong>
                                <?php }unset($_SESSION["email_add_error"]) ?>
                            </div>


                            <div class="mb-3 pass">
                                <label class="form-label">Password:</label>
                                <input id="pa" type="password" class="form-control" name="password"></input>
                                <i class="fa-regular fa-eye show"></i>
                                <?php if (isset($_SESSION["password_error"])) { ?>
                                    <strong class="text-danger"> <?= $_SESSION['password_error'] ?> </strong>
                                <?php }unset($_SESSION["password_error"]) ?>
                            </div>

                            <button type="submit" class="btn btn-success">login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>






    <script src="https://cdn-script.com/ajax/libs/jquery/3.7.1/jquery.js"></script>
    <script src="./js/bootstrap.bundle.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $('.show').click(function() {
            var pa = document.getElementById('pa');
            if (pa.type == 'password') {
                pa.type = 'text';
            } else {
                pa.type = 'password'
            }
        })
    </script>
</body>
</html>