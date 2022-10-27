<?php
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

?>
<HTML>
<HEAD>
<TITLE>Login Page</TITLE>
<link href="assets/css/phppot-style.css" type="text/css"
    rel="stylesheet" />
<link href="assets/css/user-registration.css" type="text/css"
    rel="stylesheet" />
</HEAD>
<BODY>



    <div class="phppot-container">
        <div class="sign-up-container"style="    border: 1px solid;
    border-color: #9a9a9a;  background: #fff;  border-radius: 4px;   padding: 34px;
    width: 1304px;    margin: 50px auto;    margin-left: -330px;    height: 500px;">
<div style="margin-left:746px;     margin-top: 45px;
">
    <div class="inline-block">
        <?php
                     include('dbcon.php');
                    $sql=mysqli_query($con, "select * from tbl_member WHERE email='$email'");
                    while($row=mysqli_fetch_array($sql))
                    { ?>
  <form method="post" enctype="multipart/form-data">
 



                            <div class="form-label">
                                Username<span class="required error" id="username-info"></span>
                            </div>
                            <input class="input-box-330" type="text" value="<?=$row['username'];?>" name="username"
                                id="username">
                        </div> <br>

                        
                        <div class="inline-block">
                            <div class="form-label">
                                contact Number<span class="required error"  id="username-info"></span>
                            </div>
                            <input class="input-box-330" type="text" value="<?=$row['contact'];?>" name="contact"
                                id="username">
                        </div><br>
                            <div class="inline-block">
                            <div class="form-label">
                                Address<span class="required error" id="username-info"></span>
                            </div>
                            <input class="input-box-330" value="<?=$row['address'];?>" type="text" name="address"
                                id="username">
                        </div><br>
                            <div class="inline-block">
                            <div class="form-label">
                                city<span class="required error" id="username-info"></span>
                            </div>
                            <input class="input-box-330" value="<?=$row['city'];?>" type="text" name="city"                                id="username">
                        </div><br>
                            <div class="inline-block">
                            <div class="form-label">
                                state<span class="required error" id="username-info"></span>
                            </div>
                            <input class="input-box-330" value="<?=$row['state'];?>" type="text" name="state"
                                id="username">
                        </div><br><input class="input-box-330" type="hidden" value="<?=$row['email'];?>" name="email" ><br>
                         <div class="inline-block">
                            <div class="form-label">
                                Upload Profile Image<span class="required error" id="username-info"></span>
                            </div>
                            <input class="input-box-330"  type="file" name="file"
                                id="username">
                        </div><br><input class="input-box-330" type="hidden" value="<?=$row['email'];?>" name="email" ><br>

 <div>
    <img src="profile_image/<?=$row['image'];?>" alt="<?=$row['image'];?>" style="width: 200px;
    margin-left: -328px;    border-radius: 106px;    margin-top: -318px;">
                        </div> <br>
<?php  }?>
    <div class="row" style="margin-left: -308px;">
                        <input class="btn" type="submit" name="submit"
                            id="login-btn" value="SAVE "><br>
                    </div>
</div>
          </form>  
              

            <div class="row" style="margin-left: -996px;
    margin-top: -387px;">
                       <a href="history.php">   <input class="btn" type="submit" name="submit"
                            id="login-btn" value="previous History "></a><br>
                    </div>
                    <div class="row" style="margin-left: -996px;
    margin-top: 2px;">
                       <a href="customerPage.php"> <input class="btn" type="submit" name="submit"
                            id="login-btn" value="Back to Homepage "></a><br>
                    </div>
                    <div class="row" style="margin-left: -996px;
    margin-top: 2px;">
                       <a href="logout.php"> <input class="btn" type="submit" name="submit"
                            id="login-btn" value="Logout "></a><br>
                    </div>
                  

                    </div>
    </div>
</BODY>
</HTML>

<?php 
include_once 'dbcon.php';
 
if (isset($_POST["submit"]))
 {
        $username = $_POST["username"];
                $contact = $_POST["contact"];
                $address = $_POST["address"];
                $city = $_POST["city"];
                $state = $_POST["state"];
           

     
     $pname = rand(1000,10000)."-".$_FILES["file"]["name"];
 

    $tname = $_FILES["file"]["tmp_name"];
$uploads_dir = 'profile_image';
    move_uploaded_file($tname, $uploads_dir.'/'.$pname);
 
    $sql = "UPDATE `tbl_member` SET `username`='$username',`contact`='$contact',`address`='$address',`state`='$state',`city`='$city',`image`='$pname' WHERE email= '$email'";
 
    if(mysqli_query($con,$sql)){
 
    echo '<script type="text/javascript">window.location.href="home.php";</script>';
    }
    else{
        echo "Error";
    }
}
 
 
?>


