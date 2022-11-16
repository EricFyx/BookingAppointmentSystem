<?php

include('dbcon.php');

$id = $_GET['edit'];
ob_start();
require_once('emailNotifications.php');
session_start();
if (isset($_SESSION["username"])) {
    $username = $_SESSION["username"];
    $email = $_SESSION["email"];
    $contact = $_SESSION["contact"];
    $state = $_SESSION["state"];
    $city = $_SESSION["city"];
    $address = $_SESSION["address"];
    session_write_close();
} else {
    
    session_unset();
    session_write_close();
    $url = "./index.php";
    header("Location: $url");
}



if(isset($_POST['cancel_appointment']))
{
    $cancelR = $_POST['cancel_Remarks'];

    $insertCancel = "UPDATE tbl_appointment set cancelRemarks = '$cancelR' where appointmentID = '$id'";
    $query = mysqli_query($con,$insertCancel);

    //$getData = "SELECT cancelRemarks FROM tbl_appointment where customerEmail = '$email'";
    //$query2 = mysqli_query($con, $getData);

        $mail->addAddress($_SESSION['email']);
        $adminMail->addAddress('testuser006x@gmail.com');

        $adminMail->isHTML();
        $adminMail->Subject = "Appointment Cancellation <<ADMIN>>";
        $adminMail->Body = "<h2>$email has cancelled a booking</h2>
        <h2>Cancellation Remarks: </h2>
        <textarea>$cancelR</textarea>";

        $mail->isHTML();
        $mail->Subject = "Appointment Cancellation";
        $mail->Body = "<h2>Your Appointment has been cancelled</h2>
        <h2>Cancellation Remarks: </h2>
        <textarea>$cancelR</textarea>";

        if($mail->send() && $adminMail->send())
        {
            $message[] ='Email Notification Sent';
            date_default_timezone_set('Asia/Brunei');
            $date = date('H:i:s');
            $currentTS = $date;

            $select = mysqli_query($con, "SELECT * FROM tbl_appointment WHERE appointmentID='$id'");
            $row = mysqli_fetch_assoc($select);

    if($row)
    {
        $currentD = date('H:i:s',strtotime($row['appointmentCreatedAt']));
        $diff = strtotime($currentTS) - strtotime($currentD);
        if($diff > 7200)
        {
            $message[] = "Time Frame for Appointment Cancellation has been exceded";
        }
        else
        {
            mysqli_query($con, "DELETE FROM tbl_appointment WHERE appointmentID = '$id'");
            $message[] = "Appointment Successfully Deleted";
            header('location:userBooking.php');
        }
    }

        }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="assets/css/productcss.css">
</head>
<body>

<?php
   if(isset($message)){
      foreach($message as $message){
         echo '<span class="message">'.$message.'</span>';
      }
   }
?>

<div class="container">


<div class="admin-product-form-container centered">
   <form action="" method="post" enctype="multipart/form-data">
      <h3 class="title"> Cancel Appointment</h3>
      <?php
      
      $select = mysqli_query($con, "SELECT * FROM tbl_appointment WHERE appointmentID='$id'");
      while($row = mysqli_fetch_assoc($select)){

   ?>
      <label>Username</label><br>
      <input type="text" class="box" name="username" value="<?php echo $row['customerName']; ?>" readonly="readonly">
      <label>User Email</label><br>
      <input type="text" class="box" name="username" value="<?php echo $row['customerEmail']; ?>" readonly="readonly">
      <label>Appointment Date</label><br>
      <input type="date" class="box" name="booking_Date" value="<?php echo $row['appointmentDate']; ?>" readonly="readonly">
      <label>Appointment Day</label><br>
      <input type="text" class="box" name="bookingDay" value="<?php echo date('l', strtotime($row['appointmentDate']));?>" readonly="readonly">
      <label>Appointment Start Time</label><br>
      <input type="time" class="box" name="booking_ST" value="<?php echo $row['appointmentStartTime']; ?>" readonly="readonly">
      <label>Appointment End Time</label><br>
      <input type="time" class="box" name="booking_ET" value="<?php echo $row['appointmentEndTime']; ?>" readonly="readonly">
      <label>Appointment Cancellation Remarks</label><br>
      <textarea class="box" name="cancel_Remarks" rows="6" cols="80"></textarea>
      <input type="submit" value="Cancel Appointment" name="cancel_appointment" class="btn">
      <?php }; ?>
      <a href="userViewAppointment.php" class="btn">go back!</a>
      </form>
   
</div>

</div>

</body>
</html>

