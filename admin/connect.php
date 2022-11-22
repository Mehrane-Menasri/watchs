<?php

    $dsn    = 'mysql:host=localhost;dbname=barbershop';
    $user   = 'root';
    $pass   = '';
    $option = array(
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
    );

    try {
        $con = new PDO($dsn, $user, $pass, $option);
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // echo 'تم الإتصال بقاعدة البيانات بنجاح' ;
    }
    catch(PDOException $e) {
        echo 'فشل الإتصال بقاعدة البيانات' . $e->getMessage();
    }