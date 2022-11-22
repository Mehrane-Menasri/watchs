<!-- Sidebar  -->
<nav id="sidebar" class="bg-secondary text-white ">
    <div class="sidebar-header bg-secondary text-white">
        <h3><span><i class="bi bi-scissors"></i> BARBERSHOP</span></h3>
    </div>
    <ul class="list-unstyled components">
        <li class="active">
            <a href="dashboard.php" class="dashboard"><i class="bi bi-speedometer2"></i><span>DASHBOARD</span></a>
        </li>
        <div class="small-screen navbar-display">

        </div>
        <li class="dropdown">
            <a href="orders.php" class="text-white"><i class="bi bi-pin-angle"></i> RESERVATIONS</a>
        </li>
    </ul>
</nav>


<!-- Page Content  -->
<div id="content">
    <div class="top-navbar">
        <nav class="navbar navbar-expand-lg bg-secondary text-white shadow">
            <div class="container-fluid">
                <button type="button" id="sidebarCollapse" class="d-xl-block d-lg-block d-md-mone d-none">
                    <i class="bi bi-backspace"></i>
                </button>
                <a class="navbar-brand text-white" href="#"> DASHBOARD </a>
                <button class="d-inline-block d-lg-none ml-auto more-button" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="material-icons mx-3"><i class="bi bi-list-task"></i></span>
                </button>
                <div class="collapse navbar-collapse d-lg-block d-xl-block d-sm-none d-md-none d-none" id="navbarSupportedContent">
                    <ul class="nav navbar-nav ml-auto">
                        <?php
                        $stmt2 = $con->prepare("SELECT COUNT(id) FROM orders WHERE res_status = 'pending'");
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
                                    <a href="#"> Total Reservations : <?php echo countItems('id', 'orders') ?> Reservations</a>
                                </li>
                                <li>
                                    <a href="#">You Have <?php echo $newOrders ?> New Reservation.</a>
                                </li>
                                <li>
                                    <a href="#"> Completed Reservations : <?php echo countItems('id', 'orders') - $newOrders ?></a>
                                </li>

                            </ul>
                        </li>
                        <!-- <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="bi bi-person-circle"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="bi bi-gear"></i>
                            </a>
                        </li> -->
                        <li class="nav-item">
                            <a class="nav-link" href="logout.php">
                                <i class="bi bi-box-arrow-right"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <div class="main-content">