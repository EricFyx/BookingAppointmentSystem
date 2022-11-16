<?php
include ('dbcon.php');

if(isset($_POST['add_Booking'])){

   $booking_Date = $_POST['booking_Date'];
   $booking_StartTime = $_POST['booking_StartTime'];
   $booking_EndTime = $_POST['booking_EndTime'];


   if(empty($booking_Date) || empty($booking_StartTime) || empty($booking_EndTime)){
      $message[] = 'Please fill out all fields';
   }else{
      $insert = "INSERT INTO tbl_booking(bookingDate,bookingStartTime,bookingEndTime) VALUES('$booking_Date', '$booking_StartTime', '$booking_EndTime')";
      $upload = mysqli_query($con,$insert);
      if($upload){
         $message[] = 'New booking slot added successfully';
      }else{
         $message[] = 'Could not add booking slot';
      }
   }

};

if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM tbl_booking WHERE bookingID = $id");
    header('location:admin_page.php');
 };
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Slots</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="assets/css/productcss.css">

</head>
<body>
<header>
    <nav class="header">
        <div><img class="Logo" src="images/Logo.png"></div>
        <ul>
            <li><a href="adminPage.php">Home</a></li>
            <li><a href="banneradsui.php">Banner</a></li>
            <li><a href="adminBooking.php">Booking</a></li>
            <li><a href="adminViewAppointment.php">View Appointments</a></li>
            <li><a href="Product.php">Product</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </nav>
</header>
<div class="ProductCover">
    <div class="CoverText">
        <h1>Add Booking Slot</h1>
    </div>
</div>
<br>
<br>

<?php
if(isset($message))
{
    foreach($message as $message)
    {
        echo'<span class = "message">'.$message.'</span>';
    }
}

?>

<div class = "container">
        <div class = "admin-product-form-container">
            <form action="<?php $_SERVER['PHP_SELF']?>" method= "post" enctype="multipart/form-data">
                <h3>Add New Booking Slot</h3>
                <input type="date" placeholder="Enter Booking Date" name = "booking_Date" class="box">
                <input type="time" placeholder="Enter Booking Start Time" name = "booking_StartTime" class="box">
                <input type="time" placeholder="Enter Booking End Time" name = "booking_EndTime" class="box">
                <input type="submit" class = "btn" name = "add_Booking" value = "add Booking">
            </form>
        </div>

        <?php
            $select = mysqli_query($con, "SELECT * FROM tbl_booking ORDER BY bookingDate");
        ?>
        <div class="product-display">
            <table class="product-display-table">
                <thead>
                    <tr>
                        <th>Booking Date</th>
                        <th>Booking Day</th>
                        <th>Booking Start Time</th>
                        <th>Booking End Time</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <?php while($row = mysqli_fetch_assoc($select)){ ?>
                    <tr>
                        <td><?php echo $row['bookingDate']; ?></td>
                        <td><?php echo date('l', strtotime($row["bookingDate"]));?></td>
                        <td><?php echo date('h:i:sa',strtotime($row['bookingStartTime'])); ?></td>
                        <td><?php echo date('h:i:sa',strtotime($row['bookingEndTime'])); ?></td>
                        <td><a href="adminUpdateBooking.php?edit=<?php echo $row['bookingID']; ?>" class="btn"> <i class="fas fa-edit"></i> Update Booking Slot </a></td>
                    </tr>
                <?php } ?>
            </table>
        </div>

    </div>
    
</body>
</html>

