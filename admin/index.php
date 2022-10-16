<?php 
    session_start();
    $noNavbar = '';
    $pageTitle = ' تسجيل الدخول';
    if(isset($_SESSION['user_name'])) {
        header('Location: dashboard.php');
    }

    include "init.php";
    include $tpl . "header.php"; 

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $user_name    = $_POST['user_name'];
        $password = $_POST['password'];
        $hashPass = sha1($password);
        
        $stmt = $con->prepare("SELECT user_name, password FROM users WHERE user_name = ? AND password = ? AND is_admin = 1");
        $stmt->execute(array($user_name, $hashPass));
        $count = $stmt->rowCount();
        
        if($count > 0) {
            $_SESSION['user_name'] = $user_name;
            header('Location: dashboard.php');
            exit();
            echo '<div class="alert alert-success">' . 'تم تسجيل الدخول بنجاح...' . '</div>';
        } else {
            echo '<div class="alert alert-danger">' . 'عذرا حصل خطأ ما...' . '</div>';
        }
    }
?>

    <div class="container p-5 text-center">
        <div class="card p-5 shadow mx-auto" style="width: 400px;">
            <h3 class="text-center text-primary mb-3">
                تسجيل دخول المدير
            </h3>
            <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">اسم المستخدم</label>
                    <input type="text" name="user_name" class="form-control" id="exampleFormControlInput1" placeholder="اسم المستخدم">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">كلمة المرور</label>
                    <input type="password" name="password" class="form-control" id="exampleFormControlInput1" placeholder="كلمة المرور">
                </div>
                <div class="mb-3">
                    <input type="submit" class="btn btn-primary" value="دخول">
                </div>
            </form>
        </div>
    </div>


<?php include $tpl . "footer.php"; ?>