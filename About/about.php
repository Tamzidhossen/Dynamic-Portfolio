<?php
// session_start();
require "../db.php";
require "../includes/Header.php";

$select = "SELECT * FROM abouts";
$select_res = mysqli_query($db_connection, $select);
$_after_assoc = mysqli_fetch_assoc($select_res);
?>
<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header bg-primary">
                <h3 class="text-white">Update About Information</h3>
            </div>
            <div class="card-body">
                <?php if(isset($_SESSION['about'])){ ?>
                    <div class="alert alert-success"><?=$_SESSION['about']?></div>
                <?php }unset($_SESSION['about']) ?>
                <form action="update.php" method="POST">
                    <div class="mb-3">
                        <label for="" class="form-label">Designation</label>
                        <input type="text" name="designation" class="form-control" value="<?=$_after_assoc['designation']?>">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" value="<?=$_after_assoc['name']?>">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Description</label>
                        <textarea name="desp" class="form-control" rows="5"><?=$_after_assoc['desp']?></textarea>
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
                <h3 class="text-white">Update Image</h3>
            </div>
            <div class="card-body">
                <?php if(isset($_SESSION['image'])){ ?>
                    <div class="alert alert-success"><?=$_SESSION['image']?></div>
                <?php } unset($_SESSION['image']) ?>
                <form action="update_image.php" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="" class="form-label">Upload Image</label>
                        <input type="file" name="image" class="form-control" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                        <div class="my-2">
                            <img src="../Uploads/about/<?=$_after_assoc['image']?>" alt="" id="blah" width="200">
                        </div>
                        <?php if(isset($_SESSION['err'])){ ?>
                            <strong class="text-danger"><?=$_SESSION['err']?></strong>
                        <?php } unset($_SESSION['err']) ?>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php require '../includes/Footer.php';?>