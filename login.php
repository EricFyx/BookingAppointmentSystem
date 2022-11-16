<?php
session_start();
?>

<?php

include('dbcon.php');
ob_start();
require_once('emailNotifications.php');

if (isset($_POST['submit'])) {
	$email = $_POST['email'];
	$password = $_POST['password'];

	$email_search = "select * from tbl_member where email='$email'";
	$query = mysqli_query($con, $email_search);

	$email_count = mysqli_num_rows($query);

	if ($email_count) {
		$email_pass = mysqli_fetch_assoc($query);

		$db_pass = $email_pass['password'];

		$_SESSION['username'] = $email_pass['username'];
		$_SESSION['email'] = $email_pass['email'];
		$_SESSION['contact'] = $email_pass['contact'];
		$_SESSION['address'] = $email_pass['address'];
		$_SESSION['state'] = $email_pass['state'];
		$_SESSION['city'] = $email_pass['city'];

		$pass_decode = password_verify($password, $db_pass);

		if ($pass_decode && $_SESSION["email"] == "testuser006x@gmail.com") {
			echo "login successful";

			$sql = "UPDATE tbl_member SET loginTime = CURRENT_TIMESTAMP WHERE email = '$email'";
			$runSQL = mysqli_query($con,$sql);


			header("location:adminPage.php");

?>

<?php
		} 
		elseif($pass_decode)
		{
			
			$sql = "UPDATE tbl_member SET loginTime = CURRENT_TIMESTAMP WHERE email = '$email'";
			$runSQL = mysqli_query($con,$sql);


			$selectUser = "SELECT tbl_member.loginTime,tbl_appointment.appointmentDate ,tbl_appointment.appointmentStartTime from tbl_member LEFT JOIN  tbl_appointment ON tbl_member.email = tbl_appointment.customerEmail where tbl_member.email = '$email' and tbl_appointment.customerEmail = '$email' ";
			$run = mysqli_query($con, $selectUser);
			date_default_timezone_set('Asia/Brunei');
            $date = date('H:i:s');
            $currentTS = $date;

			foreach($run as $row)
			{
				$cLoginTime = date('H:i:s',strtotime($row['loginTime']));
				$aDate = date('Y-m-d',strtotime($row['appointmentDate']));
				$aStartTime = date('H:i:s',strtotime($row['appointmentStartTime']));
				$diff = strtotime($aStartTime) - strtotime($currentTS);
				echo $diff;
				if($diff == 3700)
				{
					printf("hello");
					$mail->addAddress($_SESSION['email']);
        			$adminMail->addAddress('testuser006x@gmail.com');

        			$adminMail->isHTML();
        			$adminMail->Subject = "Appointment Notice <<ADMIN>>";
        			$adminMail->Body = "<h2> your appointment is coming near</h2>
        			<h2>30 Mins till your appointment starts</h2>
					<h2>Attendee email: $email </h2>
					<h2>Appointment Date: $aDate </h2>
					<h2>Appointment Start Time: $aStartTime </h2>";

        			$mail->isHTML();
        			$mail->Subject = "Appointment Notice";
        			$mail->Body = "<h2> your appointment is coming near</h2>
        			<h2>30 Mins till your appointment starts</h2>
					<h2>Appointment Date: $aDate </h2>
					<h2>Appointment Start Time: $aStartTime </h2>";
				}

				header("location:customerPage.php");
			}
		}
		else {
			echo "password Incorrect";
		}
	} else {
		echo "Invalid Email";
	}
}

?>
<HTML>

<HEAD>
	<TITLE>Login Page</TITLE>
	<link href="assets/css/phppot-style.css" type="text/css" rel="stylesheet" />
	<link href="assets/css/user-registration.css" type="text/css" rel="stylesheet" />
</HEAD>

<BODY><br><br><br><br><br><br>
	<div class="phppot-container">
		<div class="sign-up-container">

			<div class="signup-align">
				<form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">

					<div class="signup-heading" style="size: 45px;
    margin-top: -41px;
    margin-left: -55px;">Login to access your account</div>
					<?php if (!empty($loginResult)) { ?>
						<div class="error-msg"><?php echo $loginResult; ?></div>
					<?php } ?>
					<div class="row">
						<div class="inline-block">
							<div class="form-label">
								Username<span class="required error" id="username-info"></span>
							</div>
							<input class="input-box-330" type="text" name="email" id="username">
						</div>
					</div>
					<div class="row">
						<div class="inline-block">
							<div class="form-label">
								Password<span class="required error" id="login-password-info"></span>
							</div>
							<input class="input-box-330" type="password" name="password" id="login-password">
						</div>
					</div>
					<div class="row">
						<input class="btn" type="submit" name="submit" id="login-btn" value="Login"><br>
					</div>
					<div class="row">
						<a href="forgot_password.php" class="btn btn-warning" id="login-btn" style="background-color:yellow;">Forgot Password</a><br>
					</div>
					<br>
					<div class="login-signup" style="margin-right:9px;">
						Don't have account? <a href="user-registration.php"> Register your account Here</a>
					</div>
				</form>
			</div>
		</div>
	</div>
</BODY>

</HTML>