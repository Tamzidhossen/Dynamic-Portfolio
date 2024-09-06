<?php
require '../db.php';
require '../includes/Header.php';

$id = $_GET['id'];

$update = "UPDATE messages SET status=1 WHERE id=$id";
mysqli_query($db_connection, $update);

$message = "SELECT * FROM messages WHERE id=$id";
$message_res = mysqli_query($db_connection, $message);
$after_assoc = mysqli_fetch_assoc($message_res);
?>

<div class="row">
    <div class="col-lg-8 m-auto">
        <div class="card">
            <div class="card-header bg-primary">
                <h3 class="text-white">Message Details</h3>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <tr>
                        <td>Name</td>
                        <td><?=$after_assoc['name']?></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td><?=$after_assoc['email']?></td>
                    </tr>
                    <tr>
                        <td>Subject</td>
                        <td><?=$after_assoc['subject']?></td>
                    </tr>
                    <tr>
                        <td>Message</td>
                        <td><?=$after_assoc['message']?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
<?php require '../includes/Footer.php';?>