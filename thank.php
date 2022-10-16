<?php

include "init.php";

$product_id = $_GET['product_id'];
$stmt = $con->prepare("SELECT * FROM products WHERE product_id = $product_id");
$stmt->execute();
$product = $stmt->fetch();

$stmt = $con->prepare("SELECT * FROM details");
$stmt->execute();
$detail = $stmt->fetch();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $customer    = filter_var($_POST['customer'], FILTER_SANITIZE_STRING);
    $phone       = filter_var($_POST['phone'], FILTER_SANITIZE_STRING);
    $location    = filter_var($_POST['location'], FILTER_SANITIZE_STRING);
    $address     = filter_var($_POST['address'], FILTER_SANITIZE_STRING);
    $order_qty   = $_POST['order_qty'];
    $product_id  = $product['product_id'];

    if (!empty($customer) && !empty($phone) && !empty($location) && !empty($order_qty)) {
        $stmt = $con->prepare("INSERT INTO
            orders(customer, phone, location, address, order_qty, order_status, create_at, product_id)
            VALUES(:zcustomer, :zphone,:zlocation,:zaddress,:zorder_qty, 'انتظار', NOW(), :zproduct_id)");

        $stmt->execute(array(

            'zcustomer'   => $customer,
            'zphone'      => $phone,
            'zlocation'   => $location,
            'zaddress'    => $address,
            'zorder_qty'  => $order_qty,
            'zproduct_id' => $product_id,

        ));

    }
}

?>

<main class="l-main">
    <div class="container" style="text-align: center;">
        <section class="menu section bd-container" id="menu">
            <h2> <?php echo $detail['thank'] ?> !</h2>
            <br><br><br><br>
            <a href="index.php" class="footer__link">العودة إلى المتجر</a>
        </section>
    </div>

</main>

<?php include $tpl . "footer.php"; ?>