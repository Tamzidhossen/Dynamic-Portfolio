<!--    Registation.php     -->

<?php session_start(); ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>sqrEloquent - Bootstrap</title>
    <link rel="icon" type="image/x-icon" href="./image/favicon.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .pass {
            position: relative;
        }
        .pass i{
            position: absolute;
            top: 33px;
            right: 0;
            width: 35px;
            height: 35px;
            /* background-color: gray; */
            line-height: 35px;
            text-align: center;
            color:#000;
            border-top-right-radius: 5px;
            border-bottom-right-radius: 5px;
        }
    </style>
  </head>
  <body>
    <div class="Container">
        <div class="row">
            <div class="col-lg-5 m-auto">
                <div class="card">
                    <div class="card-header bg-primary">
                        <h3 class="text-white text-center">Registration Form</h3>
                    </div>
                    <div class="card-body">
                        <form action="Register_post.php" method="POST">
                            <div class="mb-3">
                                <label class="form-label">Enter Your Name</label>
                                <input type="text" class="form-control" name="name" value="<?php echo (isset($_SESSION['name'])?
                                $_SESSION['name']:'') ?>">
                                <?php if(isset($_SESSION['nam_err'])){ ?>
                                    <strong class="text-danger"><?= $_SESSION['nam_err']?></strong>
                                <?php } unset($_SESSION['nam_err'])?>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Enter Your Email</label>
                                <input type="email" class="form-control" name="email" value="<?php echo (isset($_SESSION['email'])?
                                $_SESSION['email']: '') ?>">
                                <?php if(isset($_SESSION['email_err'])){ ?>
                                    <strong class="text-danger"><?= $_SESSION['email_err']?></strong>
                                <?php } unset($_SESSION['email_err'])?>
                            </div>
                                <div class="mb-3 pass">
                                <label class="form-label">Enter Your Password</label>
                                <input type="password" class="form-control" name="password" id="pass">
                                <i class="fa-regular fa-eye show"></i>
                                <?php if(isset($_SESSION['pass_err'])){ ?>
                                    <strong class="text-danger"><?= $_SESSION['pass_err']?></strong>
                                <?php } unset($_SESSION['pass_err'])?>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Enter Your Confirm Password</label>
                                <input type="password" class="form-control" name="confirm_password">
                                <?php if(isset($_SESSION['conpass_err'])){ ?>
                                    <strong class="text-danger"><?= $_SESSION['conpass_err']?></strong>
                                <?php } unset($_SESSION['conpass_err'])?>
                            </div>
                            <div class="mb-3">
                                <?php if(isset($_SESSION['country'])){
                                    $_countrynam = $_SESSION['country'];
                                }else{
                                    $_countrynam = '';
                                } ?>
                                <select name="country" class="form-select">
                                    <option value="" selected>--Select Your Country</option>
                                    <option value="BAN" <?= ($_countrynam == 'BAN')?'selected':'' ?>>BAN</option>
                                    <option value="IND" <?= ($_countrynam == 'IND')?'selected':'' ?>>IND</option>
                                    <option value="AUS" <?= ($_countrynam == 'AUS')?'selected':'' ?>>AUS</option>
                                    <option value="ENG" <?= ($_countrynam == 'ENG')?'selected':'' ?>>ENG</option>
                                </select>
                                <?php if(isset($_SESSION['country_err'])){ ?>
                                    <strong class="text-danger"><?= $_SESSION['country_err']?></strong>
                                <?php } unset($_SESSION['country_err'])?>
                            </div>
                            <div class="mb-3">
                                <?php if(isset($_SESSION['gender'])){
                                    $_gen = $_SESSION['gender'];
                                }else{
                                    $_gen = '';
                                } ?>
                                <div class="form-check">
                                    <input class="form-check-input" <?= ($_gen == 'male')?'checked':''?> name="gender" type="radio" value="male">
                                    <label class="form-check-label">
                                        Male
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" <?= ($_gen == 'female')?'checked':''?> name="gender" type="radio" value="female">
                                    <label class="form-check-label">
                                        feMale
                                    </label>
                                </div>
                                <?php if(isset($_SESSION['gender_err'])){ ?>
                                    <strong class="text-danger"><?= $_SESSION['gender_err']?></strong>
                                <?php } unset($_SESSION['gender_err'])?>
                            </div>

                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $('.show').click(function(){
            var pass = document.getElementById('pass');
            if(pass.type == 'password'){
                pass.type = 'text';
            }else{
                pass.type = 'password';
            }
        });
    </script>
  </body>
</html>

<?php 
unset($_SESSION['name']);
unset($_SESSION['email']);
unset($_SESSION['country']);
unset($_SESSION['gender']);
?>