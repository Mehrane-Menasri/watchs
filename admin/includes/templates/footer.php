                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                <nav class="d-flex">
                                    <ul class="m-0 p-0">
                                        <li>
                                            <a href="dashboard.php">
                                                Home
                                            </a>
                                        </li>
                                        <li>
                                            <a href="../index.php">
                                                Website
                                            </a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                            <div class="col-md-6">
                                <p class="copyright d-flex justify-content-end"> &copy Devloped By 
                                    <a href="https://mehranesoft.com/" target="_blank"> MEHRANE MENASRI </a> - 2022
                                </p>
                            </div>
                        </div>
                    </div>
                </footer>
                </div>
                </div>
                </div>

                <script src="<?php echo $js ?>jquery-3.3.1.slim.min.js"></script>
                <script src="<?php echo $js ?>popper.min.js"></script>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
                <script src="<?php echo $js ?>bootstrap.min.js"></script>
                <script src="<?php echo $js ?>jquery-3.3.1.min.js"></script>
                <script src="<?php echo $js ?>script.js"></script>
                <script src="ckfinder/ckfinder.js"></script>
                <script src="https://ckeditor.com/apps/ckfinder/3.5.0/ckfinder.js"></script>
                <script type="text/javascript">
                    $(document).ready(function() {
                        $('#sidebarCollapse').on('click', function() {
                            $('#sidebar').toggleClass('active');
                            $('#content').toggleClass('active');
                        });
                        $('.more-button,.body-overlay').on('click', function() {
                            $('#sidebar,.body-overlay').toggleClass('show-nav');
                        });

                    });
                </script>
                </body>

                </html>