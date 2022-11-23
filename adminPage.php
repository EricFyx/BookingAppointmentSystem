<?php
    require_once('dbcon.php');
    @include 'config.php';
    //include('30minBookingNoti.php');
    
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
            <li><a href="view_feedback.php">View User Feedback</a></li>
            </ul>
        </nav>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart1);
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart2);
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart3);

        function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Date', 'Total Register'],
            <?php 
                $register = "SELECT  * from tbl_member ORDER BY create_at ASC";
                $res_register = mysqli_query($con, $register);
                $count_register = 0;
                $previous_date = date("d-m-y");
                $arrayRegister = array();
                while($row = mysqli_fetch_array($res_register)){$arrayRegister[] = $row;}
                foreach($arrayRegister as $keyA => $data){
                    $count_register++;
                    $date = $data['create_at'];
                    $newDate = date("d-m-Y", strtotime($date));
                    if($previous_date != $newDate){
                        ?>
                        ['<?php echo $newDate;?>', <?php echo $count_register; ?>],
                        <?php 
                        $count_register++;
                    }
                    $previous_date = $newDate;
                }
                
            ?>
        ]);

        var options = {
          title: 'Amount',
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
      }
      
        function drawChart1() {
            var data1 = google.visualization.arrayToDataTable([
                ['Date', 'Total Login'],
                <?php 
                $login = "SELECT  * from login ORDER BY time ASC";
                $res_login = mysqli_query($con, $login);
                $count_login = 0;
                $previous_date = date("d-m-y");
                $arrayLogin = array();
                while($row = mysqli_fetch_array($res_login)){$arrayLogin[] = $row;}
                foreach($arrayLogin as $keyB => $data_login){      
                    $count_login++;              
                    $date_login = $data_login['time'];
                    $newDate_login = date("d-m-Y", strtotime($date_login));
                    if($previous_date != $newDate_login){
                        ?>
                        ['<?php echo $newDate_login;?>', <?php echo $count_login; ?>],
                        <?php  
                    }
                    $previous_date = $newDate_login;
                }
                ?>
            ]);

            var options1 = {
            title: 'Amount',
            curveType: 'function',
            legend: { position: 'bottom' }
            };

            var chart1 = new google.visualization.LineChart(document.getElementById('curve_chart1'));

            chart1.draw(data1, options1);
        }
                
        function drawChart2() {
            var data2 = google.visualization.arrayToDataTable([
                ['Date', 'Total Booking'],
                <?php 
                $booking = "SELECT  * from tbl_booking ORDER BY bookingDate ASC";
                $res_booking = mysqli_query($con, $booking);
                $count_booking = 0;
                $previous_date = date("d-m-y");
                $arrayBooking = array();
                while($row = mysqli_fetch_array($res_booking)){$arrayBooking[] = $row;}
                foreach($arrayBooking as $keyB => $data_booking){      
                    $count_booking++;              
                    $date_booking = $data_booking['bookingDate'];
                    $newDate_booking = date("d-m-Y", strtotime($date_booking));
                    if($previous_date != $newDate_booking){
                        ?>
                        ['<?php echo $newDate_booking;?>', <?php echo $count_booking; ?>],
                        <?php  
                    }
                    $previous_date = $newDate_booking;
                }
                ?>
            ]);

            var options2 = {
            title: 'Amount',
            curveType: 'function',
            legend: { position: 'bottom' }
            };

            var chart2 = new google.visualization.LineChart(document.getElementById('curve_chart2'));

            chart2.draw(data2, options2);
        }

        function drawChart3() {
            var data3 = google.visualization.arrayToDataTable([
                ['Date', 'Total Appointment'],
                <?php 
                $appointment = "SELECT  * from tbl_appointment ORDER BY appointmentDate ASC";
                $res_appointment = mysqli_query($con, $appointment);
                $count_appointment = 0;
                $previous_date = date("d-m-y");
                $arrayAppointment = array();
                while($row = mysqli_fetch_array($res_appointment)){$arrayAppointment[] = $row;}
                foreach($arrayAppointment as $keyB => $data_appointment){      
                    $count_appointment++;              
                    $date_appointment = $data_appointment['appointmentDate'];
                    $newDate_appointment = date("d-m-Y", strtotime($date_appointment));
                    if($previous_date != $newDate_appointment){
                        ?>
                        ['<?php echo $newDate_appointment;?>', <?php echo $count_appointment; ?>],
                        <?php  
                    }
                    $previous_date = $newDate_appointment;
                }
                ?>
            ]);

            var options3 = {
            title: 'Amount',
            curveType: 'function',
            legend: { position: 'bottom' }
            };

            var chart3 = new google.visualization.LineChart(document.getElementById('curve_chart3'));

            chart3.draw(data3, options3);
        }
    </script>


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
    <div id="curve_chart" style=" width: 100%; height: 500px"></div>
    <div id="curve_chart1" style=" width: 100%; height: 500px"></div>
    <div id="curve_chart2" style=" width: 100%; height: 500px"></div>
    <div id="curve_chart3" style=" width: 100%; height: 500px"></div>
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