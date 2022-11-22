<?php
$stmt = $con->prepare("SELECT * FROM details WHERE id = 1");
$stmt->execute();
$detail = $stmt->fetch();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--========== BOX ICONS ==========-->
    <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

    <!--========== CSS ==========-->
    <link rel="stylesheet" href="<?php echo $css ?>styles.css">

    <noscript>
        <?= $detail['pixel'] ?>
    </noscript>
    <!-- ========== google fonts ========== -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <title><?= $detail['title'] ?></title>
</head>

<body>