
<?php
$conn = mysqli_connect("localhost","root","","db_alumni");

if(!$conn){
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Data Alumni CSSMoRA</title>
    <link rel="stylesheet" href="alumni.css">
</head>
<body>

<!-- NAVBAR -->
<header>
    <div class="pembungkus navbar">
        <img src="cssmora.jpeg" class="logo">
        <nav>
            <a href="../home/index.html">Home</a>
            <a href="index.php">Alumni</a>
            <a href="../INFO/index.php">Info Kegiatan</a>
            <a href="../berita/index.html">Berita</a>
            <a href="../login/index.php" class="tombol-login">Login</a>
        </nav>
    </div>
</header>

<h2 class="judul-halaman">Data Alumni CSSMoRA</h2>

<!--TOMBOL TAMBAH -->
<div style="margin:0 40px 20px 40px;">
    <a href="create.php" class="tombol-tambah">+ Tambah Alumni</a>
</div>


<!-- FILTER -->
<form method="GET" class="kotak-filter">

<div class="bagian-kiri-filter">

<label>Angkatan:</label>

<select name="angkatan">
<option value="">Semua</option>
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

<select name="jurusan">
<option value="">Semua Jurusan</option>
<option>IPA</option>
<option>IPS</option>
<option>Farmasi</option>
<option>Kesehatan Masyarakat</option>
<option>Teknik Informatika</option>
<option>Teknik Arsitektur</option>
</select>

</div>

<button type="submit" class="tombol-tampilkan">Tampilkan</button>

</form>
<h3 class="judul-angkatan">Angkatan 2020</h3>

<!-- ISI DATA -->
<div class="pembungkus halaman-alumni">
<?php
$angkatan = $_GET['angkatan'] ?? '';
$jurusan = $_GET['jurusan'] ?? '';

$sql = "SELECT * FROM alumni WHERE 1";

if($angkatan != ''){
    $sql .= " AND angkatan='$angkatan'";
}

if($jurusan != '' && $jurusan != 'Semua Jurusan'){
    $sql .= " AND jurusan='$jurusan'";
}

$query = mysqli_query($conn, $sql);
while($data = mysqli_fetch_assoc($query)){
?>

<div class="kotak-alumni">
    <div class="bagian-foto">
        <img src="foto.webp" alt="">
    </div>

    <div class="bagian-info">
        <h3><?php echo $data['nama']; ?></h3>
        <p>Angkatan: <?php echo $data['angkatan']; ?></p>
        <p>Jurusan: <?php echo $data['jurusan']; ?></p>
        <p>Pekerjaan: <?php echo $data['jabatan']; ?></p>
    </div>

    <div class="bagian-tombol">

        <a href="detail.php?id=<?php echo $data['id']; ?>" class="tombol-profil">Profil</a>

        <a href="edit.php?id=<?php echo $data['id']; ?>" class="tombol-edit">Edit</a>

        <a href="delete.php?id=<?php echo $data['id']; ?>" class="tombol-hapus"
        onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>

    </div>
</div>

<?php } ?>
</div>
<footer class="footer">
    © 2019 UIN Alauddin Makassar. All Rights Reserved.
</footer>

</body>
</html>