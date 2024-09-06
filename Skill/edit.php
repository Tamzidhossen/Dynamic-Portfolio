<?php
require '../db.php';
require '../includes/Header.php';

$id = $_GET['id'];

$select = "SELECT * FROM skills WHERE id=$id";
$select_res = mysqli_query($db_connection, $select);
$after_assoc = mysqli_fetch_assoc($select_res);
?>
<div class="row">
    <div class="col-lg-6 m-auto">
        <form action="update.php" method="POST">
            <div class="mb-3">
                <input type="hidden" value="<?=$id?>" name="id">
                <label for="" class="form-label">Skill Name</label>
                <input type="text" name="skill_name" class="form-control" value="<?=$after_assoc['skill_name']?>">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Skill Percentage</label>
                <input type="number" name="percentage" class="form-control" value="<?=$after_assoc['percentage']?>">
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Add Skill</button>
            </div>
        </form>
    </div>
</div>
<?php require '../includes/Footer.php'?>