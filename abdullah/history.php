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

?><HTML>
<HEAD>
<TITLE>History Page</TITLE>
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
<div style="margin-left:746px;     margin-top: 45px;">

    <div class="inline-block">
   
  <div class="inline-block1" style="border: 1px solid;
    border-color: #9a9a9a;
    background: #fff;
    border-radius: 4px;
    padding: 34px;
    width: 234px;
    margin: 50px auto;
    margin-left: -687px;
    height: 388px;
    margin-top: -29px;">

    <h2>Last Visit Date & Time</h2> 
    <?php
                     include('dbcon.php');
                    $sql=mysqli_query($con, "select * from tbl_member WHERE email='$email'");
                    while($row=mysqli_fetch_array($sql))
                    { ?>

    <h3><?=$row['create_at'];?></h3><br><br>
<br><br>

     <h1>Visit Frequency</h1>

    <h3><?=$row['create_at'];?></h3>
   <?php }?>
    </div>


    <div class="inline-block2" style="border: 1px solid;
    border-color: #9a9a9a;
    background: #fff;
    border-radius: 4px;
    padding: 34px;
    width: 234px;
    margin: 50px auto;
    margin-left: -253px;
    height: 388px;
    margin-top: -505px;">
   
   <h1>Preferance</h1>
    <?php
                     include('dbcon.php');
                    $sql=mysqli_query($con, "select * from preferance");
                    while($row=mysqli_fetch_array($sql))
                    { ?>

    <h3><?=$row['product_name'];?></h3>
<?php }?>
    

    </div>


    <div class="inline-block3" style="border: 1px solid;
    border-color: #9a9a9a;
    background: #fff;
    border-radius: 4px;
    padding: 34px;
    width: 234px;
    margin: 50px auto;
    margin-left: 147px;
    height: 388px;
    margin-top: -514px;">
   
<h1>Purchases Made</h1>
    <?php
                     include('dbcon.php');
                    $sql=mysqli_query($con, "select * from purchased");
                    while($row=mysqli_fetch_array($sql))
                    { ?>

    <h3>Product Name:<?=$row['product_name'];?></h3>
    <h3>Quantity:<?=$row['qty'];?></h3>
    <h3>Purchased Date:<?=$row['date'];?></h3>
<?php }?>

    </div>
              
              <div style="margin-top: -540px;
    margin-left: -750px;">
                  <a href="home.php">Back to user profile</a>
              </div>
           </div>
         </div>
       </div>
     </div>
</BODY>
</HTML>