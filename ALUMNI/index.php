<?php
// KONEKSI DATABASE
$conn = mysqli_connect("localhost","root","","db_alumni");

if(!$conn){
    die("Koneksi gagal: " . mysqli_connect_error());
}

// LOGIKA FILTER DAN PENCARIAN
$angkatan = $_GET['angkatan'] ?? '';
$jurusan = $_GET['jurusan'] ?? '';
$cari = $_GET['cari'] ?? ''; // Menangkap input nama

$sql = "SELECT * FROM alumni WHERE 1";

if($angkatan != ''){
    $sql .= " AND angkatan='$angkatan'";
}

if($jurusan != '' && $jurusan != 'Semua Jurusan'){
    $sql .= " AND jurusan='$jurusan'";
}

if($cari != ''){
    $sql .= " AND nama LIKE '%$cari%'"; 
}

$query = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Alumni CSSMoRA</title>
    <link rel="stylesheet" href="alumni.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>

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

<div style="margin:0 40px 20px 40px;">
    <a href="create.php" class="tombol-tambah">+ Tambah Alumni</a>
</div>

<form method="GET" class="kotak-filter">

    <div class="bagian-kiri-filter">
        <label>Angkatan:</label>
        <select name="angkatan">
            <option value="">Semua</option>
            <option <?php if($angkatan == '2016') echo 'selected'; ?>>2016</option>
            <option <?php if($angkatan == '2017') echo 'selected'; ?>>2017</option>
            <option <?php if($angkatan == '2018') echo 'selected'; ?>>2018</option>
            <option <?php if($angkatan == '2019') echo 'selected'; ?>>2019</option>
            <option <?php if($angkatan == '2020') echo 'selected'; ?>>2020</option>
            <option <?php if($angkatan == '2021') echo 'selected'; ?>>2021</option>
            <option <?php if($angkatan == '2022') echo 'selected'; ?>>2022</option>
            <option <?php if($angkatan == '2023') echo 'selected'; ?>>2023</option>
            <option <?php if($angkatan == '2024') echo 'selected'; ?>>2024</option>
            <option <?php if($angkatan == '2025') echo 'selected'; ?>>2025</option>
            <option <?php if($angkatan == '2026') echo 'selected'; ?>>2026</option>
        </select>

        <select name="jurusan">
            <option value="">Semua Jurusan</option>
            <option <?php if($jurusan == 'IPA') echo 'selected'; ?>>IPA</option>
            <option <?php if($jurusan == 'IPS') echo 'selected'; ?>>IPS</option>
            <option <?php if($jurusan == 'Farmasi') echo 'selected'; ?>>Farmasi</option>
            <option <?php if($jurusan == 'Kesehatan Masyarakat') echo 'selected'; ?>>Kesehatan Masyarakat</option>
            <option <?php if($jurusan == 'Teknik Informatika') echo 'selected'; ?>>Teknik Informatika</option>
            <option <?php if($jurusan == 'Teknik Arsitektur') echo 'selected'; ?>>Teknik Arsitektur</option>
        </select>

        <div class="pembungkus-cari">
            <i class="fas fa-search ikon-cari"></i>
            <input type="text" name="cari" class="input-cari-nama" placeholder="Cari Nama Alumni..." value="<?php echo $cari; ?>">
        </div>
    </div>

    <button type="submit" class="tombol-tampilkan">Tampilkan</button>

</form>

<h3 class="judul-angkatan">
    <?php echo ($angkatan != '') ? "Angkatan $angkatan" : "Semua Angkatan"; ?>
</h3>

<div class="pembungkus halaman-alumni">
<?php
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