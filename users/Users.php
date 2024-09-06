<?php
require '../db.php' ?>
<?php require '../includes/Header.php'; ?>

<?php
$_select = "SELECT * FROM users";
$_select_res = mysqli_query($db_connection, $_select);

?>

<div class="row">
    <div class="col-lg-10">
        <div class="card">
            <div class="card-header bg-primary">
                <h3 class="text-white">Users List</h3>
                <?php if($_after_assoc_log['role'] == 1){?>
                    <a class="btn btn-light" data-toggle="modal" data-target="#basicModal">Add New</a>
                <?php }?>
                <!-- Modal -->
                <div class="modal fade" id="basicModal">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <form action="../Register_post.php" method="POST">
                                <div class="modal-header">
                                    <h5 class="modal-title">Add New User</h5>
                                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                        <div class="mb-3">
                                            <label for="" class="form-label">Name</label>
                                            <input type="text" name="name" class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label">Email</label>
                                            <input type="email" name="email" class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label">Password</label>
                                            <input type="password" name="password" class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label">Confirm Password</label>
                                            <input type="password" name="confirm_password" class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <select name="country" class="form-control">
                                                <option value="" selected>--Select Your Country</option>
                                                <option value="BAN">BAN</option>
                                                <option value="IND">IND</option>
                                                <option value="AUS">AUS</option>
                                                <option value="ENG">ENG</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <div class="form-check">
                                                <input class="form-check-input" name="gender" type="radio" value="male">
                                                <label class="form-check-label">
                                                    Male
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" name="gender" type="radio" value="female">
                                                <label class="form-check-label">
                                                    feMale
                                                </label>
                                            </div>
                                        </div>
                                    
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Add User</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <?php if(isset($_SESSION['success'])){ ?>
                    <div class="alert alert-success"><?=$_SESSION['success'] ?></div>
                <?php } unset($_SESSION['success'])?>
                <table class="table table-bordered">
                    <tr>
                        <th>SL</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Country</th>
                        <th>Gender</th>
                        <th>Photo</th>
                        <?php if($_after_assoc_log['role'] == 1){?>
                        <th>Action</th>
                        <?php }?>
                    </tr>
                    <?php foreach($_select_res as $_sl => $_user){ ?>
                        <tr>
                            <td><?= $_sl + 1 ?></td>
                            <td><?= $_user['name']?></td>
                            <td><?= $_user['email']?></td> 
                            <td><?= $_user['country']?></td>
                            <td><?= $_user['gender']?></td>
                            <td>
                                <?php if($_user['photo'] == null){ ?>
                                    <strong>No Preview Found</strong>
                                <?php }else{ ?>
                                    <img src="/Easyway_Regform/Uploads/users/<?= $_user['photo']?>" width="80">
                                <?php }?>
                            </td>
                            <?php if($_after_assoc_log['role'] == 1){?>
                            <td>
                                <a data-link="User_Delete.php?id=<?= $_user['id']?>" data-toggle="modal" data-target="#exampleModalCenter" class="btn btn-danger shadow btn-xs sharp del"><i class="fa fa-trash" style="line-height:18px"></i></a>
                            </td>
                            <?php }?>
                        </tr>
                    <?php }?>
                </table>
            </div>
        </div>
    </div>
    <?php if($_after_assoc_log['role'] == 1){?>
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header bg-primary">
                <h3 class="text-white">Assign Role</h3>
            </div>
            <div class="card-body">
                <?php if(isset($_SESSION['role'])){?>
                    <div class="alert alert-success"><?=$_SESSION['role']?></div>
                <?php } unset($_SESSION['role'])?>
                <form action="Role_Update.php" method="POST">
                    <div class="mb-3">
                        <label for="" class="form-label">Select Role</label>
                        <select name="role" class="form-control">
                            <option value="">Select Role</option>
                            <option value="1">Super Admin</option>
                            <option value="2">Admin</option>
                            <option value="3">Moderator</option>
                            <option value="4">Editor</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Select User</label>
                        <select name="user_id" class="form-control">
                            <option value="">Select User</option>
                            <?php foreach($_select_res as $_user){?>
                                <option value="<?= $_user['id']?>"><?= $_user['name']?></option>
                            <?php }?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Assign Role</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php }?>
</div>

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
<?php require '../includes/Footer.php'; ?>
<script>
    $('.del').click(function(){
        var link = $(this).attr('data-link');
        $('.yes').click(function(){
            window.location.href = link;
        })
    })
</script>