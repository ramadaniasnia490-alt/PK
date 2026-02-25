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
    <div class="pembungkus navbar">
        <img src="cssmora.jpeg" class="logo">

        <nav>
            <a href="#">Beranda</a>
            <a href="#">Alumni</a>
            <a href="#">Info Kegiatan</a>
            <a href="#">Berita</a>
            <a href="#" class="tombol-login">Login</a>
        </nav>
    </div>
</header>

<!-- BREADCRUMB -->
<div class="jalur-halaman">
    <span>Beranda</span> › <span class="aktif">Alumni</span>
</div>

<h2 class="judul-halaman">Data Alumni CSSMoRA</h2>

<!-- FILTER -->
<div class="kotak-filter">
    <div class="bagian-kiri-filter">
        <label>Angkatan:</label>
        <select>
            <option>2016</option>
            <option>2017</option>
            <option>2018</option>
            <option>2019</option>
            <option>2020</option>
            <option>2021</option>
            <option>2022</option>
            <option>2023</option>
            <option>2024</option>
            <option>2025</option>
            <option>2026</option>
        </select>

        <select>
            <option>Semua Jurusan</option>
            <option>IPA</option>
            <option>IPS</option>
        </select>
    </div>

    <button class="tombol-tampilkan">Tampilkan</button>
</div>

<h3 class="judul-angkatan">Angkatan 2020</h3>

<!-- ISI DATA -->
<div class="pembungkus halaman-alumni">

    <?php
    $query = mysqli_query($conn, "SELECT * FROM alumni");

    while($data = mysqli_fetch_assoc($query)){
    ?>

    <div class="kotak-alumni">

        <div class="bagian-foto">
            <img src="pia.jpeg" alt="">
        </div>

        <div class="bagian-info">
            <h3><?php echo $data['nama']; ?></h3>
            <p>Angkatan: <?php echo $data['angkatan']; ?></p>
            <p>Jurusan: <?php echo $data['jurusan']; ?></p>
            <p>Pekerjaan: <?php echo $data['jabatan']; ?></p>
        </div>

        <div class="bagian-tombol">
            <a href="#" class="tombol-profil">Lihat Profil</a>
        </div>

    </div>

    <?php } ?>

</div>

</body>
</html>