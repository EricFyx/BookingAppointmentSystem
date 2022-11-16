<?php

@include 'dbcon.php';

$id = $_GET['edit'];

if(isset($_POST['update_BookingSlot'])){

    $booking_Date = $_POST['booking_Date'];
    $booking_StartTime = $_POST['booking_StartTime'];
    $booking_EndTime = $_POST['booking_EndTime'];

   if(empty($booking_Date) || empty($booking_StartTime) || empty($booking_EndTime)){
      $message[] = 'please fill out all!';    
   }else{

      $update_data = "UPDATE tbl_booking SET bookingDate='$booking_Date', bookingStartTime='$booking_StartTime', bookingEndTime='$booking_EndTime'  WHERE bookingID = '$id'";
      $update_date2 = "UPDATE tbl_appointment SET appointmentDate = '$booking_Date', appointmentStartTime = '$booking_StartTime', appointmentEndTime = '$booking_EndTime' WHERE bookingID = '$id'";
      $upload = mysqli_query($con, $update_data);
      $upload2 = mysqli_query($con, $update_date2);

      if($upload && $upload2){
        header('location:adminBooking.php');

     }else{
        $message[] = 'please fill out all!'; 
     }


   }
};

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

   <?php
      
      $select = mysqli_query($con, "SELECT * FROM tbl_Booking WHERE bookingID = '$id'");
      while($row = mysqli_fetch_assoc($select)){

   ?>
   
   <form action="" method="post" enctype="multipart/form-data">
      <h3 class="title">update Booking Slot</h3>
      <label>Appointment Date</label><br>
      <input type="date" class="box" name="booking_Date" value="<?php echo $row['bookingDate']; ?>">
      <label>Appointment Start Time</label><br>
      <input type="time" class="box" name="booking_StartTime" value="<?php echo $row['bookingStartTime']; ?>">
      <label>Appointment End Time</label><br>
      <input type="time" class="box" name="booking_EndTime" value="<?php echo $row['bookingEndTime']; ?>">
      <input type="submit" value="update booking slot" name="update_BookingSlot" class="btn">
      <a href="adminBooking.php" class="btn">go back!</a>
   </form>
   


   <?php }; ?>

   

</div>

</div>

</body>
</html>