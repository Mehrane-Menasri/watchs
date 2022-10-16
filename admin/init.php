<?php

    include 'connect.php';

    // routes
    $tpl   = 'includes/templates/'; // template directory
    $css   = 'layout/css/'; // css directory
    $js    = 'layout/js/'; // js directory
    $func  = 'includes/functions/'; // functions directory

    include $func . "functions.php"; 
    include $tpl . "header.php"; 
    if(!isset($noNavbar)) {
        include $tpl . "navbar.php";
    }
    // include $tpl . "footer.php"; 

