<?php
include('dbcon.php');
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

$selectUser = "SELECT tbl_member.loginTime,tbl_appointment.appointmentDate ,tbl_appointment.appointmentStartTime from tbl_member LEFT JOIN  tbl_appointment ON tbl_member.email = tbl_appointment.customerEmail where tbl_member.email = '$email' and tbl_appointment.customerEmail = '$email' ";
			$run = mysqli_query($con, $selectUser);
			date_default_timezone_set('Asia/Brunei');
            $date = date('H:i:s');
            $currentTS = $date;

			foreach($run as $row)
			{
				$aDate = date('Y-m-d',strtotime($row['appointmentDate']));
				$aStartTime = date('H:i:s',strtotime($row['appointmentStartTime']));
				$diff = strtotime($aStartTime) - strtotime($currentTS);
				echo $diff;
                if($diff == 1800)
                {
                    $message[] = "30 Minutes till Booking";
                }
            }

            if(isset($message)){
                foreach($message as $message){
                   echo '<span class="message">'.$message.'</span>';
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