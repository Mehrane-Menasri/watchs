<?php include "init.php";
$product_id = $_GET['product_id'];
$stmt = $con->prepare("SELECT * FROM products WHERE product_id = $product_id");
$stmt->execute();
$product = $stmt->fetch();

?>
<main class="l-main">

    <!--========== PRODUCT DETAILS ==========-->
    <section class="menu section bd-container" id="menu">
        <!-- <span class="section-subtitle">تفاصيل المنتج</span>
        <h2 class="section-title"><?php // echo $product['product_name'] 
                                    ?></h2> -->

        <div class="product__container">

            <div class="menu__content1">
                <?php if ($product['discount_percentage'] > 0) { ?>
                    <span dir="ltr" class="discount_percentage">-<?php echo $product['discount_percentage']; ?>%</span>
                <?php } ?>
                <img src="admin/uploads/images/<?php echo $product['product_image'] ?>" alt="" class="product__img">
                <h3 class="menu__name"><?php echo $product['product_name'] ?></h3>
                <span class="product_discount"><?php if ($product['product_discount'] > 0) {
                                                                                        echo $product['product_discount'] . 'دج <del class="product_price">' . $product['product_price'] . ' دج </del>';
                                                                                    } else {
                                                                                        echo $product['product_price'] . 'دج';
                                                                                    } ?></span>
                <div style="display: flex;">
                    <?php for ($i = 0; $i < $product['rating']; $i++) {
                        echo '<i class="bi bi-star" style="padding-left:5px;"></i>';
                    }   ?> </span>
                </div>
            </div>

            <div class="menu__content1">
                <form action="thank.php?product_id=<?php echo $product['product_id'] ?>" method="POST">
                    <input type="hidden" name="product_id">
                    <input type="text" name="customer" placeholder="الإسم" required>
                    <input type="text" name="phone" placeholder="رقم الهاتف" required>
                    <select name="location" required>
                        <option value="">اختر الموقع</option>
                        <option value="أدرار">أدرار</option>
                        <option value="الشلف">الشلف</option>
                        <option value="الأغواط">الأغواط</option>
                        <option value="أم البواقي">ام البواقي</option>
                        <option value="باتنة">باتنة</option>
                        <option value="بجاية">بجاية</option>
                        <option value="بسكرة">بسكرة</option>
                        <option value="بشار">بشار</option>
                        <option value="بليدة">بليدة</option>
                        <option value="بويرة">بويرة</option>
                        <option value="تمنراست">تمنراست</option>
                        <option value="تبسة">تبسة</option>
                        <option value="تلمسان">تلمسان</option>
                        <option value="تيارت">تيارت</option>
                        <option value="تيزي وزو">تيزي وزو</option>
                        <option value="الجزائر">الجزائر</option>
                        <option value="الجلفة">الجلفة</option>
                        <option value="جيجل">جيجل</option>
                        <option value="سطيف">سطيف</option>
                        <option value="سعيدة">سعيدة</option>
                        <option value="سكيكدة">سكيكدة</option>
                        <option value="سيدي بلعباس">سيدي بلعباس</option>
                        <option value="عنابة">عنابة</option>
                        <option value="قسنطينة">قسنطينة</option>
                        <option value="المدية">المدية</option>
                        <option value="مستغانم">مستغانم</option>
                        <option value="مسيلة">مسيلة</option>
                        <option value="معسكر">معسكر</option>
                        <option value="ورقلة">ورقلة</option>
                        <option value="وهران">وهران</option>
                        <option value="البيض">البيض</option>
                        <!-- <option value="اليزي">اليزي</option> -->
                        <option value="برج بوعريريج">برج بوعريريج</option>
                        <option value="بومرداس">بومرداس</option>
                        <option value="الطارف">الطارف</option>
                        <option value="تندوف">تندوف</option>
                        <option value="تيسميلت">تيسميلت</option>
                        <option value="الوادي">الوادي</option>
                        <option value="خنشلة">خنشلة</option>
                        <option value="سوق أهراس">سوق أهراس</option>
                        <option value="تيبازة">تيبازة</option>
                        <option value="ميلة">ميلة</option>
                        <option value="عين الدفلى">عين الدفلى</option>
                        <option value="النعامة">النعامة</option>
                        <option value="عين تموشنت">عين تموشنت</option>
                        <option value="غرداية">غرداية</option>
                        <option value="غليزان">غليزان</option>
                        <option value="تيميمون">تيميمون</option>
                        <option value="برج باجي مختار">برج باجي مختار</option>
                        <option value="أولاد جلال">أولاد جلال</option>
                        <option value="بني عباس">بني عباس</option>
                        <option value="عين صالح">عين صالح</option>
                        <option value="عين قزام">عين قزام</option>
                        <option value="توقرت">توقرت</option>
                        <!-- <option value="جانت">جانت</option> -->
                        <option value="المغير">المغير</option>
                        <option value="المنيعة">المنيعة</option>
                    </select>
                    <input type="text" name="address" placeholder="العنوان" required>
                    <div class="">
                        <span style="cursor: pointer;" class="increment-btn"><i class="bi bi-plus-lg"></i></span>
                        <input type="text" name="order_qty" style="width: 60px; text-align:center" class="input-qty" value="1">
                        <span style="cursor: pointer;" class="decrement-btn"><i class="bi bi-dash-lg"></i></span>
                    </div>
                    <div id="button-fixed" style="display: flex;">
                        <a href="tel:213550635123" style="  width: 100%;background-color: var(--body-color); margin-bottom: 10px; border: 1px solid var(--title-color); outline: none; padding: 10px; color: var(--title-color); width: 50px; text-align: center; margin-left:3px; border-radius:5px; font-size: 18px; cursor:pointer"><i class="bi bi-telephone"></i></a>
                        <a href="https://api.whatsapp.com/send?phone=213550635123" style="  width: 100%;background-color: var(--body-color); margin-bottom: 10px; border: 1px solid var(--title-color); outline: none; padding: 10px; color: var(--title-color); width: 50px; text-align: center; margin-left:3px; border-radius:5px; font-size: 18px; cursor:pointer"><i class="bi bi-whatsapp"></i></a>
                        <input type="submit" class="button animated-btn" value="أرسل الطلب">
                    </div>
                </form>
                <hr style="width: 100%;">
                <div class="">
                    <div class="" style="display:flex; align-items:center">
                        <h5 style="width:200%"><?php echo $product['product_name'] ?></h5>
                        <div style="display:flex; align-items:center">
                            <input style="background:none; color:gray; font-size:large; outline:none; border:none" disabled class="product_price" value="<?php if ($product['product_discount'] > 0) {
                                                                                                                                                                echo $product['product_discount'];
                                                                                                                                                            } else {
                                                                                                                                                                echo $product['product_price'];
                                                                                                                                                            } ?>">
                            <span>X</span>
                            <input style="background:none; color:gray; font-size:large; outline:none; border:none" disabled class="input-qty" value="1">
                        </div>
                    </div>
                    <div class="" style="display:flex; align-items:center; justify-content: space-between; width: 100%">
                        <h5>الشحن</h5>
                        <input style="background:none; margin-right: 50%; color:gray; font-size:large; outline:none; border:none" disabled type="text" class="delevry" placeholder="اختر الولاية">
                    </div>
                    <div class="" style="display:flex; align-items:center; justify-content: space-between; width: 100%">
                        <h5>الإجمالي</h5>
                        <input style="background:none; margin-right: 50%; color:gray; font-size:large; outline:none; border:none" disabled class="total" value="<?php if ($product['product_discount'] > 0) {
                                                                                                                                                                    echo $product['product_discount'];
                                                                                                                                                                } else {
                                                                                                                                                                    echo $product['product_price'];
                                                                                                                                                                } ?>">
                    </div>

                </div>
                <?php
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
                        if ($stmt) {
                            // echo '<div class="alert alert-success">' . 'تم إرسال الطلب بنجاح' . '</div>';
                            header("Location: thank.php");
                        }
                    }
                }
                ?>
            </div>
            <div style="padding: 5px 15px;  width:100%; border: 1px solid #aaa"><?= $product['product_desc'] ?></div>
            <div class="">
                <img src="admin/uploads/images/<?php echo $product['product_gallery1'] ?>" alt="" style="text-align:center">
                <img src="admin/uploads/images/<?php echo $product['product_gallery2'] ?>" alt="" style="text-align:center">
                <img src="admin/uploads/images/<?php echo $product['product_gallery3'] ?>" alt="" style="text-align:center">
                <img src="admin/uploads/images/<?php echo $product['product_gallery4'] ?>" alt="" style="text-align:center">
                <img src="admin/uploads/images/<?php echo $product['product_gallery5'] ?>" alt="" style="text-align:center">
                <img src="admin/uploads/images/<?php echo $product['product_gallery6'] ?>" alt="" style="text-align:center">
                <img src="admin/uploads/images/<?php echo $product['product_gallery7'] ?>" alt="" style="text-align:center">
                <img src="admin/uploads/images/<?php echo $product['product_gallery8'] ?>" alt="" style="text-align:center">
                <img src="admin/uploads/images/<?php echo $product['product_gallery9'] ?>" alt="" style="text-align:center">
                <img src="admin/uploads/images/<?php echo $product['product_gallery10'] ?>" alt="" style="text-align:center">
                <img src="admin/uploads/images/<?php echo $product['product_gallery11'] ?>" alt="" style="text-align:center">
                <img src="admin/uploads/images/<?php echo $product['product_gallery12'] ?>" alt="" style="text-align:center">
            </div>

        </div>
    </section>

</main>

<?php include $tpl . "footer.php"; ?>