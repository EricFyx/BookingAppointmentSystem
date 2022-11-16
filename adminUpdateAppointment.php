<?php

@include 'dbcon.php';


if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM products WHERE id = $id");
    header('location:admin_page.php');
 };

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="assets/css/productcss.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Admin Update Appointment</title>
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
			<h1>View Available Appointments</h1>
		</div>
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
                        <td><a href="adminUpdateAppointmentAdd.php?edit=<?php echo $row['bookingID']; ?>" class="btn"> <i class="fas fa-edit"></i> book appointment </a></td>

                    </tr>
                <?php } ?>
            </table>
        </div>




    </div>
    	<footer>
        <section class=" footer">


            <div class="section-4">
                <ul class="footer-links">
                    <li><a href="">Contact Us</a></li>
                    <li><a href="">Location</a></li>
                </ul>
            </div>

        </section>
    </footer>
</body>

</html>