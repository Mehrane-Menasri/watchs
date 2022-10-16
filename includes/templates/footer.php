<?php
$stmt = $con->prepare("SELECT * FROM details WHERE id = 1");
$stmt->execute();
$detail = $stmt->fetch();

$stmt2 = $con->prepare("SELECT * FROM visitors");
$stmt2->execute();
$visitors = $stmt2->rowCount();
?>

        <!--========== FOOTER ==========-->
        <footer class="footer section bd-container">
            <div class="footer__container bd-grid">
                <div class="footer__content">
                    <a href="#" class="footer__logo"><?=$detail['title']?></a>
                    <span class="footer__description"> متجر لبيع الساعات</span>
                    <div>
                        <a href="<?=$detail['facebook']?>" class="footer__social"><i class="bi bi-facebook"></i></a>
                        <a href="<?=$detail['instagram']?>" class="footer__social"><i class="bi bi-instagram"></i></a>
                        <!-- <a href="" class="footer__social"><i class="bi bi-twitter"></i></a> -->
                    </div>
                </div>

                <div class="footer__content">
                    <h3 class="footer__title">الخدمات</h3>
                    <ul>
                        <li><a href="return.php" class="footer__link">سياسة إستبدال و ارجاع السلع</a></li>
                        <li><a href="privacy.php" class="footer__link">سياسة الخصوصية</a></li>
                        <!-- <li><a href="#" class="footer__link"> الأسئلة المتكررة</a></li> -->
                    </ul>
                </div>

                <div class="footer__content">
                    <h3 class="footer__title">تواصل معنا</h3>
                    <ul>
                        <li><i class="bi bi-map" style="font-size: 1.2rem; margin-left:10px"></i> <?=$detail['address']?></li>
                        <li><i class="bi bi-phone" style="font-size: 1.2rem; margin-left:10px"></i> <?=$detail['phone']?></li>
                        <!-- <li><i class="bi bi-envelope-open" style="font-size: 1.2rem; margin-left:10px"></i> <?=$detail['email']?></li> -->
                    </ul>
                </div>
            </div>
            <!-- <p class="footer__copy" style="margin-bottom: -50px;"> عدد الزوار : <?php  echo $visitors; ?></p> -->
            <p class="footer__copy">&#169; 2022 <a target="_blank" class="copy" href="#">جميع الحقوق محفوظة</a></p>
        </footer>

        <!--========== SCROLL REVEAL ==========-->
        <script src="https://unpkg.com/scrollreveal"></script>

        <!--========== MAIN JS ==========-->
        <script
            src="https://code.jquery.com/jquery-3.6.1.js"
            integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI="
            crossorigin="anonymous"></script>
        <script src="<?php echo $js ?>jquery.js"></script>
        <script src="<?php echo $js ?>main.js"></script>
        <script src="https://apps.elfsight.com/p/platform.js" defer></script>

        <!-- <div class="elfsight-app-0b83843d-f5f6-46b1-8a22-6ea64b1861f7"></div> -->
    </body>
</html>