<?php

@include 'config.php';

if(isset($_POST['add_product'])){

   $product_name = $_POST['product_name'];
   $product_price = $_POST['product_price'];
   $product_image = $_FILES['product_image']['name'];
   $product_image_tmp_name = $_FILES['product_image']['tmp_name'];
   $product_image_folder = 'uploaded_img/'.$product_image;

   if(empty($product_name) || empty($product_price) || empty($product_image)){
      $message[] = 'Please fill out all fields';
   }else{
      $insert = "INSERT INTO products(name, price, image) VALUES('$product_name', '$product_price', '$product_image')";
      $upload = mysqli_query($conn,$insert);
      if($upload){
         move_uploaded_file($product_image_tmp_name, $product_image_folder);
         $message[] = 'New product added successfully';
      }else{
         $message[] = 'Could not add the product';
      }
   }

};

if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM products WHERE id = $id");
    header('location:admin_page.php');
 };



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="assets/css/productcss.css">

</head>
<body>
<header>
    <nav class="header">
        <div><img class="Logo" src="images/Logo.png"></div>
        <ul>
            <li><a href="adminPage.php">Home</a></li>
            <li><a href="banneradsui.php">Banner</a></li>
            <li><a href="enhancement.html">Booking</a></li>
            <li><a href="Product.php">Product</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </nav>
</header>
<div class="ProductCover">
    <div class="CoverText">
        <h1>Add Products</h1>
    </div>
</div>
<br>
<br>

<?php
if(isset($message))
{
    foreach($message as $message)
    {
        echo'<span class = "message">'.$message.'</span>';
    }
}

?>

    <div class = "container">
        <div class = "admin-product-form-container">
            <form action="<?php $_SERVER['PHP_SELF']?>" method= "post" enctype="multipart/form-data">
                <h3>Add New Product</h3>
                <input type="text" placeholder="Enter Product Name" name = "product_name" class="box">
                <input type="number" placeholder="Enter Product Price (RM)" name = "product_price" class="box">
                <input type="file" accept= "image/png, image/jpg, image/jpeg" name = "product_image" class="box">
                <input type="submit" class = "btn" name = "add_product" value = "add product">
            </form>
        </div>

        <?php
            $select = mysqli_query($conn, "SELECT * FROM products");
        ?>
        <div class="product-display">
            <table class="product-display-table">
                <thead>
                    <tr>
                        <th>product image</th>
                        <th>product name</th>
                        <th>product price</th>
                        <th>action</th>
                    </tr>
                </thead>
                <?php while($row = mysqli_fetch_assoc($select)){ ?>
                    <tr>
                        <td><img src="uploaded_img/<?php echo $row['image']; ?>" height="100" alt=""></td>
                        <td><?php echo $row['name']; ?></td>
                        <td>RM <?php echo $row['price']; ?>/-</td>
                        <td>
                            <a href="admin_update.php?edit=<?php echo $row['id']; ?>" class="btn"> <i class="fas fa-edit"></i> edit </a>
                            <a href="admin_page.php?delete=<?php echo $row['id']; ?>" class="btn"> <i class="fas fa-trash"></i> delete </a>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        </div>

    </div>
    
</body>
</html>