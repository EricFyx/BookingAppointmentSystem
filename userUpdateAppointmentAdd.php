<?php
include('dbcon.php');
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

$id = $_GET['edit'];



if(isset($_POST['book_appointment'])){
   $email = $_SESSION["email"];
   $username = $_SESSION["username"];
   $appointmentDate = $_POST["booking_Date"];
   $appointmentST = $_POST["booking_ST"];
   $appointmentET = $_POST["booking_ET"];
   
   $insert = "INSERT INTO `tbl_appointment` (`appointmentDate`,`appointmentStartTime`,`appointmentEndTime`,`customerName`,`bookingID`,`customerEmail`) VALUES ('$appointmentDate','$appointmentST','$appointmentET','$username','$id','$email')";
   $count = "SELECT * from tbl_appointment where bookingID = $id";
   $checkIfBooked = "SELECT * from tbl_appointment where customerEmail = '$email' AND bookingID = $id";
   $result2 = mysqli_query($con,$checkIfBooked);
   if($result2)
   {
      $row2 = mysqli_num_rows($result2);
      {
         if($row2 > 0)
         {
            $message[] = "You have already booked for this slot";
         }
         else
         {
            $result = mysqli_query($con,$count);
            if($result)
         {
            $row = mysqli_num_rows($result);
            if($row > 1)
            {
               $message[] = "Maximum Capacity for this booking Slot is reached";
            }
            else
            { 
                date_default_timezone_set('Asia/Brunei');
                $date = date('h:i:s');
                $currentTS = $date;

                $select = mysqli_query($con, "SELECT * FROM tbl_booking WHERE bookingID='$id'");
                $row = mysqli_fetch_assoc($select);
                if($row)
                {
                    date_default_timezone_set('Asia/Brunei');
                    $date = date('H:i:s');
                    $currentTS = $date;

                    $currentD = date('H:i:s',strtotime($row['bookingStartTime']));
                    $diff = strtotime($currentD) - strtotime($currentTS);
                    echo $currentTS;
                    echo $currentD;
                    echo $diff;
                    if($diff > 7200)
                    {
                        $makeBooking = mysqli_query($con,$insert);
                        if($makeBooking)
                        {
                            $message[] = 'New appointment added successfully';
                        }
                        else
                        {
                            $message[] = 'Could not add Appointment';
                        }

                    }
                    else
                    {
                        $message[] = "Time Frame for Change Booking has been exceded";
                    }
                }
            }
         }
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
      <h3 class="title">Change Appointment</h3>
      <?php
      
      $select = mysqli_query($con, "SELECT * FROM tbl_member WHERE email='$email'");
      while($row = mysqli_fetch_assoc($select)){

   ?>
      <label>Username</label><br>
      <input type="text" class="box" name="username" value="<?php echo $row['username']; ?>" readonly=readonly>
      <label>User Email</label><br>
      <input type="text" class="box" name="username" value="<?php echo $row['email']; ?>" readonly=readonly>

      <?php }; ?>

      <?php
      $select2 = mysqli_query($con, "SELECT * FROM tbl_booking WHERE bookingID='$id'");
      while($row2 = mysqli_fetch_assoc($select2)){

      ?>
      <label>Appointment Date</label><br>
      <input type="date" class="box" name="booking_Date" value="<?php echo $row2['bookingDate']; ?>" readonly="readonly">
      <label>Appointment Day</label><br>
      <input type="text" class="box" name="bookingDay" value="<?php echo date('l', strtotime($row2["bookingDate"]));?>" readonly="readonly">
      <label>Appointment Start Time</label><br>
      <input type="time" class="box" name="booking_ST" value="<?php echo $row2['bookingStartTime']; ?>" readonly="readonly">
      <label>Appointment End Time</label><br>
      <input type="time" class="box" name="booking_ET" value="<?php echo $row2['bookingEndTime']; ?>" readonly="readonly">
      <input type="submit" value="Update Appointment" name="book_appointment" class="btn">
      <a href="userBooking.php" class="btn">go back!</a>
   </form>
   
   <?php
      }
      ?>

   

</div>

</div>

</body>
</html>