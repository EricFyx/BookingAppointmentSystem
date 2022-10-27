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
      echo "<h3>  Image uploaded successfully!</h3>";
  } else {
      echo "<h3>  Failed to upload image!</h3>";
  }
 }
?>

<!DOCTYPE html>
<html lang = "en">
<!-- Meta data -->
<head> 
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Banner Advertisement">
    <link rel="stylesheet" href="assets/css/banneradscsss.css">   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body>
<div id="content">
        <form method="POST" action="" enctype="multipart/form-data">
            <div class="form-group">
                <input class="form-control" type="file" name="uploadfile" value="" />
            </div>
            <p></p>
            <div class="form-group">
                <button class="btn btn-primary" type="submit" name="upload">UPLOAD</button>
                <a href="adminPage.php"><button  class="btn btn-primary" type="submit" name="back"><a href="adminPage.php">BACK</a></button>
            </div>
        </form>
    </div>
</body>
</html>

