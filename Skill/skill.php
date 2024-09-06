<?php
require "../db.php";
require "../includes/Header.php";

$skills = "SELECT * FROM skills";
$skills_res = mysqli_query($db_connection, $skills);
?>
<div class="row">
    <div class="col-lg-8">
        <div class="card">
        <?php if(isset($_SESSION['status'])){ ?>
            <div class="alert alert-success"><?=$_SESSION['status']?></div>
        <?php } unset($_SESSION['status'])?>
        <?php if(isset($_SESSION['delete'])){ ?>
            <div class="alert alert-success"><?=$_SESSION['delete']?></div>
        <?php } unset($_SESSION['delete'])?>
        <?php if(isset($_SESSION['update'])){ ?>
            <div class="alert alert-success"><?=$_SESSION['update']?></div>
        <?php } unset($_SESSION['update'])?>
            <div class="card-header bg-primary">
                <h3 class="text-white">Skill List</h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <th>SL</th>
                        <th>Skill</th>
                        <th>Percentage</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    <?php foreach($skills_res as $index=>$skill){ ?>
                    <tr>
                        <td><?=$index+1?></td>
                        <td><?=$skill['skill_name']?></td>
                        <td><?=$skill['percentage']?></td>
                        <td>
                            <a href="status.php?id=<?=$skill['id']?>" class="badge badge-<?=($skill['status']==1?'success':'light')?>"><?=($skill['status']==1?'Active':'Diactive')?></a>
                        </td>
                        <td>
                            <a href="edit.php?id=<?= $skill['id']?>" class="btn btn-primary shadow btn-xs sharp"><i class="fa fa-pencil" style="line-height:18px"></i></a>

                            <a data-link="delete.php?id=<?= $skill['id']?>" data-toggle="modal" data-target="#exampleModalCenter" class="btn btn-danger shadow btn-xs sharp del"><i class="fa fa-trash" style="line-height:18px"></i></a>
                        </td>
                    </tr>
                    <?php }?>
                </table>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <?php if(isset($_SESSION['skill'])){ ?>
            <div class="alert alert-success"><?=$_SESSION['skill']?></div>
        <?php } unset($_SESSION['skill'])?>
        <div class="card">
            <div class="card-header bg-primary">
                <h3 class="text-white">Add New Skill</h3>
            </div>
            <div class="card-body">
                <form action="skill_post.php" method="POST">
                    <div class="mb-3">
                        <label for="" class="form-label">Skill Name</label>
                        <input type="text" name="skill_name" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Skill Percentage</label>
                        <input type="number" name="percentage" class="form-control">
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Add Skill</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php  require "../includes/Footer.php" ?>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Are You Sure You Want to Delete it?</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-info " data-dismiss="modal">No Don't</button>
                <button type="button" class="btn btn-danger yes">Yes Delete</button>
            </div>
        </div>
    </div>
</div>
<script>
    $('.del').click(function(){
        var link = $(this).attr('data-link');
        $('.yes').click(function(){
            window.location.href = link;
        })
    })
</script>