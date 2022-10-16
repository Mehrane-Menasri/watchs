<?php include "init.php"; 

$stmt = $con->prepare("SELECT * FROM products ORDER BY product_id DESC");
$stmt->execute();
$products = $stmt->fetchAll();

// VISIT COUNTER
$localhost = "localhost";
$user_db = "root";
$pass_db = "";
$db = "watchs";
$connect = mysqli_connect($localhost, $user_db, $pass_db, $db);
$visitor_ip = $_SERVER['REMOTE_ADDR'];
$query = "SELECT * FROM visitors WHERE  ip_address = '$visitor_ip'";
$result = mysqli_query($connect, $query);
if(!$result) {
    die("Retriving Query Error<br>");
}
$total_visitors = mysqli_num_rows($result);
if($total_visitors < 1) {
    $query2 = "INSERT INTO visitors(ip_address) VALUES('$visitor_ip')";
    $result = mysqli_query($connect, $query2);
}
// / VISIT COUNTER

?>
<main class="l-main">



            <!--========== PRODUCTS ==========-->
            <section class="menu section bd-container" id="menu">
                <!-- <span class="section-subtitle">منتجاتنا</span>
                <h2 class="section-title">ساعات حديثة و أنيقة</h2> -->

                <div class="menu__container bd-grid">

                    <?php 
                    foreach($products as $product) { ?>
                        <div class="menu__content">
                            <?php if($product['discount_percentage'] > 0) { ?>
                                <span dir="ltr" class="discount_percentage">-<?php echo $product['discount_percentage']; ?>%</span>
                            <?php } ?>
                            <a href="product.php?product_id=<?php echo $product['product_id']?>" class="img__box">
                                <img src="admin/uploads/images/<?php echo $product['product_image']?>" alt="" class="menu__img">
                            </a>
                            <h3 class="menu__name"><?php echo $product['product_name'] ?></h3>
                            <!-- <span class="menu__preci"><?php echo $product['product_price'] ?> دج </span> -->
                            <span style="font-size:16px;"><?php if($product['product_discount'] > 0) {echo $product['product_discount'] . 'دج <del style="font-size:13px; margin-right: 5px">' . $product['product_price'] . ' دج </del>'; } else {echo $product['product_price'] . 'دج';} ?></span>
                            <div style="display: flex;">
                                <?php for($i = 0; $i < $product['rating']; $i++){echo '<i class="bi bi-star" style="padding-left:5px;"></i>';}   ?> </span>
                            </div>
                        </div>
                    <?php }
                    ?>
                </div>
            </section>

        </main>

<?php include $tpl . "footer.php"; ?>