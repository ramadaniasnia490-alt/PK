<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>CSSMORA Alumni</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>

<!-- NAVBAR -->
<div class="navbar">
    <div class="logo">
    <img src="../home/cssmora.jpeg" alt="">
    </div>
    <div>
        <a href="index.php">Home</a>
        <a href="#">Alumni</a>
        <a href="#">Kegiatan</a>

        <?php if(isset($_SESSION['nia'])){ ?>
            <a href="dashboard.php">Dashboard</a>
            <a href="logout.php">Logout</a>
        <?php } else { ?>
            <a href="login.php">Login</a>
        <?php } ?>
    </div>
</div>

<!-- HERO SECTION -->
<div class="hero">
    <h1>Selamat Datang di Website Alumni CSSMORA</h1>
    <p>Sistem Informasi Alumni Modern</p>

    <?php if(!isset($_SESSION['nia'])){ ?>
        <a href="login.php" class="btn-hero">LOGIN SEKARANG</a>
    <?php } ?>
</div>
<!-- FOOTER -->
<footer class="footer">
    © 2019 UIN Alauddin Makassar. All Rights Reserved.
</footer>
</body>
</html>