<?php

@include 'config.php';

if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM products WHERE id = $id");
    header('location:admin_page.php');
 };

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="assets/css/productcss.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Product</title>
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
			<h1>Products</h1>
			<div class = "addBTN">
				<a href="admin_page.php" class="Categories">+ Add Product</a>
			</div>
		</div>
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
                        <td>$<?php echo $row['price']; ?>/-</td>
                        <td>
                            <a href="admin_update.php?edit=<?php echo $row['id']; ?>" class="btn"> <i class="fas fa-edit"></i> edit </a>
                            <a href="admin_page.php?delete=<?php echo $row['id']; ?>" class="btn"> <i class="fas fa-trash"></i> delete </a>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        </div>




    </div>
    	<footer>
        <section class=" footer">


            <div class="section-4">
                <ul class="footer-links">
                    <li><a href="">Contact Us</a></li>
                    <li><a href="">Location</a></li>
                </ul>
            </div>

        </section>
    </footer>
</body>

</html>