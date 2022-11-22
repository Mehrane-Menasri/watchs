<?php
session_start();
$pageTitle = 'DASHBOARD';
if (isset($_SESSION['user_name'])) {
    // echo '<h1>مرحبا بك، هذه لوحة التحكم!</h1>';
} else {
    header('Location: index.php');
    exit();
}

include "init.php";

// $latestProducts = getLatest('*', 'products', 'product_id', 5);
// $latestUsers    = getLatest('*', 'users', 'user_id', 5);
$latestOrders   = getLatest('*', 'orders', 'id', 5);
$stmt = $con->prepare("SELECT * FROM orders ORDER BY create_at DESC LIMIT 5");
$stmt->execute();
$latestOrders = $stmt->fetchAll();

$stmt2 = $con->prepare("SELECT * FROM visitors");
$stmt2->execute();
$visitors = $stmt2->rowCount();
?>
<div class="" style="min-height: 450px;">
    <div class="row">
        <div class="col-md-6 text-center">
            <div class="card bg-secondary text-white mb-3 shadow">
                <div class="card-body">
                    <i class="bi bi-eye" style="margin-left: 7px;"></i>
                    <h5 class="card-title">Visitors Number</h5>
                    <a href="#">
                        <h1><?php echo $visitors; ?></h1>
                    </a>
                    <p class="card-text"> The number of all visitors to the store.</p>
                </div>
            </div>
        </div>
        <div class="col-md-6 text-center">
            <div class="card bg-secondary text-white mb-3 shadow">
                <div class="card-body">
                    <i class="bi bi-pin-angle"></i>
                    <h5 class="card-title">Reservations Number</h5>
                    <a href="orders.php">
                        <h1 class="text-white"><?php echo countItems('id', 'orders') ?></h1>
                    </a>
                    <p class="card-text">The number of all orders to the store.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="accordion" id="accordionExample">
                <div class="card">
                    <div class="card-header shadow" id="headingTwo">
                        <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Last 5 Reservations
                            </button>
                        </h2>
                    </div>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                        <div class="card-body bg-secondary text-white ">
                            <?php foreach ($latestOrders as $order) { ?>
                                <li href="#" class="list-group-item list-group-item-action">
                                    <?php echo $order['client'] . ', ' . $order['hairstyle'] . ', ' . $order['location']; ?>
                                    <span class="btn text-danger btn-sm float-end mx-1" onclick='return confirm(" Are You Sure? ")'><a href="orders.php?do=Delete&id=<?= $order['id'] ?>"><i class="bi bi-trash text-white" style="font-size: 20px;"></i></a></span>
                                    <?php
                                    if ($order['res_status'] == 'pending') { ?>
                                        <a href="orders.php?do=Approve&id=<?= $order['id'] ?>" class="text-success link"><i class="bi bi-check2"></i></a>
                                    <?php }
                                    ?>
                                </li>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php

include $tpl . "footer.php";
