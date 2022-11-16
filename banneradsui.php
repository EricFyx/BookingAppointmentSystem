<?php
    include ('dbcon.php');
    if(isset($_POST['upload']))
    {
        $filename = $_FILES["uploadfile"]["name"];
        $tempname = $_FILES["uploadfile"]["tmp_name"];
        $folder = "./Advertisement_image/" . $filename;

        $sql = "INSERT INTO  banneradd_image (image) VALUES ('$filename')";


        mysqli_query($con, $sql);

        if (move_uploaded_file($tempname, $folder)) {
            echo "<script>alert('Upload successful!')</script>";
        } else {
            echo "<script defer>alert('Upload failed!')</script>";
        }
    }

    if(isset($_POST['update']))
    {
        $filename = $_FILES["uploadfile"]["name"];
        $tempname = $_FILES["uploadfile"]["tmp_name"];
        $folder = "./Advertisement_image/" . $filename;

        $sql = "UPDATE banneradd_image SET image = '$filename' where bannerID = 1";

        mysqli_query($con, $sql);

        if (move_uploaded_file($tempname, $folder)) {
            echo "<script>alert('Update successful!')</script>";
        } else {
            echo "<script defer>alert('Update failed!')</script>";
        }


    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Banner Advertisement">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Banner</title>
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="assets/css/banneradscsss.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
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
    <section class="banner-service">
    <div class="content">
    <p class = "bA"> Banner Advertisement </p>
        <form method="POST" action="" enctype="multipart/form-data">
            <div class="file-input">
                <button class="upload-button">Upload a file</button>
                <input class="form-control" type="file" name="uploadfile" value="" />
            </div>

            <div class="button-group">
                <input type="text" placeholder="Enter Advertisement Description" name = "image_ad" class="box">
                <button class="btn btn-primary" type="submit" name="upload">UPLOAD</button>
                <button class="btn btn-primary" type="submit" name="update">UPDATE</button>
                <button  class="btn btn-primary" type="submit" name="back">
                    <a href="adminPage.php">BACK</a>
                </button>
            </div>
        </form>
    </div>
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
