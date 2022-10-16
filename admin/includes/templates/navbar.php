<!-- Sidebar  -->
<nav id="sidebar">
    <div class="sidebar-header">
        <h3><img src="img/logo.png" class="img-fluid"/><span><i class="bi bi-watch"></i> ساعاتي</span></h3>
    </div>
    <ul class="list-unstyled components">
        <li  class="active">
            <a href="dashboard.php" class="dashboard"><i class="bi bi-speedometer2"></i><span>لوحة التحكم</span></a>
        </li>
        <div class="small-screen navbar-display">

        </div>
        <li class="dropdown">
            <a href="products.php"><i class="bi bi-aspect-ratio"></i> المنتجات</a>
        </li>
        <li class="dropdown">
            <a href="orders.php"><i class="bi bi-aspect-ratio"></i> الطلبات</a>
        </li>
        <li class="dropdown">
            <a href="details.php"><i class="bi bi-aspect-ratio"></i>الموقع</a>
        </li>
    </ul>
</nav>


<!-- Page Content  -->
<div id="content">
    <div class="top-navbar">
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <button type="button" id="sidebarCollapse" class="d-xl-block d-lg-block d-md-mone d-none">
                    <i class="bi bi-backspace-reverse"></i>
                </button>
                <a class="navbar-brand" href="#"> لوحة التحكم </a>
                <button class="d-inline-block d-lg-none ml-auto more-button" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="material-icons mx-3"><i class="bi bi-list-task"></i></span>
                </button>
                <div class="collapse navbar-collapse d-lg-block d-xl-block d-sm-none d-md-none d-none" id="navbarSupportedContent">
                    <ul class="nav navbar-nav ml-auto">   
                                <?php 
                                    $stmt2 = $con->prepare("SELECT COUNT(order_id) FROM orders WHERE order_status = 'انتظار'");
                                    $stmt2->execute();
                                    $newOrders = $stmt2->fetchColumn();
                                ?>
                        <li class="dropdown nav-item active">
                            <a href="#" class="nav-link" data-toggle="dropdown">
                                <i class="bi bi-bell"></i>
                                <span class="notification"><?php echo $newOrders ?></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="#">جميع الطلبات :  <?php echo countItems('order_id', 'orders') ?> طلب</a>
                                </li>
                                <li>
                                    <a href="#">لديك  <?php echo $newOrders ?> طلبات جديدة</a>
                                </li>
                                <li>
                                    <a href="#">عدد الطلبات التي تم انجازها : <?php echo countItems('order_id', 'orders') - $newOrders ?></a>
                                </li>
                                
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="bi bi-person-circle"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="bi bi-gear"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="logout.php">
                                <i class="bi bi-box-arrow-left"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <div class="main-content">