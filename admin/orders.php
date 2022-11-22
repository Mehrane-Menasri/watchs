<?php

/*
=====================
=== TEMPLATE PAGE ===
=====================
*/
ob_start();
session_start();
$pageTitle = 'RESERVATIONS';


if (isset($_SESSION['user_name'])) {
    include 'init.php';
    $do = isset($_GET['do']) ? $_GET['do'] : 'Manage';

    // updating order status
    if (isset($_GET['id']) && isset($_GET['res_status'])) {
        $id = isset($_GET['id']) && is_numeric($_GET['id']) ? intval($_GET['id']) : 0;
        $res_status = $_GET['res_status'];
        $check = checkItem('id', 'orders', $id);
        if ($check > 0) {
            $stmt = $con->prepare("UPDATE orders SET res_status = '$res_status' WHERE id = ?");
            $stmt->execute(array($id));
            $theMsg = "<div class='alert alert-success'>" . ' Order completed ' . "</div>";
            // redirectPage($theMsg, 'back');
            header('Location: orders.php');
        } else {
            echo "<div class='alert alert-danger'>" . ' Someting Wrong ' . "</div>";
        }
    }

    if ($do == 'Manage') {

        $stmt = $con->prepare("SELECT * FROM orders ORDER BY create_at DESC");
        $stmt->execute();
        $orders = $stmt->fetchAll(); ?>

        <div class="card p-4" style="min-height: 450px;">
            <h2 class="text-center mb-4"> RESERVATIONS </h2>
            <div class="table-responsive">
                <table class="table table-secondary table-striped table-bordered table-hover shadow">
                    <thead>
                        <tr>
                            <th class="bg-secondary text-white" scope="col">#</th>
                            <th class="bg-secondary text-white" scope="col">Client Name</th>
                            <th class="bg-secondary text-white" scope="col">Email</th>
                            <th class="bg-secondary text-white" scope="col">Phone</th>
                            <!-- <th class="bg-secondary text-white" scope="col">City</th> -->
                            <th class="bg-secondary text-white" scope="col">Staff Member</th>
                            <th class="bg-secondary text-white" scope="col">Status</th>
                            <th class="bg-secondary text-white" scope="col">Hairstyle</th>
                            <th class="bg-secondary text-white" scope="col">Date & Time</th>
                            <th class="bg-secondary text-white" scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($orders as $order) { ?>
                            <tr>
                                <th scope="row"><?= $order['id'] ?></th>
                                <td><?= $order['client'] ?></td>
                                <td><?= $order['email'] ?></td>
                                <td><?= $order['phone'] ?></td>
                                <!-- <td><?= $order['location'] ?></td> -->
                                <td><?= $order['address'] ?></td>
                                <td>
                                    <select class="form-select
                                
                                <?php if ($order['res_status'] == "pending") {
                                    echo "bg-warning";
                                } else if ($order['res_status'] == "completed") {
                                    echo "bg-success";
                                } else if ($order['res_status'] == "canceled") {
                                    echo "bg-gray";
                                }
                                ?>
                                " name="res_status" onchange="update(this.options[this.selectedIndex].value, <?= $order['id'] ?>)">
                                        <option value="pending" <?php if ($order['res_status'] == "pending") {
                                                                    echo "selected";
                                                                } ?>>Pending</option>
                                        <option value="completed" <?php if ($order['res_status'] == "completed") {
                                                                        echo "selected";
                                                                    } ?>>Completed</option>
                                        <option value="canceled" <?php if ($order['res_status'] == "canceled") {
                                                                        echo "selected";
                                                                    } ?>>Canceled</option>
                                    </select>
                                </td>
                                <td><?= $order['hairstyle'] ?></td>
                                <td><?= $order['res_date'] ?> <?= date('h:i A', strtotime($order['res_time'])) ?></td>
                                <td>
                                    <a href="orders.php?do=Delete&id=<?= $order['id'] ?>" onclick="return confirm('<?php echo 'You Are Sure?'; ?>')" class="text-danger link mx-2"><i style="font-size: 25px;" class="bi bi-trash"></i></a>
                                </td>
                            </tr>

                            <!-- Modal -->
                            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="staticBackdropLabel"> Reservation Status</h5>
                                            <button type="button" class="btn-close me-auto" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <script>
                                function update(value, id) {
                                    let url = "http://localhost/barbershop/admin/orders.php";
                                    window.location.href = url + "?id=" + id + "&res_status=" + value;
                                }
                            </script>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>


<?php } elseif ($do == 'Add') {
    } elseif ($do == 'Insert') {
    } elseif ($do == 'Edit') {
    } elseif ($do == 'Update') {
    } elseif ($do == 'Delete') {

        echo '<div class="container">';

        $id = isset($_GET['id']) && is_numeric($_GET['id']) ? intval($_GET['id']) : 0;
        $check = checkItem('id', 'orders', $id);
        if ($check > 0) {

            $stmt = $con->prepare("DELETE FROM orders WHERE id = :zid");
            $stmt->bindParam(":zid", $id);
            $stmt->execute();
            $theMsg = "<div class='alert alert-success'>" . ' Deleted Successfully' . "</div>";
            redirectPage($theMsg, 'back');
        } else {
            echo "<div class='alert alert-danger'>" . 'This Reservation Not Exist' . "</div>";
        }
        echo '</div>';
    } elseif ($do == 'Approve') {
    }
    include $tpl . 'footer.php';
} else {
    header('Location: index.php');
    exit();
}
ob_end_flush();
?>