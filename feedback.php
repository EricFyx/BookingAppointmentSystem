<?php
$currentPage = "Feedback";
include 'header.php';
include 'dbcon.php';

session_start();
if (isset($_POST['sendFeedback'])) {
    $email = $_SESSION['email'];


    $msg = $_POST['message'];

    $query = "INSERT INTO feedback(user_email, feedback) VALUES('$email', '$msg');";

    $result = mysqli_query($con, $query);

    if (!$result) {
        echo "Connection Error!";
    } else {
        $success = "Your Feedback has been sent Successfully!";
    }
}

?>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="callout callout-info  alert-warning">
                    <h5><i class="fas fa-info"></i> Info:</h5>
                    We always want to hear from you!
                    Replied to within 24-hours.
                </div>


                <?php echo isset($success) ? "<span class='form-control alert alert-info'>{$success}</span>" : ""  ?>
                <div class="card">
                    <div class="card-header alert-success">
                        <h5 class="card-title"><b>List of all Feedbacks</b></h5>
                        <div class='float-right'>
                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#add">
                                Send New Feedback
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered" id='example1'>
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Your Email</th>
                                    <th>Your Comment</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sn = 0;
                                $email = $_SESSION['email'];

                                $query1 = "SELECT * FROM feedback WHERE user_email='$email'";

                                $result1 = mysqli_query($con, $query1);
                                while ($row = $result1->fetch_assoc()) {
                                    $sn++;
                                    echo "<tr>
                                    <td>$sn</td>
                                    <td>" . $row['user_email'] . "</td>
                                    <td>" . ($row['feedback'] == NULL ? '-- No Response Yet --' : $row['feedback']) . "</td>
                                    </tr>";
                                } ?>
                            </tbody>
                        </table>


                    </div>

                    <br />
                </div>
                <!-- /.invoice -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
<div class="modal fade" id="add">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" align="center">
            <div class="modal-header">
                <h4 class="modal-title">Send New Feedback </h4>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="post">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                Type Message : <textarea name="message" required minlength="10" id="" cols="30" rows="10" class="form-control"></textarea>
                            </div>

                        </div>


                        <hr>
                        <input type="submit" name="sendFeedback" class="btn btn-success" value="Send">
                    </div>
                </form>


            </div>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>