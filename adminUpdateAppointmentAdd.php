<?php
include('dbcon.php');

$id = $_GET['edit'];

if(isset($_POST['book_appointment'])){
   $email = $_POST["email"];
   $username = $_POST["username"];
   $appointmentDate = $_POST["booking_Date"];
   $appointmentST = $_POST["booking_ST"];
   $appointmentET = $_POST["booking_ET"];
   
    $insert = "INSERT INTO `tbl_appointment` (`appointmentDate`,`appointmentStartTime`,`appointmentEndTime`,`customerName`,`bookingID`,`customerEmail`) VALUES ('$appointmentDate','$appointmentST','$appointmentET','$username','$id','$email')";
     //$update = "INSERT INTO `tbl_appointment`(`appointmentDate`,`appointmentStartTime`,`appointmentEndTime`,`customerName`,`bookingID`,`customerEmail`) SELECT * FROM "
   $makeBooking = mysqli_query($con,$insert);
   if($makeBooking)
   {
      $message[] = 'Appointment changed successfully';
   }
   else{
      $message[] = 'Could not change Appointment';
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
      <h3 class="title">Book Appointment</h3>
      <?php
      
      $select = mysqli_query($con, "SELECT * FROM tbl_member, tbl_appointment WHERE bookingID= '$id'");
      while($row = mysqli_fetch_assoc($select)){

   ?>
      <label>Username</label><br>
      <input type="text" class="box" name="username" value="<?php echo $row['customerName']; ?>" readonly=readonly>
      <label>User Email</label><br>
      <input type="text" class="box" name="email" value="<?php echo $row['customerEmail']; ?>" readonly=readonly>
      <label>Appointment Date</label><br>
      <input type="date" class="box" name="booking_Date" value="<?php echo $row['appointmentDate']; ?>" readonly="readonly">
      <label>Appointment Day</label><br>
      <input type="text" class="box" name="bookingDay" value="<?php echo date('l', strtotime($row["appointmentDate"]));?>" readonly="readonly">
      <label>Appointment Start Time</label><br>
      <input type="time" class="box" name="booking_ST" value="<?php echo $row['appointmentStartTime']; ?>" readonly="readonly">
      <label>Appointment End Time</label><br>
      <input type="time" class="box" name="booking_ET" value="<?php echo $row['appointmentEndTime']; ?>" readonly="readonly">
      <input type="submit" value="Book Appointment" name="book_appointment" class="btn">
      <a href="userBooking.php" class="btn">go back!</a>
   </form>


      <?php }; ?>
</div>

</div>

</body>
</html>