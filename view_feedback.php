<?php
$currentPage = "Feedback";
include 'header.php';
include 'dbcon.php';

session_start();


?>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                                <div class="card">
                    <div class="card-header alert-success">
                        <h5 class="card-title"><b>List of all Feedbacks</b></h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered" id='example1'>
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>User Email</th>
                                    <th>User Feedback</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sn = 0;

                                $query1 = "SELECT * FROM feedback";

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
