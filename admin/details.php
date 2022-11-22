<?php

/*
=====================
=== PRODUCTS PAGE ===
=====================
*/
ob_start();
session_start();
$pageTitle = 'معلومات الموقع';
if (isset($_SESSION['user_name'])) {
    include 'init.php';
    $do = isset($_GET['do']) ? $_GET['do'] : 'Manage';
    if ($do == 'Manage') {

        $stmt = $con->prepare("SELECT * FROM details WHERE id = 1");
        $stmt->execute();
        $details = $stmt->fetchAll(); ?>

        <div class="card p-4">
            <h2 class="text-center mb-4"> معلومات الموقع</h2>
            <div class="table-responsive">
                <table class="table table-info table-striped table-hover shadow">
                    <thead>
                        <tr>
                            <th scope="col">إسم الموقع</th>
                            <th scope="col">الشعار</th>
                            <th scope="col">الهاتف</th>
                            <th scope="col">البريد الإلكتروني</th>
                            <th scope="col">فيسبوك</th>
                            <th scope="col">تويتر</th>
                            <th scope="col">انستغرام</th>
                            <th scope="col">العنوان</th>
                            <th scope="col">رسالة الشكر</th>
                            <th scope="col">تعديل</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($details as $detail) { ?>
                            <tr>
                                <td><?= $detail['title'] ?></td>
                                <td><img src="uploads/images/<?php echo $detail['logo'] ?>" width="60" height="60" alt=""></td>
                                <td><?= $detail['phone'] ?></td>
                                <td><?= $detail['email'] ?></td>
                                <td><?= $detail['facebook'] ?></td>
                                <td><?= $detail['twitter'] ?></td>
                                <td><?= $detail['instagram'] ?></td>
                                <td><?= $detail['address'] ?></td>
                                <td><?= $detail['thank'] ?></td>
                                <td>
                                    <a href="details.php?do=Edit&id=<?= $detail['id'] ?>" class="text-success link"><i class="bi bi-pen"></i></a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
        <?php
    } elseif ($do == 'Edit') {

        $id = isset($_GET['id']) && is_numeric(($_GET['id'])) ? intval($_GET['id']) : 0;
        $stmt = $con->prepare("SELECT * FROM details WHERE id = ? LIMIT 1");
        $stmt->execute(array($id));
        $detail = $stmt->fetch();
        $count = $stmt->rowCount();

        if ($count > 0) { ?>

            <div class="container">
                <h1 class="text-center">تعديل معلومات الموقع</h1>
                <div class="card p-5 shadow">
                    <a class="btn btn-info mb-3" href="details.php"><i class="bi bi-backspace-reverse"></i> عودة</a>
                    <form action="?do=Update" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?php echo $detail['id'] ?>">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">إسم الموقع</label>
                                    <input type="text" placeholder="إسم الموقع" class="form-control" name="title" value="<?php echo $detail['title'] ?>" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">الهاتف</label>
                                    <input type="text" placeholder="الهاتف" class="form-control" name="phone" value="<?php echo $detail['phone'] ?>" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">البريد الإلكتروني</label>
                                    <input type="text" placeholder="البريد الإلكتروني" class="form-control" name="email" value="<?php echo $detail['email'] ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">شعار الموقع</label>
                                    <input type="file" placeholder="شعار الموقع" class="form-control" name="logo">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">فيسبوك</label>
                                    <input type="text" placeholder="فيسبوك" class="form-control" name="facebook" value="<?php echo $detail['facebook'] ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">تويتر</label>
                                    <input type="text" placeholder="تويتر" class="form-control" name="twitter" value="<?php echo $detail['twitter'] ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">انستغرام</label>
                                    <input type="text" placeholder="انستغرام" class="form-control" name="instagram" value="<?php echo $detail['instagram'] ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">العنوان</label>
                                    <input type="text" placeholder="العنوان" class="form-control" name="address" value="<?php echo $detail['address'] ?>">
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">رسالة الشكر</label>
                            <textarea class="form-control" name="thank" rows="3" placeholder="رسالة الشكر"><?php echo $detail['thank'] ?></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">كود فيسبوك بكسل</label>
                            <input type="text" placeholder="كود فيسبوك بكسل" class="form-control" name="pixel" value="<?php echo $detail['pixel'] ?>">
                        </div>
                        <input type="submit" class="btn btn-info" value="حفظ التغييرات">
                    </form>
                </div>

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

            $imageName = $_FILES['logo']['name'];
            $imageSize = $_FILES['logo']['size'];
            $imageTmp  = $_FILES['logo']['tmp_name'];
            $imageType = $_FILES['logo']['type'];

            $imageAllowedExtensions = array("jpeg", "jpg", "png", "gif");

            $img = explode('.', $imageName);
            $imageExtensions = strtolower(end($img));

            // =====================================================

            $id         = $_POST['id'];
            $title      = $_POST['title'];
            $phone      = $_POST['phone'];
            $email      = $_POST['email'];
            $facebook   = $_POST['facebook'];
            $twitter    = $_POST['twitter'];
            $instagram  = $_POST['instagram'];
            $address    = $_POST['address'];
            $thank      = $_POST['thank'];
            $pixel      = $_POST['pixel'];

            //validate the form
            $formErrors = array();
            if (empty($title)) {
                $formErrors[] = 'إدخال إسم الموقع إجباري';
            }
            if (empty($phone)) {
                $formErrors[] = 'إدخال رقم الهاتف إجباري';
            }
            if (empty($email)) {
                $formErrors[] = 'إدخال البريد الإلكتروني إجباري';
            }
            if (empty($facebook)) {
                $formErrors[] = 'إدخال الفيسبوك إجباري';
            }

            if (!empty($imageName) && !in_array($imageExtensions, $imageAllowedExtensions)) {
                $formErrors[] = 'معذرة، غير مسموح إضافة صور بهذا  <strong>الإمتداد</strong> ';
            }
            if (empty($imageName)) {
                $formErrors[] = 'إضافة الشعار <strong>إجباري</strong> ';
            }
            if ($imageSize > 4194304) {
                $formErrors[] = 'أقصى حجم للصورة  <strong>4 ميجا</strong> ';
            }

            foreach ($formErrors as $error) {
                echo "<div class='alert alert-danger'>" . $error . "</div>";
            }

            if (empty($formErrors)) {

                $image = rand(0, 100000) . '_' . $imageName;
                move_uploaded_file($imageTmp, "uploads/images/" . $image);

                // update the database with this info
                $stmt = $con->prepare("UPDATE details SET title = ?, phone = ?, email = ?, facebook = ?, twitter = ?, instagram = ?, address = ?, logo = ?, thank = ?, pixel = ? WHERE id = ?");
                $stmt->execute(array($title, $phone, $email, $facebook, $twitter, $instagram, $address, $image, $thank, $pixel, $id));
                $theMsg = "<div class='alert alert-success'>" . 'تم تحديث المعلومات بنجاح' . '</div>';
                header('Location: details.php');
            }
        }
    }
    include $tpl . 'footer.php';
} else {
    header('Location: index.php');
    exit();
}
ob_end_flush();


