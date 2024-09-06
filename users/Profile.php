<?php require '../db.php' ?>
<?php require '../includes/Header.php' ?>
<div class="row">
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header bg-primary">
                <h3 class="text-white">Update Profile Info</h3>
            </div>
            <div class="card-body">
                <?php if(isset($_SESSION['success'])){ ?>
                    <div class="alert alert-success"><?= $_SESSION['success']?></div>
                <?php } unset($_SESSION['success'])?>
                <form action="Profile_Update.php" method="POST">
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" value="<?= $_after_assoc_log['name']?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" value="<?= $_after_assoc_log['email']?>">
                    </div>
                    <div class="mb-3">
                        <select name="country" class="form-control">
                            <option value="" selected>--Select Your Country</option>
                            <option value="BAN" <?= ($_after_assoc_log['country']=='BAN'?'selected':'')?>>BAN</option>
                            <option value="IND" <?= ($_after_assoc_log['country']=='IND'?'selected':'')?>>IND</option>
                            <option value="AUS" <?= ($_after_assoc_log['country']=='AUS'?'selected':'')?>>AUS</option>
                            <option value="ENG" <?= ($_after_assoc_log['country']=='ENG'?'selected':'')?>>ENG</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" name="gender" type="radio" value="male" <?= ($_after_assoc_log['gender']=='male'?'checked':'')?>>
                            <label class="form-check-label">
                                Male
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" name="gender" type="radio" value="female" <?= ($_after_assoc_log['gender']=='female'?'checked':'')?>>
                            <label class="form-check-label">
                                feMale
                            </label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header bg-primary">
                <h3 class="text-white">Update Password</h3>
            </div>
            <div class="card-body">
                <?php if(isset($_SESSION['pass_update'])){ ?>
                    <div class="alert alert-success"><?= $_SESSION['pass_update']?></div>
                <?php } unset($_SESSION['pass_update'])?>
                <form action="Password_Update.php" method="POST">
                    <div class="mb-3">
                        <input type="hidden" name="user_id" value="<?= $_after_assoc_log['id']?>">
                        <label for="" class="form-label">Current Password</label>
                        <input type="password" name="current_password" class="form-control">
                        <?php if(isset($_SESSION['curnpass_err'])){ ?>
                            <strong class="text-danger"><?= $_SESSION['curnpass_err']?></strong>
                        <?php } unset($_SESSION['curnpass_err']) ?>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">New Password</label>
                        <input type="password" name="password" class="form-control">
                        <?php if(isset($_SESSION['pass_err'])){ ?>
                            <strong class="text-danger"><?= $_SESSION['pass_err']?></strong>
                        <?php } unset($_SESSION['pass_err']) ?>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Confirm Password</label>
                        <input type="password" name="confirm_password" class="form-control">
                        <?php if(isset($_SESSION['conpass_err'])){ ?>
                            <strong class="text-danger"><?= $_SESSION['conpass_err']?></strong>
                        <?php } unset($_SESSION['conpass_err']) ?>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Update Password</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header bg-primary">
                <h3 class="text-white">Update Profile Photo</h3>
            </div>
            <div class="card-body">
                <?php if(isset($_SESSION['photo_update'])){ ?>
                    <div class="alert alert-success"><?= $_SESSION['photo_update']?></div>
                <?php } unset($_SESSION['photo_update']) ?>
                <form action="Photo_Update.php" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <input type="hidden" name="user_id" value="<?= $_after_assoc_log['id']?>">
                        <label for="" class="form-label">Upload Photo</label>
                        <input type="file" name="photo" class="form-control" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                        <?php if(isset($_SESSION['err'])){ ?>
                            <strong class="text-danger"><?= $_SESSION['err'] ?></strong>
                        <?php } unset($_SESSION['err'])?>
                        <div class="pt-2">
                            <img src="" id="blah" alt="" width="200">
                        </div>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Update Photo</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php require '../includes/Footer.php' ?>