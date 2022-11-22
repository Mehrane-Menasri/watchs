<?php
// connect to database
$dsn    = 'mysql:host=localhost;dbname=barbershop';
$user   = 'root';
$pass   = '';
$option = array(
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
);

try {
    $con = new PDO($dsn, $user, $pass, $option);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo 'تم الإتصال بقاعدة البيانات بنجاح' . $dsn ;
} catch (PDOException $e) {
    echo 'فشل الإتصال بقاعدة البيانات' . $e->getMessage();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $client      = $_POST['client'];
    $email       = $_POST['email'];
    $phone       = $_POST['phone'];
    $location    = $_POST['location'];
    $address     = $_POST['address'];
    $hairstyle   = $_POST['hairstyle'];
    $res_date    = $_POST['res_date'];
    $res_time    = $_POST['res_time'];

    if (!empty($client) && !empty($phone) && !empty($location) && !empty($hairstyle) && !empty($res_date) && !empty($res_time)) {
        $stmt = $con->prepare("INSERT INTO
            orders(client, email, phone, location, address, hairstyle, res_status, create_at, res_date, res_time)
            VALUES(:zclient, :zemail, :zphone, :zlocation, :zaddress, :zhairstyle, 'pending', NOW(), :zres_date, :zres_time)");

        $stmt->execute(array(

            'zclient'     => $client,
            'zemail'      => $email,
            'zphone'      => $phone,
            'zlocation'   => $location,
            'zaddress'    => $address,
            'zhairstyle'  => $hairstyle,
            'zres_date'   => $res_date,
            'zres_time'    => $res_time,

        ));

        header("Location: thank.php");
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BARBERSHOP</title>
    <!-- costum css -->
    <link rel="stylesheet" href="layout/css/styles.css">
    <!-- boxicons link -->
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <!-- bootstrap-icons link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <!-- fontawesome link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>

<body>

    <!-- navbar -->
    <header>
        <nav class="container nav">
            <i class='bx bx-menu' id="menu-icon"></i>
            <a href="" class="logo"><i class="bi bi-scissors"></i> BARBER<span>SHOP</span></a>
            <ul class="navbar">
                <li><a href="#home" class="active">Home</a></li>
                <li><a href="#services">Services</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#gallery">Gallery</a></li>
                <li><a href="#contact">Book with us</a></li>
            </ul>
            <div class="social">
                <a href="#"><i class="bx bxl-facebook"></i></a>
                <a href="#"><i class="bx bxl-twitter"></i></a>
                <a href="#"><i class="bx bxl-instagram"></i></a>
            </div>
        </nav>
    </header>
    <!-- /navbar -->

    <!-- home section -->
    <section class="home" id="home">
        <h4>- GENTLEMEN'S -</h4>
        <h1>BARBERSHOP</h1>
        <a href="#services">
            <i class="home-icon bi bi-chevron-double-down"></i>
        </a>
    </section>
    <!-- /home section -->

    <!-- services -->
    <section class="services" id="services">
        <div class="heading">
            <span>OUR SERVICES</span>
            <h2>What services do we provide in our salon?</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae, ipsa.</p>
        </div>
        <div class="services-container container">
            <div class="box">
                <img src="layout/images/sevices.jpg" alt="">
                <span class="price">$25</span>
                <h2>Signature Haircut</h2>
            </div>
            <div class="box">
                <img src="layout/images/sevices.jpg" alt="">
                <span class="price">$25</span>
                <h2>Haircut</h2>
            </div>
            <div class="box">
                <img src="layout/images/sevices.jpg" alt="">
                <span class="price">$25</span>
                <h2>Cut & Shave</h2>
            </div>
            <div class="box">
                <img src="layout/images/sevices.jpg" alt="">
                <span class="price">$25</span>
                <h2>Signature Haircut</h2>
            </div>
            <div class="box">
                <img src="layout/images/sevices.jpg" alt="">
                <span class="price">$25</span>
                <h2>Haircut</h2>
            </div>
            <div class="box">
                <img src="layout/images/sevices.jpg" alt="">
                <span class="price">$25</span>
                <h2>Deep Tissue Shave</h2>
            </div>
        </div>
    </section>
    <!-- /services -->

    <!-- about -->
    <div class="" style="background-color: #192652; color: white;">
        <section class="about container" id="about">
            <div class="about-img">
                <img src="layout/images/about1.jpg" alt="">
            </div>
            <div class="about-text">
                <span>OUR STORY</span>
                <h2>Cheap Prices With <br>Stylish Hairstyle</h2>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ut nemo et possimus quae eveniet suscipit, deleniti
                    maxime reprehenderit, dolor earum quasi quis eaque! Velit quo facilis labore necessitatibus esse a.</p>
                <a href="#" class="btn">Learn More...</a>
            </div>
        </section>
    </div>
    <!-- /about -->

    <!-- gallery -->
    <section class="gallery" id="gallery">
        <div class="heading">
            <span>GALLERY</span>
            <h2>We have all types of gallery</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae, ipsa.</p>
        </div>
        <div class="gallery-container container">
            <div class="box">
                <img src="layout/images/gallery1.jpg" alt="">
            </div>
            <div class="box">
                <img src="layout/images/gallery1.jpg" alt="">
            </div>
            <div class="box">
                <img src="layout/images/gallery1.jpg" alt="">
            </div>
            <div class="box">
                <img src="layout/images/gallery1.jpg" alt="">
            </div>
            <div class="box">
                <img src="layout/images/gallery1.jpg" alt="">
            </div>
            <div class="box">
                <img src="layout/images/gallery1.jpg" alt="">
            </div>
        </div>
    </section>
    <!-- /gallery -->

    <!-- contact -->
    <section class="contact" id="contact">
        <div class="heading">
            <span>CONTACT US</span>
            <h2>For any services or inquiries, do not hesitate to contact us</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae, ipsa.</p>
        </div>
        <div class="contact-container container">
            <form action="index.php" method="POST">
                <h3>Book with us</h3>
                <div class="group">
                    <input type="text" name="client" placeholder="Type Your Name Here...">
                    <input type="email" name="email" placeholder="Type Your Email Here...">
                </div>
                <div class="group">
                    <input type="text" name="phone" placeholder="Type Your Phone Here...">
                    <!-- <input type="text" name="address" placeholder="Type Your Address Here..."> -->
                    <select name="address" id="">
                        <option value="">Choose Staff member</option>
                        <option value="Alex">Alex</option>
                        <option value="alen">alen</option>
                        <option value="mary">mary</option>
                    </select>
                </div>
                <div class="group">
                    <select name="location" id="">
                        <option value="">Choose City</option>
                        <option value="New York">New York</option>
                        <option value="Los Angeles">Los Angeles</option>
                        <option value="Chicago">Chicago</option>
                        <option value="Houston">Houston</option>
                        <option value="Dallas">Dallas</option>
                    </select>
                    <select name="hairstyle" id="">
                        <option value="">Choose Hairstyle</option>
                        <option value="Signature Haircut">Signature Haircut</option>
                        <option value="Haircut">Haircut</option>
                        <option value="Cut & Shave">Cut & Shave</option>
                        <option value="Deep Tissue Shave">Deep Tissue Shave</option>
                    </select>
                </div>
                <div class="group">
                    <input type="date" name="res_date">
                    <input type="time" name="res_time">
                </div>
                <div class="group">
                    <input type="submit" class="btn" value="Submit">
                </div>
            </form>
        </div>
    </section>
    <!-- /contact -->

    <!-- footer -->
    <footer class="footer">
        <div class="footer-container container">
            <div class="box">
                <a href="" class="logo"><i class="bi bi-scissors"></i> BARBER<span>SHOP</span></a>
                <P>Phone: 123-456-7890</P>
                <P style="margin-bottom: 15px;">Email: info@mysite.com</P>
                <div class="social">
                    <a href="#"><i class="bx bxl-facebook"></i></a>
                    <a href="#"><i class="bx bxl-twitter"></i></a>
                    <a href="#"><i class="bx bxl-instagram"></i></a>
                    <a href="#"><i class="bx bxl-youtube"></i></a>
                </div>
            </div>
            <div class="box">
                <h3>LINKS</h3>
                <a href="#home"><i class="bi bi-scissors"></i> Home</a>
                <a href="#services"><i class="bi bi-scissors"></i> Services</a>
                <a href="#about"><i class="bi bi-scissors"></i> About</a>
                <a href="#gallery"><i class="bi bi-scissors"></i> Gallery</a>
            </div>
            <div class="box">
                <h3>OPENING HOURS</h3>
                <a><i class="bi bi-clock"></i> Mon - Fri: 7am - 10pm</a>
                <a><i class="bi bi-clock"></i> ​​Saturday: 8am - 10pm</a>
                <a><i class="bi bi-clock"></i> Sunday: 8am - 11pm</a>
            </div>
            <div class="box">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2965.248628540035!2d-87.70217548531248!3d41.994939379213115!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x880fce1f9df0d6df%3A0x1685e184d440f57!2s6234%20N%20California%20Ave%2C%20Chicago%2C%20IL%2060659%2C%20%C3%89tats-Unis!5e0!3m2!1sfr!2sdz!4v1669153214693!5m2!1sfr!2sdz" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </footer>
    <!-- /footer -->

    <!-- copyright -->
    <div class="copy">
        <p>&#169; Designed By <span>MEHRANE MENASRI</span> - 2022 - M'sila, Algeria.</p>
    </div>

    <script src="layout/js/script.js"></script>
</body>

</html>