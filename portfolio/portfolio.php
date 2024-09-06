<?php
require '../db.php';
require '../includes/Header.php';

$select = "SELECT * FROM portfolio";
$select_res = mysqli_query($db_connection, $select);
?>
<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header bg-primary">
                <h3 class="text-white m-auto">Protfolio List</h3>
            </div>
            <div class="card-body">
            <?php if(isset($_SESSION['status'])){ ?>
                <div class="alert alert-success"><?=$_SESSION['status']?></div>
            <?php } unset($_SESSION['status'])?>
            <?php if(isset($_SESSION['success'])){ ?>
                <div class="alert alert-success"><?=$_SESSION['success']?></div>
            <?php } unset($_SESSION['success'])?>
                <table class="table table-bordered">
                    <tr>
                        <th>SL</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Image</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    <?php foreach($select_res as $index=>$portfolio){ ?>
                    <tr>
                        <td><?=$index+1?></td>
                        <td><?=$portfolio['title']?></td>
                        <td><?=$portfolio['category']?></td>
                        <td><img src="../Uploads/portfolio/<?=$portfolio['image']?>" alt="" width="100"></td>
                        <td>
                            <a href="status.php?id=<?=$portfolio['id']?>" class="badge badge-<?=($portfolio['status']==1?'success':'light')?>"><?=($portfolio['status']==1?'Active':'Diactive')?></a>
                        </td>
                        <td width='100'>
                            <a href="edit.php?id=<?=$portfolio['id']?>" class="btn btn-primary shadow btn-xs sharp"><i class="fa fa-pencil" style="line-height:18px"></i></a>

                            <a data-link="delete.php?id=<?=$portfolio['id']?>" data-toggle="modal" data-target="#exampleModalCenter" class="btn btn-danger shadow btn-xs sharp del"><i class="fa fa-trash" style="line-height:18px"></i></a>
                        </td>
                    </tr>
                    <?php }?>
                </table>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header bg-primary">
                <h3 class="text-white">Add New Portfolio</h3>
            </div>
            <div class="card-body">
            <?php if(isset($_SESSION['success'])){ ?>
                <div class="alert alert-success"><?=$_SESSION['success']?></div>
            <?php }unset($_SESSION['success']) ?>
                <form action="portfolio_post.php" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="" class="form-label">Title</label>
                        <input type="text" name="title" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Category</label>
                        <input type="text" name="category" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Image</label>
                        <input type="file" name="image" class="form-control" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                        <div class="my-2">
                            <img src="" id="blah" alt="" width="200">
                        </div>
                        <?php if(isset($_SESSION['err'])){ ?>
                            <strong class="text-danger"><?=$_SESSION['err']?></strong>
                        <?php }unset($_SESSION['err']) ?>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Add Portfolio</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php require'../includes/Footer.php';?>

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