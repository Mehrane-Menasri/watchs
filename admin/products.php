<?php

/*
=====================
=== PRODUCTS PAGE ===
=====================
*/
ob_start();
session_start();
$pageTitle = 'المنتجات';
if (isset($_SESSION['user_name'])) {
    include 'init.php';
    $do = isset($_GET['do']) ? $_GET['do'] : 'Manage';
    if ($do == 'Manage') {

        $stmt = $con->prepare("SELECT * FROM products ORDER BY created_at DESC");
        $stmt->execute();
        $products = $stmt->fetchAll(); ?>

        <div class="card p-4">
            <h2 class="text-center mb-4"> المنتجات</h2>
            <a href="products.php?do=Add" class="btn btn-info my-3">إضافة منتج جديد</a>
            <div class="table-responsive">
                <table class="table table-info table-striped table-hover shadow">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">إسم المنتج</th>
                            <th scope="col">صورة المنتج</th>
                            <th scope="col">سعر المنتج</th>
                            <th scope="col">سعر التخفيض</th>
                            <th scope="col">التقييم</th>
                            <th scope="col">تاريخ الإضافة</th>
                            <th scope="col">تعديل / حذف</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($products as $product) { ?>
                            <tr>
                                <th scope="row"><?= $product['product_id'] ?></th>
                                <td><?= $product['product_name'] ?></td>
                                <td><img src="uploads/images/<?php echo $product['product_image'] ?>" width="60" height="60" alt=""></td>
                                <td><?= $product['product_price'] ?></td>
                                <td><?= $product['product_discount'] ?></td>
                                <td>
                                    <div style="display: flex;">
                                        <?php for ($i = 0; $i < $product['rating']; $i++) {
                                            echo '<i class="bi bi-star" style="padding-left:5px;"></i>';
                                        }   ?> </span>
                                    </div>
                                </td>
                                <td><?= $product['created_at'] ?></td>
                                <td>
                                    <a href="products.php?do=Delete&product_id=<?= $product['product_id'] ?>" onclick="return confirm('<?php echo 'أنت متأكد من حذف المنتج؟'; ?>')" class="text-danger link mx-2"><i class="bi bi-trash"></i></a>
                                    <a href="products.php?do=Edit&product_id=<?= $product['product_id'] ?>" class="text-success link"><i class="bi bi-pen"></i></a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>

    <?php } elseif ($do == 'Add') { ?>
        <div class="container">
            <h1 class="text-center">إضافة منتج جديد</h1>
            <div class="card p-5 shadow">
                <a class="btn btn-info mb-3" href="products.php"><i class="bi bi-backspace-reverse"></i> عودة</a>
                <form action="?do=Insert" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">اسم المنتج</label>
                                <input type="text" placeholder="إسم المنتج" class="form-control" name="product_name" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">التقييم</label>
                                <select placeholder="التقييم" name="rating" class="form-select" aria-label="Default select example">
                                    <option selected>حدد تقييم المنتج</option>
                                    <option value="1">*</option>
                                    <option value="2">**</option>
                                    <option value="3">***</option>
                                    <option value="4">****</option>
                                    <option value="5">*****</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">سعر المنتج</label>
                                <input type="number" placeholder="سعر المنتج" class="form-control" name="product_price" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">سعر التخفيض</label>
                                <input type="number" placeholder="سعر التخفيض" class="form-control" name="product_discount">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">نسبة التخفيض</label>
                                <input type="number" placeholder="نسبة التخفيض" class="form-control" name="discount_percentage">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">صورة المنتج</label>
                                <input type="file" placeholder="صورة المنتج" class="form-control" name="product_image" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">الصورة 01 </label>
                                <input type="file" placeholder="الصورة 01 " class="form-control" name="product_gallery1">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">الصورة 02 </label>
                                <input type="file" placeholder="الصورة 02 " class="form-control" name="product_gallery2">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">الصورة 03 </label>
                                <input type="file" placeholder="الصورة 03 " class="form-control" name="product_gallery3">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">الصورة 04 </label>
                                <input type="file" placeholder="الصورة 04 " class="form-control" name="product_gallery4">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">الصورة 05 </label>
                                <input type="file" placeholder="الصورة 05 " class="form-control" name="product_gallery5">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">الصورة 06 </label>
                                <input type="file" placeholder="الصورة 06 " class="form-control" name="product_gallery6">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">الصورة 07 </label>
                                <input type="file" placeholder="الصورة 07 " class="form-control" name="product_gallery7">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">الصورة 08 </label>
                                <input type="file" placeholder="الصورة 08 " class="form-control" name="product_gallery8">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">الصورة 09 </label>
                                <input type="file" placeholder="الصورة 09 " class="form-control" name="product_gallery9">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">الصورة 10 </label>
                                <input type="file" placeholder="الصورة 10 " class="form-control" name="product_gallery10">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">الصورة 11 </label>
                                <input type="file" placeholder="الصورة 11 " class="form-control" name="product_gallery11">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">الصورة 12 </label>
                                <input type="file" placeholder="الصورة 12 " class="form-control" name="product_gallery12">
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">وصف المنتج</label>
                        <textarea id="editor" class="form-control" name="product_desc" rows="3" placeholder="وصف المنتج"></textarea>
                    </div>
                    <input type="submit" class="btn btn-info" value="إضافة">
                </form>
            </div>
        </div>
        <script>
            // var editor = CKEDITOR.replace('ckfinder');
            // CKFinder.setupCKEditor(editor);
            ClassicEditor
                .create(document.querySelector('#editor'))
                .then(editor => {
                    console.log(editor);
                })
                .catch(error => {
                    console.error(error);
                });
        </script>
        <?php } elseif ($do == 'Insert') {

        // =====================================================
        // ========== HOW TO UPLOAD IMAGE TO DATABASE ==========
        // =====================================================

        $imageName = $_FILES['product_image']['name'];
        $imageSize = $_FILES['product_image']['size'];
        $imageTmp  = $_FILES['product_image']['tmp_name'];
        $imageType = $_FILES['product_image']['type'];

        $imageAllowedExtensions = array("jpeg", "jpg", "png", "gif");

        $img = explode('.', $imageName);
        $imageExtensions = strtolower(end($img));

        $galleryName1 = $_FILES['product_gallery1']['name'];
        $gallerySize1 = $_FILES['product_gallery1']['size'];
        $galleryTmp1  = $_FILES['product_gallery1']['tmp_name'];
        $galleryType1 = $_FILES['product_gallery1']['type'];
        $img1 = explode('.', $galleryName1);
        $imageExtensions = strtolower(end($img1));

        $galleryName2 = $_FILES['product_gallery2']['name'];
        $gallerySize2 = $_FILES['product_gallery2']['size'];
        $galleryTmp2  = $_FILES['product_gallery2']['tmp_name'];
        $galleryType2 = $_FILES['product_gallery2']['type'];
        $img2 = explode('.', $galleryName2);
        $imageExtensions = strtolower(end($img2));

        $galleryName3 = $_FILES['product_gallery3']['name'];
        $gallerySize3 = $_FILES['product_gallery3']['size'];
        $galleryTmp3  = $_FILES['product_gallery3']['tmp_name'];
        $galleryType3 = $_FILES['product_gallery3']['type'];
        $img3 = explode('.', $galleryName3);
        $imageExtensions = strtolower(end($img3));

        $galleryName4 = $_FILES['product_gallery4']['name'];
        $gallerySize4 = $_FILES['product_gallery4']['size'];
        $galleryTmp4  = $_FILES['product_gallery4']['tmp_name'];
        $galleryType4 = $_FILES['product_gallery4']['type'];
        $img4 = explode('.', $galleryName4);
        $imageExtensions = strtolower(end($img4));

        $galleryName5 = $_FILES['product_gallery5']['name'];
        $gallerySize5 = $_FILES['product_gallery5']['size'];
        $galleryTmp5  = $_FILES['product_gallery5']['tmp_name'];
        $galleryType5 = $_FILES['product_gallery5']['type'];
        $img5 = explode('.', $galleryName5);
        $imageExtensions = strtolower(end($img5));

        $galleryName6 = $_FILES['product_gallery6']['name'];
        $gallerySize6 = $_FILES['product_gallery6']['size'];
        $galleryTmp6  = $_FILES['product_gallery6']['tmp_name'];
        $galleryType6 = $_FILES['product_gallery6']['type'];
        $img6 = explode('.', $galleryName6);
        $imageExtensions = strtolower(end($img6));

        $galleryName7 = $_FILES['product_gallery7']['name'];
        $gallerySize7 = $_FILES['product_gallery7']['size'];
        $galleryTmp7  = $_FILES['product_gallery7']['tmp_name'];
        $galleryType7 = $_FILES['product_gallery7']['type'];
        $img7 = explode('.', $galleryName7);
        $imageExtensions = strtolower(end($img7));

        $galleryName8 = $_FILES['product_gallery8']['name'];
        $gallerySize8 = $_FILES['product_gallery8']['size'];
        $galleryTmp8  = $_FILES['product_gallery8']['tmp_name'];
        $galleryType8 = $_FILES['product_gallery8']['type'];
        $img8 = explode('.', $galleryName8);
        $imageExtensions = strtolower(end($img8));

        $galleryName9 = $_FILES['product_gallery9']['name'];
        $gallerySize9 = $_FILES['product_gallery9']['size'];
        $galleryTmp9  = $_FILES['product_gallery9']['tmp_name'];
        $galleryType9 = $_FILES['product_gallery9']['type'];
        $img9 = explode('.', $galleryName9);
        $imageExtensions = strtolower(end($img9));

        $galleryName10 = $_FILES['product_gallery10']['name'];
        $gallerySize10 = $_FILES['product_gallery10']['size'];
        $galleryTmp10  = $_FILES['product_gallery10']['tmp_name'];
        $galleryType10 = $_FILES['product_gallery10']['type'];
        $img10 = explode('.', $galleryName10);
        $imageExtensions = strtolower(end($img10));

        $galleryName11 = $_FILES['product_gallery11']['name'];
        $gallerySize11 = $_FILES['product_gallery11']['size'];
        $galleryTmp11  = $_FILES['product_gallery11']['tmp_name'];
        $galleryType11 = $_FILES['product_gallery11']['type'];
        $img11 = explode('.', $galleryName11);
        $imageExtensions = strtolower(end($img11));

        $galleryName12 = $_FILES['product_gallery12']['name'];
        $gallerySize12 = $_FILES['product_gallery12']['size'];
        $galleryTmp12  = $_FILES['product_gallery12']['tmp_name'];
        $galleryType12 = $_FILES['product_gallery12']['type'];
        $img12 = explode('.', $galleryName12);
        $imageExtensions = strtolower(end($img12));

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            // =====================================================
            // ========= HOW TO UPLOAD GALLERY TO DATABASE =========
            // =====================================================


            // =====================================================

            echo "<h2 class='text-center text-primary'></h2>";
            echo "<div class='container'>";
            $product_name        = $_POST['product_name'];
            $product_desc        = $_POST['product_desc'];
            $product_price       = $_POST['product_price'];
            $product_discount    = $_POST['product_discount'];
            $discount_percentage = $_POST['discount_percentage'];
            $rating              = $_POST['rating'];

            //validate the form
            $formErrors = array();
            if (empty($product_name)) {
                $formErrors[] = 'إدخال إسم المنتج إجباري';
            }
            if (empty($product_desc)) {
                $formErrors[] = 'إدخال وصف المنتج إجباري';
            }
            if (empty($product_price)) {
                $formErrors[] = 'إدخال سعر المنتج إجباري';
            }

            if (empty($imageName)) {
                $formErrors[] = 'إضافة الصورة <strong>إجباري</strong> ';
            }
            if ($imageSize > 4194304) {
                $formErrors[] = 'أقصى حجم للصورة  <strong>4 ميجا</strong> ';
            }

            foreach ($formErrors as $error) {
                echo "<div class='alert alert-danger'>" . $error . "</div>";
            }

            if (empty($formErrors)) {

                $image = rand(0, 100000) . '_' . $imageName;
                move_uploaded_file($imageTmp, "uploads\images\\" . $image);

                $product_gallery1 = rand(0, 100000) . '_' . $galleryName1;
                move_uploaded_file($galleryTmp1, "uploads\images\\" . $product_gallery1);

                $product_gallery2 = rand(0, 100000) . '_' . $galleryName2;
                move_uploaded_file($galleryTmp2, "uploads\images\\" . $product_gallery2);

                $product_gallery3 = rand(0, 100000) . '_' . $galleryName3;
                move_uploaded_file($galleryTmp3, "uploads\images\\" . $product_gallery3);

                $product_gallery4 = rand(0, 100000) . '_' . $galleryName4;
                move_uploaded_file($galleryTmp4, "uploads\images\\" . $product_gallery4);

                $product_gallery5 = rand(0, 100000) . '_' . $galleryName5;
                move_uploaded_file($galleryTmp5, "uploads\images\\" . $product_gallery5);

                $product_gallery6 = rand(0, 100000) . '_' . $galleryName6;
                move_uploaded_file($galleryTmp6, "uploads\images\\" . $product_gallery6);

                $product_gallery7 = rand(0, 100000) . '_' . $galleryName7;
                move_uploaded_file($galleryTmp7, "uploads\images\\" . $product_gallery7);

                $product_gallery8 = rand(0, 100000) . '_' . $galleryName8;
                move_uploaded_file($galleryTmp8, "uploads\images\\" . $product_gallery8);

                $product_gallery9 = rand(0, 100000) . '_' . $galleryName9;
                move_uploaded_file($galleryTmp9, "uploads\images\\" . $product_gallery9);

                $product_gallery10 = rand(0, 100000) . '_' . $galleryName10;
                move_uploaded_file($galleryTmp10, "uploads\images\\" . $product_gallery10);

                $product_gallery11 = rand(0, 100000) . '_' . $galleryName11;
                move_uploaded_file($galleryTmp11, "uploads\images\\" . $product_gallery11);

                $product_gallery12 = rand(0, 100000) . '_' . $galleryName12;
                move_uploaded_file($galleryTmp12, "uploads\images\\" . $product_gallery12);


                $check = checkItem('product_name', 'products', $product_name);
                if ($check == 1) {
                    $theMsg = "<div class='alert alert-danger'>" . 'المعذرة، سبق استخدام هذا الإسم!' . "</div>";
                    redirectPage($theMsg, 'back');
                } else {

                    $stmt = $con->prepare("INSERT INTO products(product_name, product_discount, discount_percentage, rating, product_gallery1, product_gallery2, product_gallery3, product_gallery4, product_gallery5, product_gallery6, product_gallery7, product_gallery8, product_gallery9, product_gallery10, product_gallery11, product_gallery12, product_desc, product_price, created_at, product_image) 
                                                VALUES(:zproduct_name, :zproduct_discount, :zdiscount_percentage, :zrating, :zproduct_gallery1, :zproduct_gallery2, :zproduct_gallery3, :zproduct_gallery4, :zproduct_gallery5, :zproduct_gallery6, :zproduct_gallery7, :zproduct_gallery8, :zproduct_gallery9, :zproduct_gallery10, :zproduct_gallery11, :zproduct_gallery12, :zproduct_desc, :zproduct_price, now(), :zproduct_image)");
                    $stmt->execute(array(
                        'zproduct_name'         => $product_name,
                        'zproduct_discount'     => $product_discount,
                        'zdiscount_percentage'  => $discount_percentage,
                        'zrating'               => $rating,
                        'zproduct_gallery1'     => $product_gallery1,
                        'zproduct_gallery2'     => $product_gallery2,
                        'zproduct_gallery3'     => $product_gallery3,
                        'zproduct_gallery4'     => $product_gallery4,
                        'zproduct_gallery5'     => $product_gallery5,
                        'zproduct_gallery6'     => $product_gallery6,
                        'zproduct_gallery7'     => $product_gallery7,
                        'zproduct_gallery8'     => $product_gallery8,
                        'zproduct_gallery9'     => $product_gallery9,
                        'zproduct_gallery10'    => $product_gallery10,
                        'zproduct_gallery11'    => $product_gallery11,
                        'zproduct_gallery12'    => $product_gallery12,
                        'zproduct_desc'         => $product_desc,
                        'zproduct_price'        => $product_price,
                        'zproduct_image'        => $image,
                    ));

                    $theMsg = "<div class='alert alert-success'>" . 'تم إضافة المنتج بنجاح' . '</div>';
                    header('Location: products.php');
                }
            }
        } else {

            $errorMsg = $msg8;
            redirectHome($errorMsg, 4);
        }
        echo "</div>";
    } elseif ($do == 'Edit') {

        $product_id = isset($_GET['product_id']) && is_numeric(($_GET['product_id'])) ? intval($_GET['product_id']) : 0;
        $stmt = $con->prepare("SELECT * FROM products WHERE product_id = ? LIMIT 1");
        $stmt->execute(array($product_id));
        $product = $stmt->fetch();
        $count = $stmt->rowCount();

        if ($count > 0) { ?>

            <div class="container">
                <h1 class="text-center">تعديل "<?php echo $product['product_name'] ?>"</h1>
                <div class="card p-5 shadow">
                    <a class="btn btn-info mb-3" href="products.php"><i class="bi bi-backspace-reverse"></i> عودة</a>
                    <form action="?do=Update" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="product_id" value="<?php echo $product['product_id'] ?>">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">اسم المنتج</label>
                                    <input type="text" placeholder="إسم المنتج" class="form-control" name="product_name" value="<?php echo $product['product_name'] ?>" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">التقييم</label>
                                    <select placeholder="التقييم" name="rating" class="form-select" aria-label="Default select example">
                                        <option selected>حدد تقييم المنتج</option>
                                        <option value="1" <?php if ($product['rating'] == 1) echo "selected" ?>>*</option>
                                        <option value="2" <?php if ($product['rating'] == 2) echo "selected" ?>>**</option>
                                        <option value="3" <?php if ($product['rating'] == 3) echo "selected" ?>>***</option>
                                        <option value="4" <?php if ($product['rating'] == 4) echo "selected" ?>>****</option>
                                        <option value="5" <?php if ($product['rating'] == 5) echo "selected" ?>>*****</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">سعر المنتج</label>
                                    <input type="number" placeholder="سعر المنتج" class="form-control" name="product_price" value="<?php echo $product['product_price'] ?>" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">سعر التخفيض</label>
                                    <input type="number" placeholder="سعر التخفيض" class="form-control" name="product_discount" value="<?php echo $product['product_discount'] ?>">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">نسبة التخفيض</label>
                                    <input type="number" placeholder="نسبة التخفيض" class="form-control" name="discount_percentage" value="<?php echo $product['discount_percentage'] ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">صورة المنتج</label>
                                    <input type="file" placeholder="صورة المنتج" class="form-control" name="product_image">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">معرض الصور</label>
                                    <input type="file" placeholder="معرض الصور" class="form-control" name="product_gallery[]" multiple>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">وصف المنتج</label>
                            <textarea class="form-control" name="product_desc" rows="3" placeholder="وصف المنتج"><?php echo $product['product_desc'] ?></textarea>
                        </div>
                        <input type="submit" class="btn btn-info" value="حفظ التغييرات">
                    </form>
                </div>

                <?php $stmt = $con->prepare("SELECT * FROM orders WHERE product_id = ?");
                $stmt->execute(array($product_id));
                $orders = $stmt->fetchAll();
                if (!empty($orders)) { ?>

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
                                        <th scope="col">تاريخ الطلب</th>
                                        <th scope="col">حذف</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($orders as $order) { ?>
                                        <tr>
                                            <th scope="row"><?= $order['order_id'] ?></th>
                                            <td><?= $order['customer'] ?></td>
                                            <td><?= $order['phone'] ?></td>
                                            <td><?= $order['location'] ?></td>
                                            <td><?= $order['address'] ?></td>
                                            <td><?= $order['order_qty'] ?></td>
                                            <td>
                                                <select class="form-select
                                
                                <?php if ($order['order_status'] == "انتظار") {
                                            echo "bg-wait";
                                        } else if ($order['order_status'] == "اتصال 1" || $order['order_status'] == "اتصال 2" || $order['order_status'] == "اتصال 3") {
                                            echo "bg-warning";
                                        } else if ($order['order_status'] == "مغلق 1" || $order['order_status'] == "مغلق 2" || $order['order_status'] == "مغلق 3") {
                                            echo "bg-secondary";
                                        } else if ($order['order_status'] == "مكتمل") {
                                            echo "bg-info";
                                        } else if ($order['order_status'] == "مؤكد") {
                                            echo "bg-success";
                                        } else if ($order['order_status'] == "ملغى") {
                                            echo "bg-gray";
                                        } else if ($order['order_status'] == "قيد التنفيذ") {
                                            echo "bg-aqua";
                                        }
                                ?>
                                " name="order_status" onchange="update(this.options[this.selectedIndex].value, <?= $order['order_id'] ?>)">
                                                    <option value="انتظار" <?php if ($order['order_status'] == "انتظار") {
                                                                                echo "selected";
                                                                            } ?>>انتظار</option>
                                                    <option value="اتصال 1" <?php if ($order['order_status'] == "اتصال 1") {
                                                                                echo "selected";
                                                                            } ?>>اتصال 1</option>
                                                    <option value="اتصال 2" <?php if ($order['order_status'] == "اتصال 2") {
                                                                                echo "selected";
                                                                            } ?>>اتصال 2</option>
                                                    <option value="اتصال 3" <?php if ($order['order_status'] == "اتصال 3") {
                                                                                echo "selected";
                                                                            } ?>>اتصال 3</option>
                                                    <option value="مغلق 1" <?php if ($order['order_status'] == "مغلق 1") {
                                                                                echo "selected";
                                                                            } ?>>مغلق 1</option>
                                                    <option value="مغلق 2" <?php if ($order['order_status'] == "مغلق 2") {
                                                                                echo "selected";
                                                                            } ?>>مغلق 2</option>
                                                    <option value="مغلق 3" <?php if ($order['order_status'] == "مغلق 3") {
                                                                                echo "selected";
                                                                            } ?>>مغلق 3</option>
                                                    <option value="مؤكد" <?php if ($order['order_status'] == "مؤكد") {
                                                                                echo "selected";
                                                                            } ?>>مؤكد</option>
                                                    <option value="قيد التنفيذ" <?php if ($order['order_status'] == "قيد التنفيذ") {
                                                                                    echo "selected";
                                                                                } ?>>قيد التنفيذ</option>
                                                    <option value="مكتمل" <?php if ($order['order_status'] == "مكتمل") {
                                                                                echo "selected";
                                                                            } ?>>مكتمل</option>
                                                    <option value="ملغى" <?php if ($order['order_status'] == "ملغى") {
                                                                                echo "selected";
                                                                            } ?>>ملغى</option>
                                                </select>
                                            </td>
                                            <td><?= $order['create_at'] ?></td>
                                            <td>
                                                <a href="orders.php?do=Delete&order_id=<?= $order['order_id'] ?>" onclick="return confirm('<?php echo 'أنت متأكد من حذف المنتج؟'; ?>')" class="text-danger link mx-2"><i style="font-size: 25px;" class="bi bi-trash"></i></a>
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

                <?php } else {
                    echo '<i style="font-size: 200px;" class="bi bi-dropbox mx-auto"></i>';
                } ?>

            </div>
<?php
        } else {
            echo "<div class='container'>";
            echo "<div class='alert alert-danger mt-5'>" . "هذا المنتج غير موجود" . "</div>" . "</div>";
        }
    } elseif ($do == 'Update') {

        echo "<div class='container'>";
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            // =====================================================
            // ========== HOW TO UPLOAD IMAGE TO DATABASE ==========
            // =====================================================

            $imageName = $_FILES['product_image']['name'];
            $imageSize = $_FILES['product_image']['size'];
            $imageTmp  = $_FILES['product_image']['tmp_name'];
            $imageType = $_FILES['product_image']['type'];

            $imageAllowedExtensions = array("jpeg", "jpg", "png", "gif");

            $img = explode('.', $imageName);
            $imageExtensions = strtolower(end($img));

            // =====================================================
            // ========= HOW TO UPLOAD GALLERY TO DATABASE =========
            // =====================================================
            $galleryCount = count($_FILES['product_gallery']['name']);
            for ($i = 0; $i < $galleryCount; $i++) {
                $galleryName = $_FILES['product_gallery']['name'][$i];
                $galleryTmp  = $_FILES['product_gallery']['tmp_name'][$i];
                $galleryPath = "uploads\images\\" . $galleryName;
            }
            // =====================================================

            $product_id          = $_POST['product_id'];
            $product_name        = $_POST['product_name'];
            $product_desc        = $_POST['product_desc'];
            $product_price       = $_POST['product_price'];
            $product_discount    = $_POST['product_discount'];
            $discount_percentage = $_POST['discount_percentage'];
            $rating              = $_POST['rating'];

            //validate the form
            $formErrors = array();
            if (empty($product_name)) {
                $formErrors[] = 'إدخال إسم المنتج إجباري';
            }
            if (empty($product_desc)) {
                $formErrors[] = 'إدخال وصف المنتج إجباري';
            }
            if (empty($product_price)) {
                $formErrors[] = 'إدخال سعر المنتج إجباري';
            }
            if (!empty($imageName) && !in_array($imageExtensions, $imageAllowedExtensions)) {
                $formErrors[] = 'معذرة، غير مسموح إضافة صور بهذا  <strong>الإمتداد</strong> ';
            }
            if (empty($imageName)) {
                $formErrors[] = 'إضافة الصورة <strong>إجباري</strong> ';
            }
            if ($imageSize > 4194304) {
                $formErrors[] = 'أقصى حجم للصورة  <strong>4 ميجا</strong> ';
            }

            foreach ($formErrors as $error) {
                echo "<div class='alert alert-danger'>" . $error . "</div>";
            }

            if (empty($formErrors)) {

                $image = rand(0, 100000) . '_' . $imageName;
                move_uploaded_file($imageTmp, "uploads\images\\" . $image);

                // update the database with this info
                $stmt = $con->prepare("UPDATE products SET product_discount = ?, discount_percentage = ?, product_name = ?, product_desc = ?, product_price = ?, rating = ?, product_gallery1 = ?, product_image = ? WHERE product_id = ?");
                $stmt->execute(array($product_discount, $discount_percentage, $product_name, $product_desc, $product_price, $rating, $galleryName, $image, $product_id));
                $theMsg = "<div class='alert alert-success'>" . 'تم تحديث المنتج بنجاح' . '</div>';
                header('Location: products.php');
            }
        }
    } elseif ($do == 'Delete') {

        echo '<div class="container">';

        $product_id = isset($_GET['product_id']) && is_numeric($_GET['product_id']) ? intval($_GET['product_id']) : 0;
        $check = checkItem('product_id', 'products', $product_id);
        if ($check > 0) {

            $stmt = $con->prepare("DELETE FROM products WHERE product_id = :zproduct_id");
            $stmt->bindParam(":zproduct_id", $product_id);
            $stmt->execute();
            $theMsg = "<div class='alert alert-success'>" . 'تم حذف المنتج بنجاح' . "</div>";
            redirectPage($theMsg, 'back');
        } else {
            echo "<div class='alert alert-danger'>" . 'هذا المنتج غير موجود' . "</div>";
        }
        echo '</div>';
    } elseif ($do == 'Activate') {
    }
    include $tpl . 'footer.php';
} else {
    header('Location: index.php');
    exit();
}
ob_end_flush();
