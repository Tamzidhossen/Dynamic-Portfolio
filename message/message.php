<?php
require '../db.php';
require '../includes/Header.php';
$message  = "SELECT * FROM messages";
$message_res = mysqli_query($db_connection, $message);
?>
<div class="row">
    <div class="col-lg-11 m-auto">
        <div class="card">
            <div class="card-header bg-primary">
                <h3 class="text-white">All Messages</h3>
            </div>
            <div class="card-body">
                <?php if(isset($_SESSION['del'])){ ?>
                    <div class="alert alert-success"><?=$_SESSION['del']?></div>
                <?php } unset($_SESSION['del'])?>
                <table class="table table-bordered">
                    <tr>
                        <th>SL</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Subject</th>
                        <th>Message</th>
                        <th>Action</th>
                    </tr>
                    <?php foreach($message_res as $index=>$msg){ ?>
                        <tr class="<?= $msg['status']==1?'':'text-red' ?>">
                            <td><?=$index+1?></td>
                            <td><?=$msg['name']?></td>
                            <td><?=$msg['email']?></td>
                            <td><?=$msg['subject']?></td>
                            <td><?=$msg['message']?></td>
                            <td>
                                <a href="view.php?id=<?=$msg['id']?>" class="btn btn-primary shadow btn-xs sharp del"><i class="fa fa-eye" style="line-height:18px"></i></a>                           
                                <a href="delete.php?id=<?=$msg['id']?>" class="btn btn-danger shadow btn-xs sharp del"><i class="fa fa-trash" style="line-height:18px"></i></a>                           
                            </td>
                        </tr>
                    <?php }?>
                </table>
            </div>
        </div>

    </div>
</div>
<?php require '../includes/Footer.php'; ?>