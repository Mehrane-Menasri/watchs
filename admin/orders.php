<?php

/*
=====================
=== TEMPLATE PAGE ===
=====================
*/
ob_start();
session_start();
$pageTitle = 'الطلبات';


if(isset($_SESSION['user_name'])){
    include 'init.php';
    $do = isset($_GET['do']) ? $_GET['do'] : 'Manage';

    // updating order status
    if(isset($_GET['order_id']) && isset($_GET['order_status'])) {
        $order_id = isset($_GET['order_id']) && is_numeric($_GET['order_id']) ? intval($_GET['order_id']) : 0;
        $order_status = $_GET['order_status'];
        $check = checkItem('order_id', 'orders', $order_id);
        if($check > 0){
            $stmt = $con->prepare("UPDATE orders SET order_status = '$order_status' WHERE order_id = ?");
            $stmt->execute(array($order_id));
            $theMsg = "<div class='alert alert-success'>" . 'تم إنجاز الطلب' . "</div>";
            redirectPage($theMsg, 'back');
        } else {
            echo "<div class='alert alert-danger'>" . ' حصل خطأ ما ' . "</div>";
        }
    }

    if($do == 'Manage'){
        
        
        $stmt = $con->prepare("SELECT orders.*, products.product_name
                                FROM orders 
                                INNER JOIN products
                                ON products.product_id = orders.product_id ORDER BY create_at DESC");
        $stmt->execute();
        $orders = $stmt->fetchAll(); ?>
        
        <div class="card p-4">
            <h2 class="text-center mb-4"> الطلبات </h2>
            <div class="table-responsive">
                <table class="table table-info table-striped table-hover shadow">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">الزبون</th>
                            <th scope="col">الهاتف</th>
                            <th scope="col">الولاية</th>
                            <th scope="col">العنوان</th>
                            <th scope="col">الكمية</th>
                            <th scope="col">الحالة</th>
                            <th scope="col">المنتج</th>
                            <th scope="col">تاريخ الطلب</th>
                            <th scope="col">حذف</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        foreach($orders as $order) { ?>
                            <tr>
                            <th scope="row"><?=$order['order_id']?></th>
                            <td><?=$order['customer']?></td>
                            <td><?=$order['phone']?></td>
                            <td><?=$order['location']?></td>
                            <td><?=$order['address']?></td>
                            <td><?=$order['order_qty']?></td>
                            <td>
                                <select class="form-select
                                
                                <?php if($order['order_status'] == "انتظار") {echo "bg-wait";} 
                                else if($order['order_status'] == "اتصال 1" || $order['order_status'] == "اتصال 2" || $order['order_status'] == "اتصال 3") {echo "bg-warning";}
                                else if($order['order_status'] == "مغلق 1" || $order['order_status'] == "مغلق 2" || $order['order_status'] == "مغلق 3") {echo "bg-secondary";}
                                else if($order['order_status'] == "مكتمل") {echo "bg-info";}
                                else if($order['order_status'] == "مؤكد") {echo "bg-success";}
                                else if($order['order_status'] == "ملغى") {echo "bg-gray";}
                                else if($order['order_status'] == "قيد التنفيذ") {echo "bg-aqua";}
                                ?>
                                " name="order_status" onchange="update(this.options[this.selectedIndex].value, <?=$order['order_id']?>)">
                                    <option value="انتظار" <?php if($order['order_status'] == "انتظار") {echo "selected";} ?>>انتظار</option>
                                    <option value="اتصال 1" <?php if($order['order_status'] == "اتصال 1") {echo "selected";} ?>>اتصال 1</option>
                                    <option value="اتصال 2" <?php if($order['order_status'] == "اتصال 2") {echo "selected";} ?>>اتصال 2</option>
                                    <option value="اتصال 3" <?php if($order['order_status'] == "اتصال 3") {echo "selected";} ?>>اتصال 3</option>
                                    <option value="مغلق 1" <?php if($order['order_status'] == "مغلق 1") {echo "selected";} ?>>مغلق 1</option>
                                    <option value="مغلق 2" <?php if($order['order_status'] == "مغلق 2") {echo "selected";} ?>>مغلق 2</option>
                                    <option value="مغلق 3" <?php if($order['order_status'] == "مغلق 3") {echo "selected";} ?>>مغلق 3</option>
                                    <option value="مؤكد" <?php if($order['order_status'] == "مؤكد") {echo "selected";} ?>>مؤكد</option>
                                    <option value="قيد التنفيذ" <?php if($order['order_status'] == "قيد التنفيذ") {echo "selected";} ?>>قيد التنفيذ</option>
                                    <option value="مكتمل" <?php if($order['order_status'] == "مكتمل") {echo "selected";} ?>>مكتمل</option>
                                    <option value="ملغى" <?php if($order['order_status'] == "ملغى") {echo "selected";} ?>>ملغى</option>
                                </select>
                            </td>
                            <td><?=$order['product_name']?></td>
                            <td><?=$order['create_at']?></td>
                            <td>
                                <a href="orders.php?do=Delete&order_id=<?=$order['order_id']?>" onclick="return confirm('<?php echo 'أنت متأكد من حذف المنتج؟'; ?>')" class="text-danger link mx-2"><i style="font-size: 25px;" class="bi bi-trash"></i></a>
                            </td>
                        </tr>

                            <!-- Modal -->
                            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="staticBackdropLabel">حالة الطلب</h5>
                                            <button type="button" class="btn-close me-auto" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إغلاق</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <script>
                                function update(value, id) {
                                    let url = "http://localhost/watchs/admin/orders.php";
                                    window.location.href = url + "?order_id=" + id + "&order_status=" + value;
                                }
                            </script>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div> 


    <?php }elseif($do == 'Add'){
    }elseif($do == 'Insert'){
    }elseif($do == 'Edit'){
    }elseif($do == 'Update'){
    }elseif($do == 'Delete'){

        echo '<div class="container">';

        $order_id = isset($_GET['order_id']) && is_numeric($_GET['order_id']) ? intval($_GET['order_id']) : 0;
        $check = checkItem('order_id', 'orders', $order_id);
        if($check > 0){

            $stmt = $con->prepare("DELETE FROM orders WHERE order_id = :zorder_id");
            $stmt->bindParam(":zorder_id", $order_id);
            $stmt->execute();
            $theMsg = "<div class='alert alert-success'>" . 'تم حذف الطلب بنجاح' . "</div>";
            redirectPage($theMsg, 'back');

        } else {
            echo "<div class='alert alert-danger'>" . 'هذا الطلب غير موجود' . "</div>";
        }
        echo '</div>';

    }elseif($do == 'Approve'){}
    include $tpl . 'footer.php';
}else {
        header('Location: index.php');
        exit();
}
ob_end_flush();
?>



