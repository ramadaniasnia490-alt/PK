<?php
session_start();
if(!isset($_SESSION['nia'])){
    header("Location: login.php");
}
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css">
</head>
<body>

<div class="navbar">
CSSMORA DASHBOARD
<span>Halo <?php echo $_SESSION['nia']; ?></span>
<a href="logout.php">Logout</a>
</div>

<div class="dashboard">

<div class="card">
<h3>Profil</h3>
<p>Lihat data diri</p>
</div>

<?php if($_SESSION['role']=="admin"){ ?>
<div class="card">
<h3><a href="../alumni/index.php">Kelola Alumni</a></h3>
<p>Tambah & lihat data</p>
</div>
<?php } ?>

<div class="card">
<h3>Kegiatan</h3>
<p>Informasi kegiatan</p>
</div>

</div>

</body>
</html>