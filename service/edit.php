<?php
require '../db.php';
require '../includes/Header.php';

$id = $_GET['id'];
$select = "SELECT * FROM service WHERE id=$id";
$select_res = mysqli_query($db_connection, $select);
$_after_assoc = mysqli_fetch_assoc($select_res);
?>
<div class="row">
    <div class="col-lg-6 m-auto">
        <div class="card">
            <?php if(isset($_SESSION['success'])){ ?>
                <div class="alert alert-success"><?=$_SESSION['success']?></div>
            <?php } unset($_SESSION['success'])?>
            <div class="card-header bg-primary">
                <h3 class="text-white m-auto">Edit Service</h3>
            </div>
            <div class="card-body">
                <form action="update.php" method="POST">
                    <div class="mb-3">
                        <input type="hidden" name="id" value="<?=$_after_assoc['id']?>">
                        <label for="" class="form-label">Title</label>
                        <input type="text" name="title" class="form-control" value="<?=$_after_assoc['title']?>">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Description</label>
                        <textarea name="desp" class="form-control" rows="5"><?=$_after_assoc['desp']?></textarea>
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-primary">Update Service</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php require '../includes/Footer.php';?>