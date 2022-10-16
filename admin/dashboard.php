<?php 
    session_start();
    $pageTitle = 'لوحة التحكم';
    if(isset($_SESSION['user_name'])) {
        // echo '<h1>مرحبا بك، هذه لوحة التحكم!</h1>';
    } else {
        header('Location: index.php');
        exit();
    }

    include "init.php";

    $latestProducts = getLatest('*', 'products', 'product_id', 5);
    // $latestUsers    = getLatest('*', 'users', 'user_id', 5);
    $latestOrders   = getLatest('*', 'orders', 'order_id', 5);
    $stmt = $con->prepare("SELECT orders.*, products.product_name
                            FROM orders 
                            INNER JOIN products
                            ON products.product_id = orders.product_id
                            ORDER BY create_at DESC
                            LIMIT 5");
    $stmt->execute();
    $latestOrders = $stmt->fetchAll(); 

    $stmt2 = $con->prepare("SELECT * FROM visitors");
    $stmt2->execute();
    $visitors = $stmt2->rowCount();
?>

<div class="row">
    <div class="col-md-4 text-center">
        <div class="card bg-warning mb-3">
            <div class="card-body">
                <i class="bi bi-eye" style="margin-left: 7px;"></i>
                <h5 class="card-title">عدد الزيارات</h5>
                <a href="#">
                    <h1><?php  echo $visitors; ?></h1>
                </a>
                <p class="card-text">عدد جميع  الزوار  للمتجر.</p>
            </div>
        </div>
    </div>
    <div class="col-md-4 text-center">
        <div class="card bg-info text-white mb-3">
            <div class="card-body">
                <i class="bi bi-tags"></i>
                <h5 class="card-title">عدد المنتجات</h5>
                <a href="products.php">
                    <h1 class="text-white"><?php echo countItems('product_id', 'products') ?></h1>
                </a>
                <p class="card-text">عدد جميع المنتجات الموجودة في المتجر.</p>
            </div>
        </div>
    </div>
    <div class="col-md-4 text-center">
        <div class="card bg-success text-white mb-3">
            <div class="card-body">
                <i class="bi bi-pin-angle"></i>
                <h5 class="card-title">عدد الطلبات</h5>
                <a href="orders.php">
                    <h1 class="text-white"><?php echo countItems('order_id', 'orders') ?></h1>
                </a>
                <p class="card-text">عدد جميع الطلبات الموجودة في المتجر.</p>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="accordion" id="accordionExample">
            <div class="card">
                <div class="card-header" id="headingOne">
                <h2 class="mb-0">
                    <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        آخر 5 منتجات إضافة
                    </button>
                </h2>
                </div>

                <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body bg-info">

                <?php foreach ($latestProducts as $product) { ?>
                    <li href="#" class="list-group-item list-group-item-action">
                        <?php echo $product['product_name'];?>
                        <span class="btn text-danger btn-sm float-end mx-1" onclick='return confirm("أنت متأكد أنك ستحذف ")'><a href="products.php?do=Delete&product_id=<?=$product['product_id']?>"><i class="bi bi-trash"></i></a></span>
                        <span type="button" class="btn text-success btn-sm float-end mx-1"><a href="products.php?do=Edit&product_id=<?=$product['product_id']?>"><i class="bi bi-pen"></i></a></span>
                    </li>
                <?php } ?>

                </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="accordion" id="accordionExample">
            <div class="card">
                <div class="card-header" id="headingTwo">
                <h2 class="mb-0">
                    <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        آخر 5 طلبات إضافة
                    </button>
                </h2>
                </div>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                <div class="card-body bg-success">
                <?php foreach ($latestOrders as $order) { ?>
                    <li href="#" class="list-group-item list-group-item-action">
                        <?php echo $order['customer'] . ', ' . $order['product_name'] . ', ' . $order['location'];?> 
                        <span class="btn text-danger btn-sm float-end mx-1" onclick='return confirm("أنت متأكد أنك ستحذف ")'><a href="orders.php?do=Delete&order_id=<?=$order['order_id']?>"><i class="bi bi-trash text-danger"></i></a></span>
                        <?php 
                            if($order['order_status'] == 'انتظار') { ?>
                                <a href="orders.php?do=Approve&order_id=<?=$order['order_id']?>" class="text-success link"><i class="bi bi-check2"></i></a>
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

<?php
    
include $tpl . "footer.php"; 

