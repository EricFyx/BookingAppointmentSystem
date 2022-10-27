<?php
session_start();
?>

<?php

include ('dbcon.php');

if(isset($_POST['submit'])){
  $email = $_POST['email'];
  $password = $_POST['password'];

  $email_search = "select * from tbl_member where email='$email'";
  $query = mysqli_query($con,$email_search);

  $email_count = mysqli_num_rows($query);

  if($email_count){
    $email_pass = mysqli_fetch_assoc($query);
	//$row = mysqli_fetch_array($query);

    $db_pass = $email_pass['password'];

    $_SESSION['username'] = $email_pass['username'];
        $_SESSION['email'] = $email_pass['email'];
          $_SESSION['contact'] = $email_pass['contact'];
        $_SESSION['address'] = $email_pass['address'];
          $_SESSION['state'] = $email_pass['state'];
        $_SESSION['city'] = $email_pass['city'];
    $pass_decode = password_verify($password, $db_pass);

    if($pass_decode && $_SESSION["email"] == "admin@gmail.com"){
      echo "login successful";
	  header("location:adminPage.php");
      ?>
      <?php
    }elseif($pass_decode){
		header("location:customerPage.php");
    }else{
		echo "Password Incorrect";
	}
	

  }else{
    echo "Invalid Email";
  }

}

?>
<HTML>
<HEAD>
<TITLE>Login Page</TITLE>
<link href="assets/css/phppot-style.css" type="text/css"
	rel="stylesheet" />
<link href="assets/css/user-registration.css" type="text/css"
	rel="stylesheet" />
</HEAD>
<BODY><br><br><br><br><br><br>
	<div class="phppot-container">
		<div class="sign-up-container">
			
			<div class="signup-align">
				  <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">

					<div class="signup-heading" style="size: 45px;
    margin-top: -41px;
    margin-left: -55px;">Login to access your account</div>
				<?php if(!empty($loginResult)){?>
				<div class="error-msg"><?php echo $loginResult;?></div>
				<?php }?>
				<div class="row">
						<div class="inline-block">
							<div class="form-label">
								Username<span class="required error" id="username-info"></span>
							</div>
							<input class="input-box-330" type="text" name="email"
								id="username">
						</div>
					</div>
					<div class="row">
						<div class="inline-block">
							<div class="form-label">
								Password<span class="required error" id="login-password-info"></span>
							</div>
							<input class="input-box-330" type="password"
								name="password" id="login-password">
						</div>
					</div>
					<div class="row">
						<input class="btn" type="submit" name="submit"
							id="login-btn" value="Login"><br>
					</div>
<br><div class="login-signup" style="margin-right:9px;">
				Don't have account? <a href="user-registration.php"> Register your account Here</a>
			</div>
				</form>
			</div>
		</div>
	</div>
</BODY>
</HTML>
