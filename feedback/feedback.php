<?php
require '../db.php';
require '../includes/Header.php';
$select = "SELECT * FROM feedbacks";
$select_res = mysqli_query($db_connection, $select);
?>
<div class="row">
    <div class="col-lg-11 m-auto">
        <div class="card">
            <div class="card-header bg-primary">
                <h3 class="text-white">All Feedbacks</h3>
            </div>
            <div class="card-body">
                <?php if(isset($_SESSION['del'])){?>
                    <div class="alert alert-success"><?=$_SESSION['del']?></div>
                <?php } unset($_SESSION['del'])?>
                <table class="table table-bordered">
                    <tr>
                        <th>SL</th>
                        <th>Name</th>
                        <th>Designation</th>
                        <th>Image</th>
                        <th>Feedback</th>
                        <th>Action</th>
                    </tr>
                    <?php foreach($select_res as $index=>$feedback){ ?>
                    <tr>
                        <td><?=$index+1?></td>
                        <td><?=$feedback['name']?></td>
                        <td><?=$feedback['designation']?></td>
                        <td>
                            <?php if($feedback['image'] == null){ ?>
                                <div class="text-danger" style="width: 100px; height:100px; background:#ddd; border-radius: 50%; text-align:center; line-height:100px; font-size:30px;"><?=substr($feedback['name'],0,1)?></div>
                                <!-- <img src="../Uploads/feedback/default.jpg" width="100" alt=""> -->
                            <?php }else{?>
                                <img src="../Uploads/feedback/<?=$feedback['image']?>" width="100" alt="">
                            <?php } ?>
                        </td>
                        <td><?=$feedback['feedback']?></td>
                        <td>
                            <a href="delete.php?id=<?=$feedback['id']?>" class="btn btn-danger shadow btn-xs sharp del"><i class="fa fa-trash" style="line-height:18px"></i></a>                           
                        </td>
                    </tr>
                    <?php }?>
                </table>
            </div>
        </div>
    </div>
</div>
<?php require '../includes/Footer.php';?>