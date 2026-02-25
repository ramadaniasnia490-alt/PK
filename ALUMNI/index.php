<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Data Alumni CSSMoRA</title>
    <link rel="stylesheet" href="../ALUMNI/alumni.css">
</head>
<body>

<!-- NAVBAR -->
<header>
    <div class="container nav">
        <img src="cssmora.jpeg" class="logo-img">
        <nav>
            <a href="#">Home</a>
            <a href="#">Alumni</a>
            <a href="#">Info kegiatan</a>
            <a href="#">Berita</a>
            <a href="#" class="login">Login</a>
        </nav>
    </div>
</header>
<!-- BREADCRUMB -->
<div class="breadcrumb">
    <span>Home</span> › <span class="active">Alumni</span>
</div>

<h2 class="title">Data Alumni CSSMoRA</h2>

<!-- FILTER -->
<div class="filter-box">
    <div class="filter-left">
        <label>Angkatan:</label>
        <select>
            <option>2020</option>
            <option>2021</option>
            <option>2022</option>
        </select>

        <select>
            <option>Semua Jurusan</option>
            <option>IPA</option>
            <option>IPS</option>
        </select>
    </div>

    <button class="btn-tampilkan">Tampilkan</button>
</div>

<h3 class="angkatan-title">Angkatan 2020</h3>

<!-- CONTENT -->
<div class="container page-content">
    <h2>Data Alumni CSSMoRA</h2>

    <?php
    $query = mysqli_query($conn, "SELECT * FROM alumni");

    while($data = mysqli_fetch_assoc($query)){
    ?>

    <div class="card-alumni">
        <div class="foto">
            <img src="pia.jpeg" alt="">
        </div>

        <div class="info">
            <h3><?php echo $data['nama']; ?></h3>
            <p>Angkatan: <?php echo $data['angkatan']; ?></p>
            <p>Jurusan: <?php echo $data['jurusan']; ?></p>
            <p>Pekerjaan: <?php echo $data['jabatan']; ?></p>
        </div>

        <div>
            <a href="#" class="btn">Lihat Profil</a>
        </div>
    </div>

    <?php } ?>
</div>

</body>
</html>
