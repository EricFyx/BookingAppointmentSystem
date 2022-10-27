<?php
require_once ('dbcon.php'); 

if(isset($_POST['submit'])){
  $username = mysqli_real_escape_string($con, $_POST['username']) ;
  $email = mysqli_real_escape_string($con, $_POST['email']) ;
  $password = mysqli_real_escape_string($con, $_POST['password']) ;
  $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']) ;



  $pass = password_hash($password, PASSWORD_BCRYPT);
  $cpass = password_hash($cpassword, PASSWORD_BCRYPT);

  $emailquery = " select * from tbl_member where email='$email' ";
  $query = mysqli_query($con,$emailquery);

  $emailcount = mysqli_num_rows($query);

  if($emailcount>0){
    echo "email already exists";
  }else{
    if($password === $cpassword){

      $insertquery = "INSERT INTO `tbl_member` (`username`, `password`, `cpassword`, `email`, `create_at`) VALUES ('$username', '$pass', '$cpass', '$email', current_timestamp());";

      $iquery = mysqli_query($con, $insertquery);

      if($iquery){
          ?>
            <script>
              alert("Inserted Successful");
              
            </script>
          <?php
        }else{

          ?>
            <script>
              alert("NO Inserted ");
            </script>
          <?php
        }

    }else{
      ?>
        <script>
          alert("Password are not matching ");
            </script>
          <?php
    }
  }



}


?>

<HTML>
<HEAD>
<TITLE>User Registration</TITLE>
<link href="assets/css/phppot-style.css" type="text/css"
	rel="stylesheet" />
<link href="assets/css/user-registration.css" type="text/css"
	rel="stylesheet" />
</HEAD>
<BODY>
	<div class="phppot-container">
		<div class="sign-up-container">
			
			<div class="">
				<form name="sign-up" action="" method="post"
					onsubmit="return signupValidation()">
					<div class="signup-heading">Registration</div>
				
				<div class="error-msg" id="error-msg"></div>
					<div class="row">
						<div class="inline-block">
							<div class="form-label">
								Username<span class="required error" id="username-info"></span>
							</div>
							<input class="input-box-330" type="text" name="username"
								id="username">
						</div>
					</div>
					<div class="row">
						<div class="inline-block">
							<div class="form-label">
								Email<span class="required error" id="email-info"></span>
							</div>
							<input class="input-box-330" type="email" name="email" id="email">
						</div>
					</div>
					<div class="row">
						<div class="inline-block">
							<div class="form-label">
								Password<span class="required error" id="signup-password-info"></span>
							</div>
							<input class="input-box-330" type="password"
								name="password" id="signup-password">
						</div>
					</div>
					<div class="row">
						<div class="inline-block">
							<div class="form-label">
								Confirm Password<span class="required error"
									id="confirm-password-info"></span>
							</div>
							<input class="input-box-330" type="password"
								name="cpassword" id="confirm-password">
						</div>
					</div>
					<div class="row">
						<input class="btn" type="submit" name="submit"
							id="signup-btn" value="Sign up">
					</div><div class="login-signup">Have a account?
				<a href="index.php">Login to access your account</a>
			</div>
				</form>
			</div>
		</div>
	</div>

	
</BODY>
</HTML>
