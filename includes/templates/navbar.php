<?php
$stmt = $con->prepare("SELECT * FROM details WHERE id = 1");
$stmt->execute();
$product = $stmt->fetch();
?>

<!--========== SCROLL TOP ==========-->
<a href="#" class="scrolltop" id="scroll-top">
    <i class="bi bi-chevron-double-up scrolltop__icon"></i>
    <!-- <i class="bi bi-chevron-up"></i> -->
</a>

<!--========== HEADER ==========-->
<div class="upper_bar">
    تريد مساعدة؟ اتصل بنا: 0661266637
</div>
<header class="l-header" id="header">
    <nav class="nav bd-container">
        <!-- <a href="#" class="nav__logo"><i class="bi bi-smartwatch"></i> <?= $product['title'] ?></a> -->
        <a href="#" class="nav__logo"><img src="admin/uploads/images/<?= $product['logo'] ?>" style="height: 50px;" alt=""></a>

        <div class="nav__menu" id="nav-menu">
            <ul class="nav__list">
                <li class="nav__item"><a href="index.php" class="nav__link active-link">الرئيسية</a></li>
                <li><i class="bi bi-moon change-theme" id="theme-button"></i></li>
            </ul>
        </div>

        <div class="nav__toggle" id="nav-toggle">
            <i class="bi bi-list"></i>
        </div>
    </nav>
</header>