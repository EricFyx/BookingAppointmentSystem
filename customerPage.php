<?php
include("dbcon.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Visitor Booking Appointment System</title>
</head>

<body>
    <header>
        

        <nav>
            <ul>
                <li><a href="home.php">Profile</a></li>
                <li><a href="">Booking</a></li>
                <li><a href="">View Booking</a></li>
            </ul>
        </nav>

    </header>

    <div>
        <?php
        $query = "select * from banneradd_image ";
        $result = mysqli_query($con, $query);

        while ($data = mysqli_fetch_assoc($result))
        {?>
        <img class ="Flower" src="./Advertisement_image/<?php echo $data['image'];?>">
        <?php
        }
        ?>
    </div>

    <article>
        <section class="homepage_service">
            <h3>Items</h3>
           
        </section>

        <section>

        </section>


    </article>



    <!--Footer-->
    <footer>
        <section class=" footer">
            <div class="section-1">

            </div>


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