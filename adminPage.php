<?php
    require_once('dbcon.php');
    @include 'config.php';
    $query_register = mysqli_query($con," select * from tbl_member");
    $query_product = mysqli_query($conn, "select * from products");
    $query_login =  mysqli_query($con, "select * from login");
    $query_booking = mysqli_query($con, "select * from tbl_booking");
    $query_appointment = mysqli_query($con, "select * from tbl_appointment");
    
    $query_register_count = mysqli_num_rows($query_register);
    $query_product_count = mysqli_num_rows($query_product);
    $query_login_count = mysqli_num_rows($query_login);
    $query_booking_count = mysqli_num_rows($query_booking);
    $query_appointment_count = mysqli_num_rows($query_appointment);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="assets/css/admin.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Share Skill</title>
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
	
	<div class="Flower">
        <div class="container">
            <div class="container-homepage1">
                <div>
                    <p class="welcome">Welcome to Cacti-Succulent</p>
                </div>
                <div>
                    <p class="purpose">Cacti-Succulent Kuching is a local homegrown business specialized in selling various type and size of succulent plants. Apart from selling succulent plants, we also sell different type of gardening tools, soils and fertilizers at an affordable cost.</p>
                </div>
            </div>
        </div>
    </div> 
	<section class="banner-service">
        <h1>Report</h1>
		<aside class="intro">
        <div class = "box0">
			<h1>Total Register</h1>
			<p><?php echo $query_register_count; ?></p>
		</div>
		<div class = "box0">
			<h1>Total Product</h1>
			<p><?php echo $query_product_count; ?></p>
		</div>
		<div class = "box0">
			<h1>Total Login</h1>
			<p><?php echo $query_login_count; ?></p>
		</div>
		<div class = "box0">
			<h1>Total Booking</h1>
			<p><?php echo $query_booking_count; ?></p>
		</div>
        <div class = "box0">
			<h1>Total Appointments</h1>
			<p><?php echo $query_appointment_count; ?></p>
		</div>
    </aside>
    </section>
	<footer>
        <section class=" footer">


            <div class="section-4">
                <ul class="footer-links">
                    <li><a href="">Contact Us</a></li>
                    <li><a href="">Location</a></li>
                </ul>
            </div>
            <iframe class="Map" src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d3985.850742379384!2d101.80436031429385!3d2.555405357229252!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMsKwMzMnMTkuNCJOIDEwMcKwNDgnMjMuNiJF!5e0!3m2!1sen!2smy!4v1666693025798!5m2!1sen!2smy" ></iframe>>


        </section>
    </footer>
</body>

</html>