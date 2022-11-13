<?php
include("dbcon.php");
include("config.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="assets/css/productcss.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Visitor Booking Appointment System</title>
</head>


<body>
    <!--Header-->
    <header>
        <nav class="header">
           <div><img class="Logo" src="images/Logo.png"></div>

        <ul class="header">
            <li><a href="home.php">Profile</a></li>
            <li><a href="">Notification</a></li>
            <li><a href="">Booking</a></li>
            <li><a href="">View Booking</a></li>
        </ul>
        
       </nav>
      </header>

    <!--Banner-->



    <div class="Flower">
        <div class="container">
            <div class="container-homepage1">
                <div>
                    <p class="welcome">Welcome to Cacti-Succulent</p>
                </div>
                <div>
                    <p class="purpose">Cacti-Succulent Kuching is a local homegrown business specialized in selling various type and size of succulent plants. Apart from selling succulent plants, we also sell different type of gardening tools, soils and fertilizers at an affordable cost.</p>
                </div>
            </div>
        </div>
    </div> 

 
    
    

    <article>
    <div>
        <section class="homepage_service">
        <div>

        <?php
        $query = "select * from banneradd_image ";
        $result = mysqli_query($con, $query);

        while ($data = mysqli_fetch_assoc($result))
        {?>
        <img src="./Advertisement_image/<?php echo $data['image'];?>">
        <?php
        }
        ?>
        <h3>Items</h3>
    </div>
        </section>
        
        <section>
            <div class = "container">
        <form action ="searchProduct.php" method = "post">
            <input type ="text" name="search" placeholder="Search Products">
            <input id  type = "submit">

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
                    </tr>
                </thead>
                <?php while($row = mysqli_fetch_assoc($select)){ ?>
                    <tr>
                        <td><img src="uploaded_img/<?php echo $row['image']; ?>" height="100" alt=""></td>
                        <td><?php echo $row['name']; ?></td>
                        <td>$<?php echo $row['price']; ?>/-</td>
                        </tr>
                <?php } ?>
            </table>
        </div>
        </form>
            </div>
        </section>


    </article>



    <!--Footer-->
    <footer>
        <section class=" footer">


            <div class="section-4">
                <ul class="footer-links">
                    <li><a href="">Contact Us</a></li>
                    <li><a href="">Location</a></li>
                </ul>
            </div>
            <iframe class="Map" src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d3985.850742379384!2d101.80436031429385!3d2.555405357229252!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMsKwMzMnMTkuNCJOIDEwMcKwNDgnMjMuNiJF!5e0!3m2!1sen!2smy!4v1666693025798!5m2!1sen!2smy" ></iframe>>
    <script>
    var url = 'https://wati-integration-service.clare.ai/ShopifyWidget/shopifyWidget.js?32548';
    var s = document.createElement('script');
    s.type = 'text/javascript';
    s.async = true;
    s.src = url;
    var options = {
  "enabled":true,
  "chatButtonSetting":{
      "backgroundColor":"#4dc247",
      "ctaText":"",
      "borderRadius":"50",
      "marginLeft":"0",
      "marginBottom":"50",
      "marginRight":"50",
      "position":"right"
  },
  "brandSetting":{
      "brandName":"Cacti Succulent ",
      "brandSubTitle":"Typically replies within a day",
      "brandImg":"./assets/Img/cacti_succulent.jpeg",
      "welcomeText":"Hi there!\nHow can I help you?",
      "messageText":"Hello, I have a question about booking an appointment.",
      "backgroundColor":"#0a5f54",
      "ctaText":"Start Chat",
      "borderRadius":"25",
      "autoShow":false,
      "phoneNumber":"601156349689"
  }
};
    s.onload = function() {
        CreateWhatsappChatWidget(options);
    };
    var x = document.getElementsByTagName('script')[0];
    x.parentNode.insertBefore(s, x);
</script>
        
        </section>
    </footer>

</body>

</html>