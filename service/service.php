<?php
require '../db.php';
require '../includes/Header.php';

$select = "SELECT * FROM service";
$select_res = mysqli_query($db_connection, $select);
?>
<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header bg-primary">
                <h3 class="text-white m-auto">Service List</h3>
            </div>
            <div class="card-body">
                <?php if(isset($_SESSION['status'])){ ?>
                    <div class="alert alert-success"><?=$_SESSION['status']?></div>
                <?php } unset($_SESSION['status'])?>
                <?php if(isset($_SESSION['success'])){ ?>
                    <div class="alert alert-success"><?=$_SESSION['success']?></div>
                <?php } unset($_SESSION['success'])?>
                <?php if(isset($_SESSION['delete'])){ ?>
                    <div class="alert alert-success"><?=$_SESSION['delete']?></div>
                <?php } unset($_SESSION['delete'])?>
                <table class="table table-bordered">
                    <tr>
                        <th>SL</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    <?php foreach($select_res as $index=>$service){ ?>
                    <tr>
                        <td><?=$index+1?></td>
                        <td><?=$service['title']?></td>
                        <td><?=$service['desp']?></td>
                        <td>
                            <a href="status.php?id=<?=$service['id']?>" class="badge badge-<?=($service['status']==1?'success':'light')?>"><?=($service['status']==1?'Active':'Diactive')?></a>
                        </td>
                        <td width='100'>
                            <a href="edit.php?id=<?= $service['id']?>" class="btn btn-primary shadow btn-xs sharp"><i class="fa fa-pencil" style="line-height:18px"></i></a>

                            <a data-link="delete.php?id=<?= $service['id']?>" data-toggle="modal" data-target="#exampleModalCenter" class="btn btn-danger shadow btn-xs sharp del"><i class="fa fa-trash" style="line-height:18px"></i></a>
                        </td>
                    </tr>
                    <?php }?>
                </table>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card">
            <?php if(isset($_SESSION['success'])){ ?>
                <div class="alert alert-success"><?=$_SESSION['success']?></div>
            <?php } unset($_SESSION['success'])?>
            <div class="card-header bg-primary">
                <h3 class="text-white m-auto">Add New Service</h3>
            </div>
            <div class="card-body">
                <form action="service_post.php" method="POST">
                    <div class="mb-3">
                        <label for="" class="form-label">Title</label>
                        <input type="text" name="title" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Description</label>
                        <textarea name="desp" class="form-control" rows="5"></textarea>
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-primary">Add Service</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php require '../includes/Footer.php';?>

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