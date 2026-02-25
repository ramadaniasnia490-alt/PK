<?php
include "koneksi.php";
$id = $_GET['id'];
$data = mysqli_query($conn,"SELECT * FROM kegiatan WHERE id='$id'");
$row = mysqli_fetch_assoc($data);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Detail Kegiatan</title>
    <link rel="stylesheet" href="CSS.css">
</head>
<body>

<section class="container" style="padding:50px;">
    <h1><?php echo $row['judul']; ?></h1>
    <img src="info.jpeg" width="500">
    <p>📅 <?php echo $row['tanggal']; ?></p>
    <p>📍 <?php echo $row['lokasi']; ?></p>
    <p>⏰ <?php echo $row['waktu']; ?></p>
    <p><?php echo $row['deskripsi']; ?></p>
    <br>
    <a href="index.php" class="btn">Kembali</a>
</section>

</body>
</html>