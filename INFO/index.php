<?php
include "koneksi.php";

$current_page = basename($_SERVER['PHP_SELF']);

$cari = "";
if(isset($_GET['cari'])){
    $cari = $_GET['cari'];
    $data = mysqli_query($conn, "SELECT * FROM kegiatan 
                                 WHERE judul LIKE '%$cari%' 
                                 ORDER BY tanggal DESC");
} else {
    $data = mysqli_query($conn, "SELECT * FROM kegiatan ORDER BY tanggal DESC");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Info Kegiatan CSSMoRA</title>
    <link rel="stylesheet" href="info.css">
</head>
<body>

<header>
    <div class="container nav">
        <img src="../home/cssmora.jpeg" class="logo-img">
        <nav>
    <a href="../home/index.html">Home</a>
    <a href="../ALUMNI/index.php">Alumni</a>
     <a href="../INFO/index.php">Info Kegiatan</a>
   <a href="../berita/index.html">Berita</a>
    <a href="../login/index.php" class="login">Login</a>
</nav>
    </div>
</header>
<section class="hero">
    <h1>Info Kegiatan Organisasi CSSMoRA</h1>
    <p>Event dan kegiatan terbaru untuk alumni</p>

    <!-- SEARCH -->
    <form method="GET" class="search-box">
        <input type="text" name="cari" placeholder="Cari kegiatan..." value="<?= $cari ?>">
        <button type="submit">Cari</button>
    </form>
</section>

<section class="container main-layout">

<div class="left-content">
    <h2>Event Mendatang</h2>
    <p class="sub">Info Kegiatan Minggu Ini & Minggu Depan</p>

    <?php while($row = mysqli_fetch_assoc($data)) { ?>
    <div class="card">

        <div class="card-img">
            <img src="info.jpeg">
            <span class="kategori"><?php echo $row['kategori']; ?></span>
        </div>

        <div class="card-body">
            <h3><?php echo $row['judul']; ?></h3>
            <p>📅 <?php echo $row['tanggal']; ?></p>
            <p>📍 <?php echo $row['lokasi']; ?></p>
            <p>⏰ <?php echo $row['waktu']; ?></p>
            <p><?php echo substr($row['deskripsi'],0,120); ?>...</p>
            <a href="detail.php?id=<?php echo $row['id']; ?>" class="btn">Detail</a>
        </div>

    </div>
    <?php } ?>
</div>

<div class="dokumentasi">
    <h3>Dokumentasi Kegiatan</h3>

    <?php 
    $mini = mysqli_query($conn,"SELECT * FROM kegiatan ORDER BY tanggal DESC LIMIT 3");
    while($m = mysqli_fetch_assoc($mini)) { ?>
        <div class="mini-card">
            <img src="foto.jpeg">
            <p><?php echo $m['judul']; ?></p>
        </div>
    <?php } ?>

    <a href="index.php" class="btn" style="display:block;text-align:center;">Lihat Semua</a>

</div>

</section>
<!-- FOOTER -->
<footer class="footer">
    © 2019 UIN Alauddin Makassar. All Rights Reserved.
</footer>
</body>
</html>