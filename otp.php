<?php
$currentPage = "OTP";
session_start();
ob_start();
require_once('header.php');


if (!isset($_SESSION['otp'])) {
	header('location: login.php');
}

$email = $_GET['email'];

if (isset($_POST['submit'])) {

	$otp = $_POST['otp'];

	$query = "SELECT * FROM tbl_member WHERE otp=$otp AND email=$email;";

	$result = mysqli_query($con, $query);

	$result1 = mysqli_num_rows($result);

	if ($result1 > 0) {
		header("location: new_password.php?token=$otp");
	} else {
		$err = "Wrong OTP!";
	}
}

?>

<div class="container padding-bottom-3x mb-2 mt-5">
	<div class="row justify-content-center">
		<div class="card">
			<div class="card-header">
				<div class="forgot">

					<h2>Enter your OTP</h2>

				</div>
			</div>
			<div class="card-body">


				<?php echo isset($err) ? "<span class='form-control alert alert-danger'>{$err}</span>" : ""  ?>
				<?php echo isset($success) ? "<span class='form-control alert alert-success'>{$success}</span>" : ""  ?>

				<form class="mt-4" action="" method="POST">
					<div class="form-group">
						<label for="email-for-pass">Enter your OTP</label>
						<input class="form-control" type="number" id="email-for-pass" name="otp"><small class="form-text text-muted">Enter the OTP you get at your email address.</small>
					</div>
					<input class="btn btn-warning" type="submit" value="Submit" name="submit">
					<a href="login.php" class="btn btn-danger" type="submit">Back to Login</a>
				</form>
			</div>
		</div>
	</div>
</div>